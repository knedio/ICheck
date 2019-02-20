<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginModel extends CI_Model{
    function __construct() 
    {
		parent::__construct();
    }
    public function verifyLogin($user_no, $password)
    {
        $this->db->select("u.*,p.*");
        $this->db->from('tbl_users u,tbl_position p');
        $this->db->where('u.position_id = p.position_id');
        $this->db->where('u.user_no',$user_no);
        $this->db->where('u.user_status', 'Active');
        $this->db->where('u.password',md5($password));
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            return $query->result_array()[0];
        }
        else
        {
            return false;
        }
    }
}