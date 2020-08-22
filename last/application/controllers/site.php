<?php
defined('BASEPATH') or exit('No direct script access allowed');

class site extends CI_Controller
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
            if ($user->student == 1) {  // Not Admin check
                $this->load->view('admin/include/admin_header');
                $this->load->view($view, $data);
                $this->load->view('admin/include/admin_footer');
            }else{
                redirect('/auth/login/');
            }
        }
    }

	public function index()
	{
		$this->render_page('admin/setup/index', 'as');
	}


	
}
