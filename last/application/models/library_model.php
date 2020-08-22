<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class library_model extends CI_Model
	{
		private $creator;
		private $cur_bd_date;
			
		public function __construct()
		{
			parent::__construct();
			date_default_timezone_set('Asia/Dhaka');
			//$this->creator 			= $this->tank_auth->get_user_id();
			$this->cur_bd_date  	= date('Y-m-d');
		}

		public function hello()
		{
			return '';
		}
		
		function all_institute_list()
		{
				$query = $this->db->select('institute_info.*,users.username,users.user_full_name') 
								-> from('institute_info,users')
								-> where('institute_info.institute_creator = users.id')
								-> where('institute_info.institute_code',$this -> institute_id)
								-> get();
			return $query;
		}
		
		function demo_check()
		{
				$query = $this->db->select('*') 
								-> from('notice')
								-> get();
			return $query;
		}
	}
	