<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_event()
    {
		return $this->db
                    ->from('em_event')
                    ->where('is_active','active')
                    ->order_by('nama_event','asc')
                    ->get();
    }
	
	public function select_peserta_event($id_event)
    {
		return $this->db
                    ->from('em_event_listpeserta')
                    ->where('id_event',$id_event)
                    ->order_by('nama','asc')
                    ->get();
    }
	
	public function select_peserta_registrasi($id_event)
    {
		return $this->db
                    ->from('em_registrasi')
                    ->where('id_event',$id_event)
                    ->order_by('nama','asc')
                    ->get();
    }
	
	public function select_event_id($id_event)
    {
		return $this->db
                    ->from('em_event')
                    ->where('id_event',$id_event)
                    ->get();
    }
	
	public function select_participant($id_event,$idsdm)
    {
		return $this->db
                    ->from('em_registrasi')
                    ->where('id_event',$id_event)
                    ->where('idsdm',$idsdm)
                    ->get();
    }
	
	public function select_email_template($type)
    {
		return $this->db
                    ->from('em_email_template')
                    ->where('tipe',$type)
                    ->where('is_active','active')
                    ->get();
    }
	
	public function select_settings($type)
    {
		return $this->db
                    ->from('em_settings')
                    ->where('tipe',$type)
                    ->where('is_active','active')
                    ->get();
    }
	
	public function select_feedback()
    {
		return $this->db
                    ->select('*, em_f.id as id_feedback, em_f.is_active as f_status, em_f.created_date as f_date')
                    ->from('em_feedback as em_f')
					->join('em_event as em_e','em_e.id_event=em_f.id_event')
                    ->where('em_f.is_active','active')
					->order_by('em_f.created_date','desc')
                    ->get();
    }
	
	public function select_feedback_detail($id_feedback)
    {
		return $this->db
					->select('*, em_f.is_active as f_status, em_f.created_date as f_date')
                    ->from('em_feedback as em_f')
					->join('em_feedback_detail as em_fd','em_f.id=em_fd.id_feedback')
					->join('em_event as em_e','em_e.id_event=em_f.id_event')
                    ->where('em_f.id',$id_feedback)
                    ->where('em_f.is_active','active')
					->order_by('em_fd.nama')
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