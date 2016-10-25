<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model
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
	
	public function select_event_id($id_event)
    {
		return $this->db
                    ->from('em_event ee')
					->join('em_kategori_tempat ekg','ee.id_kategori_tempat_pelaksanaan = ekg.id','left')
					->join('em_kategori_event eke','ee.id_kategori_event = eke.id','left')
                    ->where('id_event',$id_event)
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