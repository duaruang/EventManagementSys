<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_event()
    {
		return $this->db
                    ->from('em_event')
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
	
	public function select_event_id($id_event)
    {
		return $this->db
                    ->from('em_event')
                    ->where('id_event',$id_event)
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
    public function update_category_rab($id,$data)
    {
        $this->db->update('em_kategori_rab', $data, array('id' => $id));
    }
	
    public function update_subcategory_rab($id_parent,$data)
    {
        $this->db->update('em_kategori_rab', $data, array('id_parent' => $id_parent));
    }
}