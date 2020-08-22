<?php
defined('BASEPATH') or exit('No direct script access allowed');

class examSetup extends CI_Controller
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
        $exam_start_datetime = $this->input->post('exam_start_datetime');
        $exam_end_datetime = $this->input->post('exam_end_datetime');
        $create_datetime = $this->input->post('create_datetime');
        $update_datetime = $this->input->post('update_datetime');
        $id_number = $this->input->post('id_number');
        $group = $this->input->post('group');
        $class = $this->input->post('class');
        $subject = $this->input->post('subject');
        if(empty($group) && empty($class) && empty($subject) && empty($exam_start_datetime) && empty($exam_end_datetime) && empty($create_datetime) && empty($update_datetime) && empty($id_number)){
            if($page!=0){
                $page = ($page-1);
            }
            $this->db->limit(10, $page);
        }else{
            if(!empty($exam_start_datetime))
                $this->db->where('exam_start_datetime >=', $exam_start_datetime);
            elseif(!empty($exam_end_datetime))
                $this->db->where('exam_end_datetime <=', $exam_end_datetime);
            elseif(!empty($create_datetime))
                $this->db->where('doc >=', $create_datetime);
            elseif(!empty($update_datetime))
                $this->db->where('dom <=', $update_datetime);
            elseif(!empty($id_number))
                $this->db->where('exam_setup_id', $id_number);
            elseif(!empty($group))
                $this->db->where('group_id', $group);
            elseif(!empty($class))
                $this->db->where('class_id', $class);
            elseif(!empty($subject))
                $this->db->where('subject_id', $subject);
        }
        $this->db->select('*');    
        $this->db->from('exam_setup');
        $this->db->join('group_name', 'exam_setup.group_id = group_name.group_id');
        $this->db->join('class', 'exam_setup.class_id = class.class_id');
        $this->db->join('subject', 'exam_setup.subject_id = subject.subject_id');
        $this->db->order_by('exam_setup_id', 'desc');
        $data['data'] = $this->db->get()->result();
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/examSetup/index');
        $config['total_rows'] = $this->db->count_all('exam_setup');
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
        $this->render_page('admin/admin/setup/examSetup/index', $data);
            
    }
    
    public function create()
    {
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->render_page('admin/admin/setup/examSetup/create', $data);
    }

    public function store()
    {
        $exam_start_datetime = $this->input->post('exam_start_datetime');
        $exam_end_datetime = $this->input->post('exam_end_datetime');
        $number_of_question = $this->input->post('number_of_question');
        $total_time = $this->input->post('total_time');
        $question_marks = $this->input->post('question_marks');
        $question_paper_type = $this->input->post('question_paper_type');
        $total_marks = $this->input->post('total_marks');
        $negative_marks = $this->input->post('negative_marks');
        $title = $this->input->post('title');
        $group_id = $this->input->post('group');
        $class_id = $this->input->post('class');
        $subject_id = $this->input->post('subject');
        $data = ['exam_start_datetime' => $exam_start_datetime, 'exam_end_datetime' => $exam_end_datetime, 'number_of_question' => $number_of_question, 'total_time' => $total_time, 'question_marks' => $question_marks, 'question_paper_type' => $question_paper_type, 'total_marks' => $total_marks, 'negative_marks' => $negative_marks, 'title' => $title, 'group_id' => $group_id, 'class_id' => $class_id, 'subject_id' => $subject_id];

        $this->load->model('web');
		$this->web->insert('exam_setup', $data);

        $this->session->set_flashdata('msg', 'Create Successfully !');
		redirect(base_url() . 'admin/examSetup/index');
    }

    public function edit($id)
	{
        $data['userData'] = $this->db->where('exam_setup_id', $id)->get('exam_setup')->row();
        $data['group_list'] = $this->db->order_by('group_id', 'desc')->get('group_name')->result();
        $data['class_list'] = $this->db->order_by('class_id', 'desc')->get('class')->result();
        $data['subject_list'] = $this->db->order_by('subject_id', 'desc')->get('subject')->result();
        $this->render_page('admin/admin/setup/examSetup/edit', $data);
    }

    public function update()
    {
        $exam_start_datetime = $this->input->post('exam_start_datetime');
        $exam_end_datetime = $this->input->post('exam_end_datetime');
        $number_of_question = $this->input->post('number_of_question');
        $total_time = $this->input->post('total_time');
        $question_marks = $this->input->post('question_marks');
        $question_paper_type = $this->input->post('question_paper_type');
        $total_marks = $this->input->post('total_marks');
        $negative_marks = $this->input->post('negative_marks');
        $title = $this->input->post('title');
        $group_id = $this->input->post('group');
        $class_id = $this->input->post('class');
        $subject_id = $this->input->post('subject');
        $id = $this->input->post('id');
        $data = ['exam_start_datetime' => $exam_start_datetime, 'exam_end_datetime' => $exam_end_datetime, 'number_of_question' => $number_of_question, 'total_time' => $total_time, 'question_marks' => $question_marks, 'question_paper_type' => $question_paper_type, 'total_marks' => $total_marks, 'negative_marks' => $negative_marks, 'title' => $title, 'group_id' => $group_id, 'class_id' => $class_id, 'subject_id' => $subject_id];


        $this->load->model('web');
		$this->web->update('exam_setup', $data, $id, 'exam_setup_id');

        $this->session->set_flashdata('msg', 'Update Successfully !');
		redirect(base_url() . 'admin/examSetup/index');
    }

    public function delete($id)
    {
        $this->load->model('web');
		$this->web->delete('exam_setup',  $id, 'exam_setup_id');

        $this->session->set_flashdata('msg', 'Delete Successfully !');
		redirect(base_url() . 'admin/examSetup/index');
    }
}