<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_eksternal_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_trainer()
    {
		return $this->db
                    ->from('em_trainereksternal')
                    ->where('is_active!=','deleted')
                    ->order_by('nama_pemateri','asc')
                    ->get();
    }
	
	public function select_trainer_id($id_trainer)
    {
		return $this->db
                    ->from('em_trainereksternal')
                    ->where('id',$id_trainer)
                    ->get();
    }
	
	public function select_trainer_files($id_trainer)
    {
		return $this->db
                    ->from('em_trainereksternal_files')
                    ->where('id_pemateri',$id_trainer)
                    ->where('is_active','active')
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_trainer($data)
    {
        $this->db->insert('em_trainereksternal',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	
    public function insert_trainer_files($data)
    {
        $this->db->insert('em_trainereksternal_files',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	

    //============================ Update Data ================================
    public function update_trainer($id,$data)
    {
        $this->db->update('em_trainereksternal', $data, array('id' => $id));
    }
	
    public function update_trainer_files($id,$data)
    {
        $this->db->update('em_trainereksternal_files', $data, array('id_pemateri' => $id));
    }
	
    public function update_trainer_files_id($id,$data)
    {
        $this->db->update('em_trainereksternal_files', $data, array('id' => $id));
    }
}