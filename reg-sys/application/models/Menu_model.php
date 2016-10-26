<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_menubar()
    {
		return $this->db
					->from('em_navigationmenu')
					->where('id_systemactive',2)
					->where('is_active !=','deleted')
                    ->order_by('sort_parent')
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