<?php
defined('BASEPATH') or exit('No direct script access allowed');

class common extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
    }

    public function ajaxGroupIdToClass()
    {
        $id = $this->input->post('id');
        $this->db->where('group_id', $id);
        $data = $this->db->get('class')->result();
        
        echo json_encode($data);
    }

    public function ajaxClassIdToSubject()
    {
        $id = $this->input->post('id');
        $this->db->where('class_id', $id);
        $data = $this->db->get('subject')->result();
        
        echo json_encode($data);
    }

}