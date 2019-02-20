<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstructorModel extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
    }

    /*---- Get ----*/

    public function getSchedule($user_id,$sy_from,$sy_to,$semester)
    {
        $this->db->select('u.*,s.*,b.*,r.*');
        $this->db->from('tbl_users u,tbl_schedule s, tbl_building b, tbl_rooms r');
        $this->db->where('u.user_id',$user_id);
        $this->db->where('s.SY_from',$sy_from);
        $this->db->where('s.SY_to',$sy_to);
        $this->db->where('s.semester',$semester);
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.room_id = r.room_id');
        $this->db->where('r.bldg_id = b.bldg_id');
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
    public function getRequest($id,$stat)
    {
        $this->db->select('rq.*,t.*,s.*,u.*');
        $this->db->from('tbl_request rq, tbl_timelogs t,tbl_schedule s,tbl_users u');
        $this->db->where('rq.timelogs_id = t.timelogs_id');
        $this->db->where('t.sched_id = s.sched_id');
        $this->db->where('s.user_id = u.user_id');
        $this->db->where('u.user_id',$id);
        $this->db->where('rq.request_status',$stat);
        $query = $this->db->get();
        return $query->result();
    }
    public function getPassword($id)
    {
        $this->db->select("password");
        $this->db->from('tbl_users');
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->result_array()[0];
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
    public function getDep()
    {
        $this->db->select("*")->from('tbl_department');
        $query = $this->db->get();
        return $query->result();
    }
    public function getPosition()
    {
        $this->db->select("*")->from('tbl_position');
        $query = $this->db->get();
        return $query->result();
    }
    public function getTimeLogs($id)
    {
        $this->db->select('u.*,d.*,p.*,s.*,t.*');
        $this->db->from('tbl_users u, tbl_department d,tbl_position p,tbl_schedule s,tbl_timelogs t');
        $this->db->where('u.user_id', $id);
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.department_id = d.department_id');
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = t.sched_id');
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
    public function getReportDepIndividual($id,$date)
    {
        $this->db->select('u.*,s.*,t.*,v.*');
        $this->db->from('tbl_users u, tbl_schedule s,tbl_timelogs t,view_hrsworkpersched v');
        $this->db->where('u.user_id', $id);
        $this->db->where('t.date', $date);
        $this->db->where('u.user_id = s.user_id');
        $this->db->where('s.sched_id = v.sched_id');
        $this->db->where('t.sched_id = v.sched_id');
        $this->db->where('t.date = v.date');
        $this->db->group_by('v.sched_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function checkReqTimeLogsID($timelogs_id)
    {
        $this->db->select('timelogs_id');
        $this->db->from('tbl_request');
        $this->db->where('timelogs_id',$timelogs_id);
        $this->db->where('request_status','Pending');
        $query = $this->db->get();
        return $query->result();
    }

    /*---- Get End ----*/

    /*---- Add ----*/
    public function addRequest($data)
    {
        $this->db->insert('tbl_request', $data);
    }
    /*---- Add End ----*/

    /*---- Update ----*/
    public function updateRequest($id,$data)
    {
        $this->db->set($data);
        $this->db->where('request_id',$id);
        $this->db->update('tbl_request');
    }
    public function updateProfile($id,$data)
    {
        $this->db->set($data);
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
        $this->session->set_userdata($data);
    }
    public function update_password($id, $new_password)
    {
        $this->db->set('password',md5($new_password));
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users');
    }
    /*---- Update End ----*/
}
