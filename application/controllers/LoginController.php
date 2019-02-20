<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct() 
	{
		date_default_timezone_set('Asia/Manila');
		parent::__construct();
		$this->load->model('LoginModel');
		if($this->session->userdata('position_type') == "Admin"){
			redirect(base_url() . 'AdminController/index');
		}elseif ($this->session->userdata('position_type') == "Instructor") {
			redirect(base_url() . 'InstructorController/index');
		}
    }

	/*---- View ----*/

    public function index()
	{
		$this->loginView();
	}

	public function loginView()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$user_no = $this->input->post('user_no');
		$password = $this->input->post('password');
		$results = $this->LoginModel->verifyLogin($user_no,$password);

		if($results)
		{	
			
			$session_data = array(
					'user_id' => $results['user_id'],
					'fname' => $results['fname'],
					'mname' => $results['mname'],
					'lname' => $results['lname'],
					'position_type' => $results['position_type']
				);
			$this->session->set_userdata($session_data);
			if ($results['position_type'] == "Admin") {
				redirect(base_url() . 'AdminController/index');
			}else if ($results['position_type'] == "Instructor") {
				redirect(base_url() . 'InstructorController/index');
			}
			
		} else {
			$this->session->set_flashdata('invalid','Invalid User No. or password.');
			redirect(base_url() . 'LoginController/loginView');
		}
	}
}
