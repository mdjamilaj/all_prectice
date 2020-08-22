<?php
defined('BASEPATH') or exit('No direct script access allowed');

class classSetup extends CI_Controller
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
        $name = $this->input->post('name');
        if(empty($name)){
            if($page!=0){
                $page = ($page-1);
            }
            $this->db->limit(10, $page);
        }else{
            $this->db->where('class_name', $name);
        }
        $this->db->select('*');    
        $this->db->from('class');
        $this->db->join('group_name', 'class.group_id = group_name.group_id');
        $this->db->order_by('class_id', 'desc');
        $data['data'] = $this->db->get()->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/classSetup/index');
        $config['total_rows'] = $this->db->count_all('class');
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
        $this->render_page('admin/admin/setup/classSetup/index', $data);
            
    }
    
    public function create()
    {
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $this->render_page('admin/admin/setup/classSetup/create', $data);
    }

    public function store()
    {
        $group = $this->input->post('group');
        $name = $this->input->post('name');
        $data = ['class_name' => $name, 'group_id' => $group];

        $this->load->model('web');
		$this->web->insert('class', $data);

        $this->session->set_flashdata('msg', 'Create Successfully !');
		redirect(base_url() . 'admin/classSetup/index');
    }

    public function edit($id)
	{
        $data['userData'] = $this->db->where('class_id', $id)->get('class')->row();
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $this->render_page('admin/admin/setup/classSetup/edit', $data);
    }

    public function update()
    {
        $name = $this->input->post('name');
        $group = $this->input->post('group');
        $id = $this->input->post('id');
        $data = ['class_name' => $name, 'group_id' => $group];

        $this->load->model('web');
		$this->web->update('class', $data, $id, 'class_id');

        $this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url() . 'admin/classSetup/index');
    }

    public function delete($id)
    {
        $this->load->model('web');
		$this->web->delete('class',  $id, 'class_id');

        $this->session->set_flashdata('msg', 'Delete Successfully !');
		redirect(base_url() . 'admin/classSetup/index');
    }
}