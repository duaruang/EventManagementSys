<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class materi_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_materi()
    {
		return $this->db
                    ->select('em_materi.*,em_klasifikasimateri.*,em_materi.id as idmateri,em_klasifikasimateri.id as idklas,em_materi.is_active as statmateri')
					->from('em_materi')
                    ->join('em_klasifikasimateri','em_klasifikasimateri.id = em_materi.id_klasifikasi_materi','left')
					->where('em_materi.is_active !=','deleted')
                    ->order_by('em_materi.id','desc')
                    ->get();
    }

    public function select_materi_id($id)
    {
        return $this->db
                    ->select('em_materi.*,em_klasifikasimateri.*,em_materi.id as idmateri,em_klasifikasimateri.id as idklas,em_materi.is_active as statmateri')
					->from('em_materi')
                    ->join('em_klasifikasimateri','em_klasifikasimateri.id = em_materi.id_klasifikasi_materi','left')
					->where('em_materi.is_active !=','deleted')
                    ->where('em_materi.id',$id)
                    ->order_by('em_materi.id','desc')
                    ->get();
    }

    public function select_materi_active()
    {
		return $this->db
                    ->select('em_materi.*,em_klasifikasimateri.*,em_materi.id as idmateri,em_klasifikasimateri.id as idklas')
					->from('em_materi')
                    ->join('em_klasifikasimateri','em_klasifikasimateri.id = em_materi.id_klasifikasi_materi')
					->where('em_materi.is_active','active')
                    ->get();
    }

    public function check_materi($id_materi)
    {
        return $this->db
                    ->from('em_materi') 
                    ->where('is_active !=','deleted')
                    ->where('id_materi',$id_materi)
                    ->order_by('nama_materi','asc')
                    ->get();
    }

     //============================ Insert Data ================================

    public function insert_materi($data_insert)
    {
        $this->db->insert('em_materi',$data_insert);        
    }

    //============================ Update Data ================================
    public function update_materi($data_insert, $id)
    {
        $this->db->update('em_materi', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_materi($data_insert, $id)
    {
        $this->db->update('em_materi', $data_insert, array('id' => $id));
    }
}