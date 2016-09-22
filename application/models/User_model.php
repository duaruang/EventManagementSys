<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model
{
	//==== Select Data ====
    
    //==== Insert Data ====
    public function insert_activities_user($data)
	{
		$this->db->insert('em_activitiesUser',$data);		
	}
}