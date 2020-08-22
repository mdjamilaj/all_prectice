<?php
defined('BASEPATH') or exit('No direct script access allowed');

class groupSetup extends CI_Controller
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

	public function index($page=false)
	{
        $group_name = $this->input->post('group_name');
        if(empty($group_name)){
            if($page!=0){
                $page = ($page-1);
            }
            $this->db->limit(10, $page);
        }else{
            $this->db->where('group_name', $group_name);
        }
        $data['group_name'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/groupSetup/index');
        $config['total_rows'] = $this->db->count_all('group_name');
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
        $this->render_page('admin/admin/setup/groupSetup/index', $data);
            
    }
    
    public function create()
    {
        $this->render_page('admin/admin/setup/groupSetup/create', 'sa');
    }

    public function store()
    {
        $name = $this->input->post('name');
        $data = ['group_name' => $name];
        $this->load->model('web');
		$this->web->insert('group_name', $data);

        $this->session->set_flashdata('msg', 'Create Successfully !');
		redirect(base_url() . 'admin/groupSetup/index');
    }

    public function edit($id)
	{
        $data['userData'] = $this->db->where('group_id', $id)->get('group_name')->row();
        $this->render_page('admin/admin/setup/groupSetup/edit', $data);
    }

    public function update()
    {
        $group_name = $this->input->post('group_name');
        $id = $this->input->post('id');
        $data = ['group_name' => $group_name];

        $this->load->model('web');
		$this->web->update('group_name', $data, $id, 'group_id');

        $this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url() . 'admin/groupSetup/index');
    }

    public function delete($id)
    {
        $this->load->model('web');
		$this->web->delete('group_name', $id, 'group_id');

        $this->session->set_flashdata('msg', 'Delete Successfully !');
		redirect(base_url() . 'admin/groupSetup/index');
    }
}