<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_cabang()
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active','active')
					->order_by('nama_cabang','asc')
					->get();
    }

    public function check_cabang($nama_cabang)
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active','active')
					->where('nama_cabang',$nama_cabang)
					->order_by('nama_cabang','asc')
					->get();
    }

    public function select_id_cabang($idcabang)
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active','active')
					->where('id',$idcabang)
					->order_by('nama_cabang','asc')
					->get();
    }

    public function select_materi()
    {
		return $this->db
					->select('em_materi.*,em_klasifikasi_materi.*')
					->from('em_materi') 
					->join('em_klasifikasi_materi','em_klasifikasi_materi.id = em_materi.id','left')
					->where('em_materi.is_active','active')
					->get();
    }

    public function select_klasifikasi_materi()
    {
		return $this->db
					->from('em_materi') 
					->where('is_active','active')
					->get();
    }

    //============================ Insert Data ================================

    public function insert_cabang($data_insert)
	{
		$this->db->insert('em_cabang',$data_insert);		
	}
}