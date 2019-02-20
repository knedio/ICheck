<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstructorController extends CI_Controller {
	public function __construct() 
	{
		date_default_timezone_set('Asia/Manila');
		parent::__construct();
		$this->load->model('InstructorModel');
		if($this->session->userdata('user_id') != TRUE){
			redirect(base_url() . 'LoginController/loginView');
		}
		if($this->session->userdata('position_type') == "Admin"){
			redirect(base_url() . 'AdminController/index');
		}
    
    }

	/*---- View ----*/

    public function index()
	{
		$this->reportsSelectDate();
	}
	public function schedule()
	{
		$data['semester'] = $this->InstructorModel->getSemester(); 
		$data['schoolyear'] = $this->InstructorModel->getSchoolYear(); 
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/schedule',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	public function scheduleLists()
	{
		$user_id = $this->session->userdata('user_id');
		$sy = $this->input->get('sy');
		$semester = $this->input->get('semester');
		if (!empty($sy)) {
			$newsy = explode("-",$sy);
			$sy_from = $newsy[0];
			$sy_to = $newsy[1];
			$data['scheds'] = $this->InstructorModel->getSchedule($user_id,$sy_from,$sy_to,$semester); 
		}
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/scheduleList',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	public function reportsSelectDate()
	{
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/reportsSelectDate');
		$this->load->view('include/instructor/instructor_footer');
	}
	public function reportsList()
	{
		$user_id = $this->session->userdata('user_id');
		$date_from = $this->input->get('date_from');
		$date_to = $this->input->get('date_to');;
		
		$data['date_from'] = $date_from;
		$data['date_to'] = $date_to;
		$data['lists'] = $this->InstructorModel->getReportIndi($user_id,$date_from,$date_to);
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/reportsList',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	public function reportsListIndividual()
	{
		$id = $this->uri->segment(3);
		$date = $this->uri->segment(4);
		$data = $this->InstructorModel->getReportDepIndividual($id,$date);
		if ($data == FALSE) {
			$this->reportsList();
			
		}else{
			$data['lists'] = $data;
			$this->load->view('include/instructor/instructor_header');
			$this->load->view('instructor/reportsListIndividual',$data);
			$this->load->view('include/instructor/instructor_footer');
		}
	}
	public function timelogsSelectDate()
	{
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/timelogsSelectDate');
		$this->load->view('include/instructor/instructor_footer');
	}
	public function timeLogsList()
	{
		$user_id = $this->session->userdata('user_id');
		$date = $this->input->get('date');
		
		$data['date'] = $date;
		$data['lists'] = $this->InstructorModel->getTimeLogsTemp($user_id,$date);
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/timeLogsList',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	public function profile()
	{
		$id = $this->session->userdata('user_id');	
		$data['user'] = $this->InstructorModel->getSpecificUser($id); 
		$data['deps'] = $this->InstructorModel->getDep(); 
		$data['positions'] = $this->InstructorModel->getPosition(); 
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/profile',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	public function requests()
	{
		$user_id = $this->session->userdata('user_id');
		$data['pendings'] = $this->InstructorModel->getRequest($user_id,'Pending'); 
		$data['declined'] = $this->InstructorModel->getRequest($user_id,'Declined'); 
		$data['approved'] = $this->InstructorModel->getRequest($user_id,'Approved'); 
		$this->load->view('include/instructor/instructor_header');
		$this->load->view('instructor/request',$data);
		$this->load->view('include/instructor/instructor_footer');
	}
	/*---- View End ----*/

	/*---- Add ----*/
	public function addRequest()
    {
    	$id = $this->session->userdata('user_id');
		$date = $this->input->post('date');
		$timelogs_id = $this->input->post('timelogs_id');
        
		$result = $this->InstructorModel->checkReqTimeLogsID($timelogs_id);
    	if ($result != TRUE) {
    		$data = array(
			'timelogs_id' => $timelogs_id,
			'requestor_note' => $this->input->post('requestor_note')
			);
			$this->InstructorModel->addRequest($data);
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','New request added!');
    	}else {
            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','You already sent a request!');
    	}
		redirect(base_url().'InstructorController/reportsListIndividual/'.$id.'/'.$date);
    }
	/*---- Add End ----*/

	/*---- Update ----*/
	public function updateRequest()
	{
		$id = $this->input->post('request_id');
		$data = array(
		'requestor_note' => $this->input->post('requestor_note')
		);
		$this->InstructorModel->updateRequest($id,$data);
		redirect(base_url().'InstructorController/requests');
	}
	public function updateProfile()
	{
		$id = $this->input->post('user_id');
		$data = array(
		'fname' => $this->input->post('fname'),
		'mname' => $this->input->post('mname'),
		'lname' => $this->input->post('lname'),
		'department_id' => $this->input->post('department_id')
		);
		$this->InstructorModel->updateProfile($id,$data);
		redirect(base_url().'InstructorController/profile');
	}
	public function update_password()
	{
		$id = $this->session->userdata('user_id');
		$new_password = $this->input->post('new_password');
		$retype_password = $this->input->post('retype_password');
		$password = $this->input->post('password');
		$dbpassword = $this->InstructorModel->getPassword($id);
		if(md5($password) == $dbpassword['password']) {
			if($retype_password == $new_password){
				$this->InstructorModel->update_password($id,$new_password);
				$this->session->set_flashdata('flash', 'Password updated successfully.');
				redirect(base_url() . "InstructorController/profile");
			} else {
				$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Password did not match.');
				redirect(base_url() . "InstructorController/profile");
			}

		} else {
			$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Incorrect password.');
			redirect(base_url() . "InstructorController/profile");
		}
	}
	/*---- Update End ----*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . "LoginController/loginView");
	}
}
