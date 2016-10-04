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

    public function select_audit_trail_individual()
    {
    	return $this->db
    				->select('em_user.*, em_activitiesUser.*')
					->from('em_activitiesUser')
					->join('em_user','em_user.idsdm = em_activitiesUser.id_user','LEFT') 
					->where('em_activitiesUser.id_user',$this->session->userdata('sess_user_id'))
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