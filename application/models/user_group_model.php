<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_group_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_usergroup()
    {
		return $this->db
					->from('em_usergroup')
					->where('is_active !=','deleted')
                    ->get();
    }
	
	public function select_usergroup_id($id_usergroup)
    {
		return $this->db
					->from('em_usergroup')
					->where('id',$id_usergroup)
                    ->get();
    }

    public function select_usergroup_active()
    {
		return $this->db
					->from('em_usergroup')
					->where('is_active','active')
                    ->get();
    }

    public function select_usergroup_dropdown()
    {
        $result = $this->db
                    ->from('em_usergroup') 
                    ->where('is_active','active')
                    ->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['definisi'];
            }
        }
        
        return $return;
    }

    public function select_privilege_system()
    {
        return $this->db
					->from('em_systemactive')
					->where('is_displayed',1) //is shown in user group privilege
					->where('is_active','active')
					->order_by('sort')
                    ->get();
    }

    public function select_privilege_parent($id_system)
    {
        return $this->db
					->from('em_navigationmenu')
					->where('id_parent IS NULL')
					->where('id_systemactive',$id_system)
					->where('is_displayed',1) //showed in user group privilege
					->where('is_active','active')
					->order_by('sort_parent')
                    ->get();
    }

    public function select_privilege_child($id_system,$id_parent)
    {
        return $this->db
					->from('em_navigationmenu')
					->where('id_parent',$id_parent)
					->where('id_systemactive',$id_system) //Load menubar for main_system
					->where('is_displayed',1) //is shown in user group privilege
					->where('is_active','active')
					->order_by('sort_child')
                    ->get();
    }

    public function select_privilege_group($id_usergroup,$id_menu)
    {
        return $this->db
					->from('em_usergroup_matrix')
					->where('id_usergroup',$id_usergroup)
					->where('id_menu',$id_menu)
                    ->get();
    }
	
	
	//============================ Insert Data ================================
    public function insert_usergroup($data)
    {
		$this->db->insert('em_usergroup', $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
    }
	
    public function insert_usergroup_matrix($data)
    {
		$this->db->insert('em_usergroup_matrix', $data);
		$insert_id = $this->db->insert_id();
		
		return $insert_id;
    }
	
	
	//============================ Update Data ================================
    public function update_usergroup($id_usergroup,$data)
    {
		$this->db->where('id',$id_usergroup)
				 ->update('em_usergroup', $data);
    }
	
    public function update_usergroup_matrix($id_usergroup,$id_menu,$data)
    {
		$this->db->where('id_usergroup',$id_usergroup)
				 ->where('id_menu',$id_menu)
				 ->update('em_usergroup_matrix', $data);
    }
}