<?php
defined('BASEPATH') or exit('No direct script access allowed');

class questionSetup extends CI_Controller
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
        $create_datetime = $this->input->post('create_datetime');
        $update_datetime = $this->input->post('update_datetime');
        $id_number = $this->input->post('id_number');
        $group = $this->input->post('group');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        if(empty($group) && empty($class) && empty($subject) && empty($create_datetime) && empty($update_datetime) && empty($id_number)){
            if($page!=0){
                $page = ($page-1);
            }
            $this->db->limit(10, $page);
        }else{
            if(!empty($create_datetime))
                $this->db->where('doc >=', $create_datetime);
            elseif(!empty($update_datetime))
                $this->db->where('dom <=', $update_datetime);
            elseif(!empty($id_number))
                $this->db->where('question_setup_id', $id_number);
            elseif(!empty($group))
                $this->db->where('group_id', $group);
            elseif(!empty($class))
                $this->db->where('class_id', $class);
            elseif(!empty($subject))
                $this->db->where('subject_id', $subject);
        }
        $this->db->select('*');    
        $this->db->from('question_setup');
        $this->db->join('group_name', 'question_setup.group_id = group_name.group_id');
        $this->db->join('class', 'question_setup.class_id = class.class_id');
        $this->db->join('subject', 'question_setup.subject_id = subject.subject_id');
        $this->db->order_by('question_setup_id', 'desc');
        $data['data'] = $this->db->get()->result();
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/questionSetup/index');
        $config['total_rows'] = $this->db->count_all('question_setup');
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
        $this->render_page('admin/admin/setup/questionSetup/index', $data);
            
    }
    
    public function create()
    {
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->render_page('admin/admin/setup/questionSetup/create', $data);
    }

    public function store()
    {
        $option1 = $this->input->post('option1');
        $option2 = $this->input->post('option2');
        $option3 = $this->input->post('option3');
        $option4 = $this->input->post('option4');
        $title = $this->input->post('title');
        $answer = $this->input->post('answer');
        $group_id = $this->input->post('group');
        $class_id = $this->input->post('class');
        $subject_id = $this->input->post('subject');
        $data = ['option1' => $option1, 'option2' => $option2, 'option3' => $option3, 'option4' => $option4, 'title' => $title, 'answer' => $answer, 'group_id' => $group_id, 'class_id' => $class_id, 'subject_id' => $subject_id];

        $this->load->model('web');
		$this->web->insert('question_setup', $data);

        $this->session->set_flashdata('msg', 'Create Successfully !');
		redirect(base_url() . 'admin/questionSetup/index');
    }

    public function edit($id)
	{
        $data['userData'] = $this->db->where('question_setup_id', $id)->get('question_setup')->row();
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->render_page('admin/admin/setup/questionSetup/edit', $data);
    }

    public function update()
    {
        $option1 = $this->input->post('option1');
        $option2 = $this->input->post('option2');
        $option3 = $this->input->post('option3');
        $option4 = $this->input->post('option4');
        $title = $this->input->post('title');
        $answer = $this->input->post('answer');
        $group_id = $this->input->post('group');
        $class_id = $this->input->post('class');
        $subject_id = $this->input->post('subject');
        $id = $this->input->post('id');
        $data = ['option1' => $option1, 'option2' => $option2, 'option3' => $option3, 'option4' => $option4, 'title' => $title, 'answer' => $answer, 'group_id' => $group_id, 'class_id' => $class_id, 'subject_id' => $subject_id];

        
        $this->load->model('web');
		$this->web->update('question_setup', $data, $id, 'question_setup_id');

        $this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url() . 'admin/questionSetup/index');
    }

    public function delete($id)
    {
        $this->load->model('web');
		$this->web->delete('question_setup',  $id, 'question_setup_id');

        $this->session->set_flashdata('msg', 'Delete Successfully !');
		redirect(base_url() . 'admin/questionSetup/index');
    }
}