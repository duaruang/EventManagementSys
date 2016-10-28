<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program_anggaran_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_parent()
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('id_parent is NULL')
                    ->where('is_active !=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_parent_id($id)
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('is_active !=','deleted')
                    ->where('id',$id)
                    ->get();
    }
	
	public function select_child($id_parent)
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('id_parent',$id_parent)
                    ->where('is_active !=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_child_level($id_parent,$level)
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('id_parent',$id_parent)
                    ->where('level',$level)
                    ->where('is_active !=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_item()
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('is_active!=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_latest_level($id_parent)
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('id_parent',$id_parent)
                    ->where('is_active!=','deleted')
                    ->order_by('level','desc')
                    ->get();
    }
	
	public function select_level_id($id_level)
    {
		return $this->db
                    ->from('em_program_anggaran')
                    ->where('level',$id_level)
                    ->where('is_active!=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_program_anggaran($data)
    {
        $this->db->insert('em_program_anggaran',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	

    //============================ Update Data ================================
    public function update_program_anggaran($id,$data)
    {
        $this->db->update('em_program_anggaran', $data, array('id' => $id));
    }
	
    public function update_program_anggaran_root($id,$data)
    {
        $this->db->update('em_program_anggaran', $data, array('id_root' => $id));
    }
	
    public function update_program_anggaran_parent($id,$data)
    {
        $this->db->update('em_program_anggaran', $data, array('id_parent' => $id));
    }
}