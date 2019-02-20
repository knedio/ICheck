<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminModel extends CI_Model{
    function __construct() 
    {
		parent::__construct();
    }

    /*---- Get ----*/

    public function getRequest($stat)
    {
        $this->db->select('rq.*,t.*,s.*,u.*');
        $this->db->from('tbl_request rq, tbl_timelogs t,tbl_schedule s,tbl_users u');
        $this->db->where('rq.timelogs_id = t.timelogs_id');
        $this->db->where('t.sched_id = s.sched_id');
        $this->db->where('s.user_id = u.user_id');
        $this->db->where('rq.request_status',$stat);
        $query = $this->db->get();
        return $query->result();
    }
    public function getClassPerWeek($user_id)
    {
        $this->db->select('COUNT(sched_id) as classPerWeek');
        $this->db->from('tbl_schedule');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->classPerWeek;
    }
    public function getReportDepBySched($department_id,$date_from,$date_to)
    {
        $this->db->select('s.time_from,s.time_to,v.hrswork,v.hrs_required,t.date,t.status,t.sched_id,s.SY_from,s.SY_to,u.user_id,u.user_no,u.fname,u.mname,u.lname,r.room_no,b.bldg_no, COUNT(v.sched_id) as classPerWeek');
        $this->db->from('tbl_users u,tbl_schedule s, tbl_timelogs t, view_hrsworkpersched v, tbl_rooms r, tbl_building b');
        $this->db->where('s.user_id = u.user_id');
        $this->db->where('s.sched_id = t.sched_id');
        $this->db->where('v.sched_id = t.sched_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('t.date >=',date("Y-m-d",strtotime($date_from)));
        $this->db->where('t.date <=',date("Y-m-d",strtotime($date_to)));
        $this->db->group_by('t.sched_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getReportDepBySchedWithStat($department_id,$date_from,$date_to,$status)
    {
        $this->db->select('s.time_from,s.time_to,v.hrswork,v.hrs_required,t.date,t.status,t.sched_id,s.SY_from,s.SY_to,u.user_id,u.user_no,u.fname,u.mname,u.lname,r.room_no,b.bldg_no, COUNT(v.sched_id) as classPerWeek');
        $this->db->from('tbl_users u,tbl_schedule s, tbl_timelogs t, view_hrsworkpersched v, tbl_rooms r, tbl_building b');
        $this->db->where('s.user_id = u.user_id');
        $this->db->where('s.sched_id = t.sched_id');
        $this->db->where('v.sched_id = t.sched_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('t.status',$status);
        $this->db->where('t.date >=',date("Y-m-d",strtotime($date_from)));
        $this->db->where('t.date <=',date("Y-m-d",strtotime($date_to)));
        $this->db->group_by('t.sched_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getReportIndi($user_id,$date_from,$date_to)
    {
        $this->db->select('u.fname,u.mname,u.lname,u.user_no,u.user_id,v.date,v.hrswork,SEC_TO_TIME(sum(TIME_TO_SEC(v.hrswork))) AS hrswork_perday');
        $this->db->from('tbl_users u,tbl_schedule s,view_hrsworkpersched v');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = v.sched_id');
        $this->db->where('u.user_id',$user_id);
        $this->db->where('v.date >=',date("Y-m-d",strtotime($date_from)));
        $this->db->where('v.date <=',date("Y-m-d",strtotime($date_to)));
        $this->db->group_by('v.date, s.user_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getReportDep($department_id,$date_from,$date_to)
    {
        $this->db->select('u.fname,u.mname,u.lname,u.user_no,u.user_id,v.date,SEC_TO_TIME(sum(TIME_TO_SEC(v.hrswork))) AS hrswork_perday ,sec_to_time(sum(time_to_sec(s.time_to)) - sum(time_to_sec(s.time_from)) ) AS daily_hrs_required,
            count(v.sched_id) AS totalclass');
        $this->db->from('tbl_users u,tbl_schedule s,view_hrsworkpersched v');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = v.sched_id');
        $this->db->where('u.department_id',$department_id);
        $this->db->where('v.date >=',date("Y-m-d",strtotime($date_from)));
        $this->db->where('v.date <=',date("Y-m-d",strtotime($date_to)));
        $this->db->group_by('v.date, s.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getReportDepIndividual($id,$date)
    {
        $this->db->select('u.*,s.*,t.*,v.*,b.bldg_no,r.room_no');
        $this->db->from('tbl_users u, tbl_schedule s,tbl_timelogs t,view_hrsworkpersched v, tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id', $id);
        $this->db->where('t.date',date("Y-m-d",strtotime($date)));
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = v.sched_id');
        $this->db->where('t.sched_id = v.sched_id');
        $this->db->where('t.date = v.date');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->group_by('v.sched_id,v.date');
        $query = $this->db->get();
        return $query->result();
    }
    public function getReportDepIndiWithStat($id,$date,$status)
    {
        $this->db->select('u.*,s.*,t.*,v.*,b.bldg_no,r.room_no');
        $this->db->from('tbl_users u, tbl_schedule s,tbl_timelogs t,view_hrsworkpersched v, tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id', $id);
        $this->db->where('t.status', $status);
        $this->db->where('t.date',date("Y-m-d",strtotime($date)));
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = v.sched_id');
        $this->db->where('t.sched_id = v.sched_id');
        $this->db->where('t.date = v.date');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->group_by('v.sched_id,v.date');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTimeLogsTemp($id,$date)
    {
        $this->db->select('u.*,d.*,p.*,s.*,tt.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p,tbl_schedule s,tbl_timelogs_temp tt');
        $this->db->where('u.user_id', $id);
        $this->db->where('tt.date',date("Y-m-d",strtotime($date)));
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.department_id = d.department_id');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = tt.sched_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSpecificUser($id)
    {
        $this->db->select("u.*,p.*,d.*");
        $this->db->from('tbl_users u,tbl_position p,tbl_department d');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.department_id = d.department_id');
        $this->db->where('u.user_id',$id);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    public function getPassword($id)
    {
        $this->db->select("password");
        $this->db->from('tbl_users');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    public function getUsers()
    {
        $this->db->select('u.*,d.*,p.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.department_id = d.department_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSchedule($department_id,$sy_from,$sy_to,$semester)
    {
        $this->db->select('u.*,s.*,b.*,r.*');
        $this->db->from('tbl_users u,tbl_schedule s, tbl_building b, tbl_rooms r');
        $this->db->where('u.department_id',$department_id);
        $this->db->where('s.SY_from',$sy_from);
        $this->db->where('s.SY_to',$sy_to);
        $this->db->where('s.semester',$semester);
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getRooms()
    {
        $this->db->select('r.*,d.*,b.*');
        $this->db->from('tbl_rooms r, tbl_device d, tbl_building b');
        $this->db->where('r.device_id = d.device_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getBuildings()
    {
        $this->db->select('*');
        $this->db->from('tbl_building');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDevices()
    {
        $this->db->select("*")->from('tbl_device');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDep()
    {
        $this->db->select("*")->from('tbl_department');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSpecificDep($id)
    {
        $this->db->select("*")->from('tbl_department')->where('department_id',$id);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    public function getPosition()
    {
        $this->db->select("*")->from('tbl_position');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSpecificRoom($room_no,$bldg_no)
    {
        $this->db->select("r.room_id");
        $this->db->from('tbl_rooms r, tbl_building b');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('r.room_no',$room_no);
        $this->db->where('b.bldg_no',$bldg_no);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    public function getUserID($id){
        $this->db->select("user_id")->from('tbl_users')->where('user_no',$id);
        $query = $this->db->get();
        return $query->result_array()[0];
    }
    public function getAdmin()
    {
        $this->db->select('u.*,d.*,p.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p');
        $this->db->where('u.user_status','Active');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('p.position_type','Admin');
        $this->db->where('u.department_id = d.department_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getInstructor()
    {
        $this->db->select('u.*,d.*,p.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('p.position_type','Instructor');
        $this->db->where('u.department_id = d.department_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function timeLogsSelectInstructor($depID)
    {
        $this->db->select('u.*,d.*,p.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.user_status','Active');
        $this->db->where('u.department_id = d.department_id');
        $this->db->where('p.position_type','Instructor');
        $this->db->where('u.department_id',$depID);
        $query = $this->db->get();
        return $query->result();
    }
    public function getSemester()
    {
        $query = "SHOW COLUMNS FROM tbl_schedule LIKE 'semester'";
        $row = $this->db->query("SHOW COLUMNS FROM tbl_schedule LIKE 'semester'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        $enum_fields = $enum_array[1];
        foreach ($enum_fields as $key=>$value)
        {
            $enums[$value] = $value; 
        }
        return $enums;
    } 
    public function getSchoolYear()
    {
        $this->db->select("SY_from,SY_to")->from('tbl_schedule')->group_by("SY_from");
        $query = $this->db->get();
        return $query->result();
    } 
    public function getCurrentActiveInstructor()
    {
        $this->db->select('u.fname,u.mname,u.lname,s.time_from,s.time_to,r.room_no,b.bldg_no');
        $this->db->from('tbl_users u, tbl_timelogs_temp tt, tbl_schedule s,tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('tt.sched_id = s.sched_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('tt.date = CURDATE()');
        $this->db->where("tt.time_in >= s.time_from");
        $this->db->where("tt.time_in <= s.time_to");
        $this->db->where("TIME_FORMAT(NOW(), '%T') >= s.time_from");
        $this->db->where("TIME_FORMAT(NOW(), '%T') <= s.time_to");
        $this->db->group_by("tt.sched_id");
        $query = $this->db->get();
        return $query->result();
    }
    public function total_instructor()
    {
        $this->db->select('u.user_id')->from('tbl_users u, tbl_position p')->where('u.position_id = p.position_id')->where('u.user_status','Active')->where('p.position_type','Instructor');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function totalDepartment()
    {
        $this->db->select('department_id')->from('tbl_department')->where('department_name !=', 'None')->where('department_name !=', 'none');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function totalCurrentActiveInstructor()
    {
        $this->db->select('tt.temp_id');
        $this->db->from('tbl_timelogs_temp tt, tbl_schedule s');
        $this->db->where('tt.sched_id = s.sched_id');
        $this->db->where('tt.date = CURDATE()');
        $this->db->where("tt.time_in >= s.time_from");
        $this->db->where("tt.time_in <= s.time_to");
        $this->db->where("TIME_FORMAT(NOW(), '%T') >= s.time_from");
        $this->db->where("TIME_FORMAT(NOW(), '%T') <= s.time_to");
        $this->db->group_by("tt.sched_id");
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getLate()
    {
        $this->db->select('u.fname,u.mname,u.lname,s.time_from,s.time_to,r.room_no,b.bldg_no');
        $this->db->from('tbl_users u, tbl_schedule s, tbl_timelogs t, tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = t.sched_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('t.date = CURDATE()');
        $this->db->like('t.status', 'Late');
        $query = $this->db->get();
        return $query->result();
    }
    public function getAbsent()
    {
        $this->db->select('u.fname,u.mname,u.lname,s.time_from,s.time_to,r.room_no,b.bldg_no');
        $this->db->from('tbl_users u, tbl_schedule s, tbl_timelogs t, tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = t.sched_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
        $this->db->where('t.date = CURDATE()');
        $this->db->where('t.status','Absent');
        $query = $this->db->get();
        return $query->result();
    }
    public function checkRoomIfExist($room_no,$bldg_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where('room_no',$room_no);
        $this->db->where('bldg_id',$bldg_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function checkBuildingIfExist($bldg_no)
    {
        $this->db->select('*');
        $this->db->from('tbl_building');
        $this->db->where('bldg_no',$bldg_no);
        $query = $this->db->get();
        return $query->result();
    }
    public function checkDeviceIfExist($rpi_mac_address)
    {
        $this->db->select('*');
        $this->db->from('tbl_device');
        $this->db->where('rpi_mac_address',$rpi_mac_address);
        $query = $this->db->get();
        return $query->result();
    }
    public function checkUser($user_no,$tags_id)
    {
        $this->db->select('tags_id');
        $this->db->where('user_no',$user_no);
        $this->db->or_where('tags_id',$tags_id);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    /*---- End Get ----*/

    /*---- Add ----*/

    public function addUser($data)
    {
        $this->db->insert('tbl_users', $data);
    }
    public function addBuilding($data)
    {
        $this->db->insert('tbl_building', $data);
    }
    public function addRoom($data)
    {
        $this->db->insert('tbl_rooms', $data);
    }
    public function addDevice($data)
    {
        $this->db->insert('tbl_device', $data);
    }
    public function addDep($data)
    {
        $this->db->insert('tbl_department', $data);
    }
    public function addPosition($data)
    {
        $this->db->insert('tbl_position', $data);
    }
    public function insert($data)
    {
        $this->db->insert_batch('tbl_schedule', $data);
    }

    /*---- End Add ----*/


    /*---- Update ----*/

    public function updateLogs($sid,$time_from,$time_to,$dp)
    {
        $this->db->set('time_in',$time_from);
        $this->db->set('time_out',$time_to);
        $this->db->where('sched_id',$sid);
        $this->db->where('date',$dp);
        $this->db->update('tbl_timelogs_temp');
    }
    public function updateTimeLogsStatus($id, $status)
    {
        $this->db->set('status',$status);
        $this->db->where('timelogs_id',$id);
        $this->db->update('tbl_timelogs');
    }
    public function updateSched($id,$data)
    {
        $this->db->set($data);
        $this->db->where('sched_id',$id);
        $this->db->update('tbl_schedule');
    }
    public function updateReqStatus($id,$data)
    {
        $this->db->set($data);
        $this->db->where('request_id',$id);
        $this->db->update('tbl_request');
    }
    public function update_password($id, $new_password)
    {
        $this->db->set('password',md5($new_password));
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    public function updateUser($id,$data)
    {
        $this->db->set($data);
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    public function updateProfile($id,$data)
    {
        $this->db->set($data);
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    public function updateBuilding($id,$data)
    {
        $this->db->set($data);
        $this->db->where('bldg_id',$id);
        $this->db->update('tbl_building');
    }
    public function updateRoom($id,$data)
    {
        $this->db->set($data);
        $this->db->where('room_id',$id);
        $this->db->update('tbl_rooms');
    }
    public function updateDevice($id,$data)
    {
        $this->db->set($data);
        $this->db->where('device_id',$id);
        $this->db->update('tbl_device');
    }
    public function updateDep($id,$data)
    {
        $this->db->set($data);
        $this->db->where('department_id',$id);
        $this->db->update('tbl_department');
    }
    public function updatePosition($id,$data)
    {
        $this->db->set($data);
        $this->db->where('position_id',$id);
        $this->db->update('tbl_position');
    }
    public function reset_password($id)
    {
        $this->db->set('password',md5('123'));
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    public function deactivate_account($id)
    {
        $this->db->set('user_status','Deactivated');
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    public function activate_account($id)
    {
        $this->db->set('user_status','Active');
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }

    /*---- End Update ----*/

    /*---- Delete ----*/

    public function deleteDep($id){
      $this->db->where('department_id', $id);
      $this->db->delete('tbl_department');
    }
    public function deletePosition($id){
      $this->db->where('position_id', $id);
      $this->db->delete('tbl_position');
    }
    /*---- End Delete ----*/
}