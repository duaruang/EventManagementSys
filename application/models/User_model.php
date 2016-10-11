<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
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

    public function select_user()
    {
		return $this->db
                    ->select('em_user.*, em_usergroup.*,em_user.is_active as userstat')
					->from('em_user')
					->join('em_usergroup','em_usergroup.id = em_user.id_user_group','LEFT')
					->where('em_user.is_active !=','deleted')
                    ->where('em_user.is_administrator',0)
                    ->get();
    }

    public function select_user_active()
    {
    	return $this->db
                    ->select('em_user.*, em_usergroup.*')
					->from('em_user')
					->join('em_usergroup','em_usergroup.id = em_user.id_user_group','LEFT')
					->where('em_user.is_active','active')
                    ->get();
    }

    public function check_user($idsdm)
    {
        return $this->db
                    ->from('em_user') 
                    ->where('is_active !=','deleted')
                    ->where('idsdm',$idsdm)
                    ->get();
    }

    public function select_user_id($id)
    {
        return $this->db
                    ->from('em_user') 
                    ->where('idsdm',$id)
                    ->get();
    }

    public function select_audit_trail_individual()
    {
    	return $this->db
    				->select('em_user.*, em_activitiesuser.*')
					->from('em_activitiesuser')
					->join('em_user','em_user.id = em_activitiesuser.id_user','LEFT') 
					->where('em_activitiesuser.id_user',$this->session->userdata('sess_user_id'))
					->order_by('em_activitiesuser.date','desc')
					->get();
    }

    public function select_audit_trail()
    {
    	return $this->db
    				->select('em_user.*, em_activitiesuser.*')
					->from('em_activitiesuser')
					->join('em_user','em_user.id = em_activitiesuser.id_user','LEFT') 
					->order_by('em_activitiesuser.date','desc')
					->get();
    }
    
    //============================ Insert Data ===============================
    public function insert_user($data_insert)
	{
		$this->db->insert('em_user',$data_insert);		
	}
    public function insert_activities_user($data)
	{
		$this->db->insert('em_activitiesuser',$data);		
	}

	//============================ Update Data ================================
    public function update_user($data_insert, $idsdm)
    {
        $this->db->update('em_user', $data_insert, array('idsdm' => $idsdm));
    }

    //============================ Delete Data ================================
    public function delete_user($data_insert, $idsdm)
    {
        $this->db->update('em_user', $data_insert, array('idsdm' => $idsdm));
    }
}