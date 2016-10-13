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
}