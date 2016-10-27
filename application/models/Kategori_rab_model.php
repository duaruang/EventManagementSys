<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_rab_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_parent_category()
    {
		return $this->db
                    ->from('em_kategori_rab')
                    ->where('id_parent',NULL)
                    ->where('is_active!=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_child_category($id_parent)
    {
		return $this->db
                    ->from('em_kategori_rab')
                    ->where('id_parent',$id_parent)
                    ->where('is_active!=','deleted')
                    ->order_by('deskripsi','asc')
                    ->get();
    }
	
	public function select_category_id($id)
    {
		return $this->db
                    ->from('em_kategori_rab')
                    ->where('id',$id)
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_category_rab($data)
    {
        $this->db->insert('em_kategori_rab',$data);  
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