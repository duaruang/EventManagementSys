<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_trainer()
    {
		return $this->db
                    ->select('em_trainer.*,em_divisi.*,em_cabang.*,em_trainer.id as idtrain,em_cabang.id as idcab,em_trainer.is_active as statustrain')
					->from('em_trainer')
                    ->join('em_divisi','em_divisi.id = em_trainer.id_divisi')
                    ->join('em_cabang','em_cabang.id = em_trainer.id_cabang')
					->where('em_trainer.is_active !=','deleted')
                    ->order_by('em_trainer.id','desc')
                    ->get();
    }

    public function select_trainer_id($id)
    {
        return $this->db
                    ->select('em_trainer.*,em_divisi.*,em_cabang.*,em_trainer.id as idtrain,em_cabang.id as idcab,em_trainer.is_active as statustrain')
                    ->from('em_trainer')
                    ->join('em_divisi','em_divisi.id = em_trainer.id_divisi','left')
                    ->join('em_cabang','em_cabang.id = em_trainer.id_cabang','left')
                    ->where('em_trainer.is_active !=','deleted')
                    ->where('em_trainer.id',$id)
                    ->order_by('em_trainer.id','desc')
                    ->get();
    }

    public function select_trainer_active()
    {
		return $this->db
                    ->select('em_trainer.*,em_divisi.*,em_cabang.*,em_trainer.id as idtrain,em_cabang.id as idcab')
                    ->from('em_trainer')
                    ->join('em_divisi.*','em_divisi.id = em_trainer.id_divisi','left')
                    ->join('em_cabang.*','em_cabang.id = em_trainer.id_cabang','left')
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