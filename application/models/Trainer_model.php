<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_trainer()
    {
		return $this->db
					->from('em_trainer')
					->where('is_active !=','deleted')
                    ->order_by('id','desc')
                    ->get();
    }

    public function select_trainer_id($id)
    {
        return $this->db
                    ->from('em_trainer')
                    ->where('is_active !=','deleted')
                    ->where('id',$id)
                    ->order_by('id','desc')
                    ->get();
    }

    public function select_trainer_active()
    {
		return $this->db
                    ->from('em_trainer')
					->where('em_trainer.is_active','active')
                    ->get();
    }

    public function check_trainer($nik)
    {
        return $this->db
                    ->from('em_trainer') 
                    ->where('is_active !=','deleted')
                    ->where('nik',$nik)
                    ->order_by('nama_pemateri','asc')
                    ->get();
    }

     //============================ Insert Data ================================

    public function insert_trainer($data_insert)
    {
        $this->db->insert('em_trainer',$data_insert);        
    }

    //============================ Update Data ================================
    public function update_trainer($data_insert, $id)
    {
        $this->db->update('em_trainer', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_trainer($data_insert, $id)
    {
        $this->db->update('em_trainer', $data_insert, array('id' => $id));
    }
}