<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_checkin($nik)
    {
		return $this->db
                    ->select('em_user.*, em_usergroup.*')
					->from('em_user')
					->join('em_usergroup','em_usergroup.id = em_user.id_user_group','LEFT') 
					->where('em_user.is_active','active')
					->where('em_user.nik',$nik)
                    ->get();
    }
    
    //============================ Insert Data ===============================
    public function insert_sample_user($data)
	{
		$this->db->insert('em_user',$data);		
	}
    public function insert_activities_user($data)
	{
		$this->db->insert('em_activitiesUser',$data);		
	}
}