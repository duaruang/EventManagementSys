<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_group_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_usergroup()
    {
		return $this->db
					->from('em_usergroup')
					->where('is_active','active')
                    ->get();
    }
}