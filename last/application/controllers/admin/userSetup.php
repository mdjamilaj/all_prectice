<?php
defined('BASEPATH') or exit('No direct script access allowed');

class userSetup extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }
    
    protected function render_page($view,$data)
    {
        if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
            redirect('/auth/login/');
        } else {
            $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
            if ($user->type == 1) {  // admin check
                $this->load->view('admin/admin/include/admin_header');
                $this->load->view($view, $data);
                $this->load->view('admin/admin/include/admin_footer');
            }else{
                redirect('/auth/login/');
            }
        }
    }

    // protected function render_page_teacher_admin($view,$data)
    // {
    //     if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
    //         redirect('/auth/login/');
    //     } else {
    //         $user = $this->users->get_user_by_id($this->tank_auth->get_user_id(), TRUE);
    //         if ($user->admin == 1 || $user->teacher == 1) {  // admin check
    //             $this->load->view('admin/admin/include/admin_header');
    //             $this->load->view($view, $data);
    //             $this->load->view('admin/admin/include/admin_footer');
    //         }else{
    //             redirect('/auth/login/');
    //         }
    //     }
    // }


	public function index($page=false)
	{
        $email = $this->input->post('email');
        if(empty($email)){
            if($page!=0){
                $page = ($page-1);
            }
            $this->db->limit(10, $page);
        }else{
            $this->db->where('email', $email);
        }
        $data['users'] = $this->db->order_by('id', 'desc')->get('users')->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/userSetup/index');
        $config['total_rows'] = $this->db->count_all('users');
        $config['per_page'] = 10;
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['first_link']       = false;
        $config['last_link']        = false;
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['attributes']       = ['class' => 'page-link'];
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $this->pagination->initialize($config);
        $this->render_page('admin/admin/setup/userSetup/index', $data);
            
    }
    
    public function edit($id)
	{
        $data['userData'] = $this->db->where('id', $id)->get('users')->row();
        $this->render_page('admin/admin/setup/userSetup/edit', $data);
    }
}