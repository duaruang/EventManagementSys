<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_event()
    {
		return $this->db
					->where('is_active','active')
                    ->from('em_event')
                    ->order_by('nama_event','asc')
                    ->get();
    }
	
	public function select_registration_id($id_event)
    {
		return $this->db
                    ->from('em_registrasi er')
					->join('em_event ee','er.id_event = ee.id_event','right')
                    ->where('er.id_event',$id_event)
					->order_by('nama')
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_feedback($data)
    {
        $this->db->insert('em_feedback',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	
    public function insert_feedback_detail($data)
    {
        $this->db->insert('em_feedback_detail',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	

    //============================ Update Data ================================
    public function update_feedback($id,$data)
    {
        $this->db->update('em_feedback', $data, array('id' => $id));
    }
}