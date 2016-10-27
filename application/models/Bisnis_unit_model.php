<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bisnis_unit_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_bisnis_unit()
    {
		return $this->db
                    ->from('em_bisnis_unit')
                    ->where('is_active!=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_jabatan($id_bisnis_unit)
    {
		return $this->db
                    ->from('em_bisnis_unit_jabatan')
                    ->where('id_bisnis_unit',$id_bisnis_unit)
                    ->where('is_active!=','deleted')
                    ->order_by('nama_jabatan','asc')
                    ->get();
    }
	
	public function select_bisnis_unit_id($id_bisnis_unit)
    {
		return $this->db
                    ->from('em_bisnis_unit')
                    ->where('id',$id_bisnis_unit)
                    ->get();
    }
	
	public function select_jabatan_id($id_jabatan)
    {
		return $this->db
                    ->from('em_bisnis_unit_jabatan buj')
					->join('em_bisnis_unit bu','buj.id_bisnis_unit=bu.id','left')
                    ->where('buj.id',$id_jabatan)
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_bisnis_unit($data)
    {
        $this->db->insert('em_bisnis_unit',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	
    public function insert_jabatan($data)
    {
        $this->db->insert('em_bisnis_unit_jabatan',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	

    //============================ Update Data ================================
    public function update_bisnis_unit($id,$data)
    {
        $this->db->update('em_bisnis_unit', $data, array('id' => $id));
    }
	
    public function update_bisnis_unit_jabatan($id,$data)
    {
        $this->db->update('em_bisnis_unit_jabatan', $data, array('id_bisnis_unit' => $id));
    }
	
    public function update_jabatan($id,$data)
    {
        $this->db->update('em_bisnis_unit_jabatan', $data, array('id' => $id));
    }
}