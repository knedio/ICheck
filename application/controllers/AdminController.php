<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct() 
	{
		date_default_timezone_set('Asia/Manila');
		parent::__construct();
		$this->load->model('AdminModel');
		$this->load->library('csvimport');
        $this->load->helper('csv_helper');
		if($this->session->userdata('user_id') != TRUE){
			redirect(base_url() . 'LoginController/loginView');
		}
		if($this->session->userdata('position_type') == "Instructor"){
			redirect(base_url() . 'InstructorController/index');
		}
    
    }

	/*---- View ----*/

    public function index()
	{
		$this->dashboard();
	}
	public function dashboard()
	{
		$data['activeIns'] = $this->AdminModel->getCurrentActiveInstructor();
		$data['lates'] = $this->AdminModel->getLate();
		$data['absents'] = $this->AdminModel->getAbsent();
		$data['totalInstructor'] = $this->AdminModel->total_instructor();
		$data['totalDepartment'] = $this->AdminModel->totalDepartment();
		$data['totalCurActInstructor'] = $this->AdminModel->totalCurrentActiveInstructor();
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('include/admin/admin_footer');
	}
	/* ---- Reports 1st page----  */
	public function reportsSelectDep()
	{
		$depID = $this->input->get('department_id');
		$result = $this->AdminModel->timeLogsSelectInstructor($depID); 
		if (empty($depID)) {
			$data['instructor'] = $this->AdminModel->getInstructor(); 
		}else { $data['instructor'] = $result; }
		$data['depID'] = $depID;
		$data['deps'] = $this->AdminModel->getDep(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/reportsSelectDep',$data);
		$this->load->view('include/admin/admin_footer');
	}
	/* ---- Individual Reports  ----  */
	public function reportsIndiTab()
	{
		$user_id = $this->input->get('user_id');
		$date_from = $this->input->get('date_from');
		$date_to = $this->input->get('date_to');
		 
		$data['lists'] = $this->AdminModel->getReportIndi($user_id,$date_from,$date_to);
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/reportsIndiTabDaily',$data);
		$this->load->view('include/admin/admin_footer');
	}

	/* ---- Reports by Department  ----*/
	public function reportsDepList()
	{
		$department_id = $this->input->get('department_id');
		$date_from = $this->input->get('date_from');
		$date_to = $this->input->get('date_to');

		$data['datefrom'] = $date_from;
		$data['dateto'] = $date_to;
		$data['date'] =  date('m/d/Y',strtotime($date_from)).' - '.date('m/d/Y',strtotime($date_to));
		$data['dep'] = $this->AdminModel->getSpecificDep($department_id);
		$data['lists'] = $this->AdminModel->getReportDep($department_id,$date_from,$date_to);
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/reportByDep',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function getReportsBySchedule()
	{
		$department_id = $this->input->get('department_id');
		$date_from = $this->input->get('date_from');
		$date_to = $this->input->get('date_to');
		$status = $this->input->get('status');
		$data['status'] = $status;
		$data['data'] = $department_id;
		$data['datefrom'] =  date('m/d/Y',strtotime($date_from));
		$data['dateto'] =  date('m/d/Y',strtotime($date_to));
		$data['dep'] = $this->AdminModel->getSpecificDep($department_id);
		if ($status == 'All') {
			$data['lists'] = $this->AdminModel->getReportDepBySched($department_id,$date_from,$date_to);
		}else {
			$data['lists'] = $this->AdminModel->getReportDepBySchedWithStat($department_id,$date_from,$date_to,$status);
		 }
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/reportBySchedule',$data);
		$this->load->view('include/admin/admin_footer2');

	}
	
	public function reportsDepListIndividual()
	{
		$id = $this->uri->segment(3);
		$date = $this->uri->segment(4);
		$data = $this->AdminModel->getReportDepIndividual($id,$date);
		$data['lists'] = $data;
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/reportsListIndividual',$data);
		$this->load->view('include/admin/adminFooterRepIndi');
		
	}
	/* ---- Report End ----  */

	public function timeLogsSelectInstructor()
	{
		$depID = $this->input->get('department_id');
		$result = $this->AdminModel->timeLogsSelectInstructor($depID); 
		if (empty($depID)) {
			$data['instructor'] = $this->AdminModel->getInstructor(); 
		}else { $data['instructor'] = $result; }
		$data['depID'] = $depID;
		$data['deps'] = $this->AdminModel->getDep(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/timeLogsSelectInstructor',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function timeLogsList()
	{
		$user_id =  $this->input->get('user_id');
		$date = $this->input->get('date');
		 
		$data['lists'] = $this->AdminModel->getTimeLogsTemp($user_id,$date);
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/timeLogsList',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function schedule()
	{
		$data['semester'] = $this->AdminModel->getSemester(); 
		$data['schoolyear'] = $this->AdminModel->getSchoolYear(); 
		$data['deps'] = $this->AdminModel->getDep(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/schedule',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function scheduleLists()
	{
		$department_id = $this->input->get('department_id');
		$sy = $this->input->get('sy');
		$semester = $this->input->get('semester');
		if (!empty($sy)) {
			$newsy = explode("-",$sy);
			$sy_from = $newsy[0];
			$sy_to = $newsy[1];
			$data['scheds'] = $this->AdminModel->getSchedule($department_id,$sy_from,$sy_to,$semester); 
			$data['semester'] = $this->AdminModel->getSemester(); 
			$data['rooms'] = $this->AdminModel->getRooms(); 
			$data['depid'] = $department_id; 
		}
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/scheduleList',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function room()
	{
		$data['bldgs'] = $this->AdminModel->getBuildings(); 
		$data['rooms'] = $this->AdminModel->getRooms(); 
		$data['devices'] = $this->AdminModel->getDevices(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/room',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function user()
	{
		$data['admins'] = $this->AdminModel->getAdmin(); 
		$data['instructors'] = $this->AdminModel->getInstructor(); 
		$data['deps'] = $this->AdminModel->getDep(); 
		$data['positions'] = $this->AdminModel->getPosition(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/user',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function other()
	{
		$data['deps'] = $this->AdminModel->getDep(); 
		$data['positions'] = $this->AdminModel->getPosition(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/other',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function profile()
	{
		$id = $this->session->userdata('user_id');	
		$data['user'] = $this->AdminModel->getSpecificUser($id); 
		$data['deps'] = $this->AdminModel->getDep(); 
		$data['positions'] = $this->AdminModel->getPosition(); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/profile',$data);
		$this->load->view('include/admin/admin_footer');
	}
	public function requests()
	{
		$data['pendings'] = $this->AdminModel->getRequest('Pending'); 
		$data['declined'] = $this->AdminModel->getRequest('Declined'); 
		$data['approved'] = $this->AdminModel->getRequest('Approved'); 
		$this->load->view('include/admin/admin_header');
		$this->load->view('admin/request',$data);
		$this->load->view('include/admin/admin_footer');
	}
    /*---- End View ----*/

	/*---- Export ----*/
    public function exportDailyHrReport() {
		$data = $this->uri->segment(3);
		$newdata = explode('.', $data);
        $export_arr = array();
        $employee_details =  $this->AdminModel->getReportDep($newdata[0],$newdata[1],$newdata[2]);
        $title = array("User No", "Name","Total Classes Attended","Hrs Required","Hrs Work", "Date");
        array_push($export_arr, $title);
        if (!empty($employee_details)) {
            foreach ($employee_details as $employee) {
                array_push($export_arr, array($employee['user_no'], $employee['lname'].' '.$employee['fname'],$employee['totalclass'],$employee['daily_hrs_required'], $employee['hrswork_perday'], $employee['date']));
            }
        }
        convert_to_csv($export_arr, 'InstructorsReport' . date('F d Y') . '.csv', ',');
    }
    public function exportHrPerSched() {
		$data = $this->uri->segment(3);
		$selected = $this->uri->segment(4);
		$newdata = explode('_', $data);
		$export_arr = array();
        if ($selected == 'All123') {
        	$employee_details =  $this->AdminModel->getReportDepIndividual($newdata[1],$newdata[2]);
        }elseif ($selected == 'Present123') {
        	$employee_details =  $this->AdminModel->getReportDepIndiWithStat($newdata[1],$newdata[2],'Present');
        }elseif ($selected == 'Late123') {
        	$employee_details =  $this->AdminModel->getReportDepIndiWithStat($newdata[1],$newdata[2],'Late');
        }elseif ($selected == 'Absent123') {
        	$employee_details =  $this->AdminModel->getReportDepIndiWithStat($newdata[1],$newdata[2],'Absent');
        }
        $title = array("Name","Bldg. - Rm.","Schedule Time","Hrs required","Hrs Work","Status","School Year");
        array_push($export_arr, $title);
        if (!empty($employee_details)) {
            foreach ($employee_details as $employee) {
                array_push($export_arr, array($employee->lname.', '.$employee->fname,$employee->bldg_no.' - '.$employee->room_no,$employee->time_from.' - '.$employee->time_to,$employee->hrs_required,$employee->hrswork,$employee->status,$employee->SY_from.' - '.$employee->SY_to));
            }
        }
        convert_to_csv($export_arr, $newdata[0].' - '.date("m/d/Y",strtotime($newdata[2])) . '.csv', ',');
    }
    public function exportSchedByDep() {
		$data =  $this->uri->segment(3);
		$newdata = explode('_', $data);

		$date =  $this->uri->segment(4);
		$datenew = explode('.', $date);

		$export_arr = array();
        if ($newdata[2] == 'All123') {
        	$employee_details =  $this->AdminModel->getReportDepBySched($newdata[0],$datenew[0],$datenew[1]);
        }elseif ($newdata[2] == 'Present123') {
        	$employee_details =  $this->AdminModel->getReportDepBySchedWithStat($newdata[0],$datenew[0],$datenew[1],'Present');
        }elseif ($newdata[2] == 'Late123') {
        	$employee_details =  $this->AdminModel->getReportDepBySchedWithStat($newdata[0],$datenew[0],$datenew[1],'Late');
        }elseif ($newdata[2] == 'Absent123') {
        	$employee_details =  $this->AdminModel->getReportDepBySchedWithStat($newdata[0],$datenew[0],$datenew[1],'Absent');
        }else{}
        $title = array("Name","Bldg. - Rm.","Schedule Time","Hrs required","Hrs Work","Date","Classes Per Week","Status","School Year");
        array_push($export_arr, $title);
        if (!empty($employee_details)) {
            foreach ($employee_details as $employee) {$classPerWeek = $this->AdminModel->getClassPerWeek($employee['user_id']);
                array_push($export_arr, array($employee['lname'].', '.$employee['fname'],$employee['bldg_no'].' - '.$employee['room_no'],$employee['time_from'].' - '.$employee['time_to'],$employee['hrs_required'],$employee['hrswork'],$employee['date'],$classPerWeek[0],$employee['status'],$employee['SY_from'].' - '.$employee['SY_to']));
            }
        }
        convert_to_csv($export_arr, $newdata[1].' '.$datenew[0].$datenew[1].'.csv', ',');
    }
    
	/*---- Export End ----*/

	/*---- Add ----*/

	public function addUser()
    {
    	$user_no =  $this->input->post('user_no');
    	$tags_id =  $this->input->post('tags_id');
    	$result = $this->AdminModel->checkUser($user_no,$tags_id);

    	if ($result != TRUE) {
    		$data = array(
			'user_no' => $user_no,
			'tags_id' => $tags_id,
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'password' => md5('123'),
			'department_id' => $this->input->post('department_id'),
			'position_id' => $this->input->post('position_id')
			);
			$this->AdminModel->addUser($data);
    	}else {
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
            $this->session->set_flashdata('flash','<b>Sorry!</b> Invalid data inputted!');
    	}

    	redirect(base_url().'AdminController/user');
    }
    public function addBuilding()
    {
    	$bldg_no = $this->input->post('bldg_no');
    	$result = $this->AdminModel->checkBuildingIfExist($bldg_no);
    	if ($result != TRUE) {
    		$data = array(
			'bldg_no' => $bldg_no,
			'bldg_name' => $this->input->post('bldg_name')
			);
			$this->AdminModel->addBuilding($data);
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','New data added!');
    	}else {
            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','The data inputted already used!');
    	}
		redirect(base_url().'AdminController/room#building');
    }
    public function addRoom()
    {
    	$room_no = $this->input->post('room_no');
    	$bldg_id = $this->input->post('bldg_id');
    	$device_id = $this->input->post('device_id');
    	$result = $this->AdminModel->checkRoomIfExist($room_no,$bldg_id);
    	if ($result != TRUE) {
    		$data = array(
			'room_no' => $room_no,
			'bldg_id' => $bldg_id,
			'device_id' => $device_id,
			'pin_no' => $this->input->post('pin_no')
			);
			$this->AdminModel->addRoom($data);
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','New data added!');
    	}else {
            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','The data inputted already used!');
    	}
        
		redirect(base_url().'AdminController/room');
    }
    public function addDevice()
    {
    	$rpi_mac_address = $this->input->post('rpi_mac_address');
    	$result = $this->AdminModel->checkDeviceIfExist($rpi_mac_address);
    	if ($result != TRUE) {
    		$data = array(
				'rpi_mac_address' => $rpi_mac_address
			);
			$this->AdminModel->addDevice($data);
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','New data added!');
    	}else {
            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','The data inputted already used!');
    	}
		redirect(base_url().'AdminController/room');
    }
    public function addDep()
    {
        $data = array(
		'department_name' => $this->input->post('department_name')
		);
		$this->AdminModel->addDep($data);
		redirect(base_url().'AdminController/other#department');
    }
    public function addPosition()
    {
        $data = array(
		'position_type' => $this->input->post('position_type')
		);
		$this->AdminModel->addPosition($data);
		redirect(base_url().'AdminController/other#position');
    }
    public function import()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach($file_data as $row)
		{
			$room_no = $row["room_no"];
			$bldg_no = $row["bldg_no"];
			$user_no = $row["user_no"];
			$result = $this->AdminModel->getSpecificRoom($room_no,$bldg_no);
			$result2 = $this->AdminModel->getUserID($user_no);
			$data[] = array(
				'user_id'		=>	$result2['user_id'],
        		'room_id'		=>	$result['room_id'],
        		'section'		=>	$row["section"],
        		'time_from'		=>	$row["time_from"],
        		'time_to'		=>	$row["time_to"],
        		'day'			=>	$row["day"],
        		'SY_from'		=>	$row["SY_from"],
        		'SY_to'			=>	$row["SY_to"],
        		'semester'		=>	$row["semester"]
				);
		}
		if ($result == TRUE && $result2 == TRUE ) {
				$this->AdminModel->insert($data);
				$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
            	$this->session->set_flashdata('flash','File successfully added!');
			}else {
				$this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
            	$this->session->set_flashdata('flash','<strong>Sorry! </strong>Some data is not correctly inputted or data may not exist.');
			}
		
		redirect(base_url().'AdminController/schedule');
	}
	

    /*---- End Add ----*/

    /*---- Update ----*/

    public function updateSched()
	{
		$id = $this->input->post('schedule_id');
		$data = array(
		'room_id' => $this->input->post('room_id'),
		'section' => $this->input->post('section'),
		'time_from' => $this->input->post('time_from'),
		'time_to' => $this->input->post('time_to'),
		'day' => $this->input->post('day'),
		'SY_from' => $this->input->post('SY_from'),
		'SY_to' => $this->input->post('SY_to'),
		'semester' => $this->input->post('semester')
		);
		$this->AdminModel->updateSched($id,$data);
		$seg = 'department_id='.$this->input->post('depid').'&sy='.$this->input->post('SY_from').'-'.$this->input->post('SY_to').'&semester='.$this->input->post('semester');
		redirect(base_url().'AdminController/scheduleLists/?'.$seg);
	}
    public function updateReqStatus()
    {
    	$id =  $this->input->post('request_id');
    	$timeid =  $this->input->post('timelogs_id');
    	$sid =  $this->input->post('sched_id');
    	$time_from =  $this->input->post('time_from');
    	$time_to =  $this->input->post('time_to');
    	$dp =  $this->input->post('dp');
    	$name=$this->session->userdata('fname').' '.$this->session->userdata('mname').' '.$this->session->userdata('lname');
    	if ($this->input->post('stat') == 'Approve') {
    		$stat = 'Approved';
			$this->AdminModel->updateLogs($sid,$time_from,$time_to,$dp);
			$this->AdminModel->updateTimeLogsStatus($timeid,'Present');
 		}else{$stat = 'Declined';}
        $data = array(
		'request_status' => $stat,
		'request_response' => $this->input->post('request_response'),
		'accepted_by' => $name
		);
		$this->AdminModel->updateReqStatus($id,$data);
		
		redirect(base_url().'AdminController/requests');
    }
    public function updateUser()
	{
		try{

		    $id = $this->input->post('user_id');
			$data = array(
			'user_no' => $this->input->post('user_no'),
			'tags_id' => $this->input->post('tags_id'),
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'department_id' => $this->input->post('department_id'),
			'position_id' => $this->input->post('position_id')
			);
			$this->AdminModel->updateUser($id,$data);
			redirect(base_url().'AdminController/user');
		}catch(Exception $e){
			redirect(base_url().'AdminController/user');
		}
	}
	public function updateProfile()
	{

		try{

		    $id = $this->input->post('user_id');
			$data = array(
			'user_no' => $this->input->post('user_no'),
			'tags_id' => $this->input->post('tags_id'),
			'fname' => $this->input->post('fname'),
			'mname' => $this->input->post('mname'),
			'lname' => $this->input->post('lname'),
			'department_id' => $this->input->post('department_id'),
			'position_id' => $this->input->post('position_id')
			);
			$this->AdminModel->updateProfile($id,$data);
			redirect(base_url().'AdminController/profile');
		}catch(Exception $e){
			redirect(base_url().'AdminController/profile');
		}
		
	}
	public function updateBuilding()
    {
    	$id =  $this->input->post('bldg_id');
    	$bldg_no = $this->input->post('bldg_no');
    	$result = $this->AdminModel->checkBuildingIfExist($bldg_no);
    	
		if ($bldg_no == $this->input->post('bldg_no2')) {
			$data = array(
			'bldg_name' => $this->input->post('bldg_name')
			);
		}else {
			if ($result != TRUE) {
    			$data = array(
				'bldg_no' => $bldg_no,
				'bldg_name' => $this->input->post('bldg_name')
				);
			}else {
	            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
	            $this->session->set_flashdata('flash','<strong>Sorry! </strong>The data inputted already used!');
	    	}
		}
		$this->AdminModel->updateBuilding($id,$data);
		
		redirect(base_url().'AdminController/room#building');
    }
    public function updateRoom()
    {

    	$id = $this->input->post('room_id');
    	$room_no = $this->input->post('room_no');
        $bldg_id = $this->input->post('bldg_id');
        $result = $this->AdminModel->checkRoomIfExist($room_no,$bldg_id);
        if ($bldg_id == $this->input->post('bldg_id2') && $room_no == $this->input->post('room_no2')) {
			$data = array('device_id' => $this->input->post('device_id'),'pin_no' => $this->input->post('pin_no'));
		}else if ($bldg_id == $this->input->post('bldg_id2')) {
			if ($result != TRUE) {
			$data = array(
            'room_no' => $room_no,'device_id' => $this->input->post('device_id'),'pin_no' => $this->input->post('pin_no')
            );
			}else {
	            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
	            $this->session->set_flashdata('flash','<strong>Sorry! </strong>The data inputted already used!');
        	}
		}else if ($room_no == $this->input->post('room_no2')) {
			if ($result != TRUE) {
			$data = array(
            'bldg_id' => $bldg_id,'device_id' => $this->input->post('device_id'),'pin_no' => $this->input->post('pin_no')
            );
            }else {
	            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
	            $this->session->set_flashdata('flash','<strong>Sorry! </strong>The data inputted already used!');
        	}
		}else {
			if ($result != TRUE) {
            $data = array(
            'room_no' => $room_no,'bldg_id' => $bldg_id,
            'device_id' => $this->input->post('device_id'),'pin_no' => $this->input->post('pin_no')
            );
			}else {
	            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
	            $this->session->set_flashdata('flash','<strong>Sorry! </strong>The data inputted already used!');
        	}
        }
        $this->AdminModel->updateRoom($id,$data);
		redirect(base_url().'AdminController/room');
    }
    public function updateDevice()
    {
    	$id = $this->input->post('device_id');
    	$rpi_mac_address = $this->input->post('rpi_mac_address');
    	$result = $this->AdminModel->checkDeviceIfExist($rpi_mac_address);
    	if ($result != TRUE) {
    		$data = array(
				'rpi_mac_address' => $rpi_mac_address
			);
			$this->AdminModel->updateDevice($id,$data);
			$this->session->set_flashdata('class',"<div class='alert alert-success col-lg-6 col-md-offset-3'>");
            $this->session->set_flashdata('flash',"Device updated successfully!");
    	}else {
            $this->session->set_flashdata('class',"<div class='alert alert-danger col-lg-6 col-md-offset-3'>");
    		$this->session->set_flashdata('flash','<strong>Sorry! </strong>The data inputted already used!');
    	}
		redirect(base_url().'AdminController/room#device');
    }
    public function updateDep()
	{
		$id = $this->input->post('department_id');
		$data = array(
		'department_name' => $this->input->post('department_name')
		);
		$this->AdminModel->updateDep($id,$data);
		
		redirect(base_url().'AdminController/other#department');
	}
	public function updatePosition()
	{
		$id = $this->input->post('position_id');
		$data = array(
		'position_type' => $this->input->post('position_type')
		);
		$this->AdminModel->updatePosition($id,$data);
		
		redirect(base_url().'AdminController/other#position');
	}
	public function update_password()
	{
		$id = $this->session->userdata('user_id');
		$new_password = $this->input->post('new_password');
		$retype_password = $this->input->post('retype_password');
		$password = $this->input->post('password');
		$dbpassword = $this->AdminModel->getPassword($id);
		if(md5($password) == $dbpassword['password']) {
			if($retype_password == $new_password){
				$this->AdminModel->update_password($id,$new_password);
				$this->session->set_flashdata('flash', 'Password updated successfully.');
				redirect(base_url() . "AdminController/profile");
			} else {
				$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Password did not match.');
				redirect(base_url() . "AdminController/profile");
			}

		} else {
			$this->session->set_flashdata('flash', '<strong>Invalid!</strong> Incorrect password.');
			redirect(base_url() . "AdminController/profile");
		}
	}
	public function reset_password()
	{
		$id = $this->uri->segment(3);
		$this->AdminModel->reset_password($id);
		redirect(base_url() . 'AdminController/user');
	}
	public function deactivate_account()
	{
		$id = $this->uri->segment(3);
		$this->AdminModel->deactivate_account($id);
		redirect(base_url() . 'AdminController/user');
	}
	public function activate_account()
	{
		$id = $this->uri->segment(3);
		$this->AdminModel->activate_account($id);
		redirect(base_url() . 'AdminController/user');
	}
    /*---- End Update ----*/

    /*---- Delete ----*/

    public function deleteDep()
	{
		$id = $this->uri->segment(3);
		$this->AdminModel->deleteDep($id);
		redirect(base_url().'AdminController/user');
	}
	public function deletePosition()
	{
		$id = $this->uri->segment(3);
		$this->AdminModel->deletePosition($id);
		redirect(base_url().'AdminController/user');
	}
    /*---- End Delete ----*/
    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . "LoginController/loginView");
	}
}
