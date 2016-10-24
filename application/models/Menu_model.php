<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_menu()
    {
		return $this->db
					->from('em_navigationmenu')
					->where('is_active !=','deleted')
                    ->order_by('id','desc')
                    ->get();
    }
	
	public function select_menubar_parent()
    {
		return $this->db
					->from('em_navigationmenu')
					->where('id_parent IS NULL')
					->where('id_systemactive',1) //Load menubar for main_system
					->where('is_active','active')
					->order_by('sort_parent')
                    ->get();
    }
	
	public function select_menubar_submenu($id_parent)
    {
		return $this->db
					->from('em_navigationmenu')
					->where('id_parent',$id_parent)
					->where('id_systemactive',1) //Load menubar for main_system
					->where('is_active','active')
					->order_by('sort_child')
                    ->get();
    }

    public function select_menu_id($id)
    {
        return $this->db
                    ->from('em_navigationmenu')
                    ->where('id',$id)
                    ->get();
    }

    public function select_menu_active()
    {
		return $this->db
					->from('em_navigationmenu')
					->where('is_active','active')
                    ->get();
    }

    public function check_menu($nama_menu)
    {
        return $this->db
                    ->from('em_navigationmenu') 
                    ->where('is_active !=','deleted')
                    ->where('nama_menu',$nama_menu)
                    ->order_by('nama_menu','asc')
                    ->get();
    }

    //============================ Insert Data ================================

    public function insert_menu($data_insert)
    {
        $this->db->insert('em_navigationmenu',$data_insert);        
    }

    //============================ Update Data ================================
    public function update_menu($data_insert, $id)
    {
        $this->db->update('em_navigationmenu', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_menu($data_insert, $id)
    {
        $this->db->update('em_navigationmenu', $data_insert, array('id' => $id));
    }
}