<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realisasi_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_realisasi()
    {
		return $this->db
					->select('em_realisasi.*,em_event.*')
					->from('em_realisasi') 
					->join('em_event','em_event.id_event = em_realisasi.id_event','left')
					->where('em_realisasi.is_active','active')
					->order_by('em_realisasi.created_date','desc')
					->get();
    }

    //============================ Insert Data ================================

    public function insert_event($data_realisasi)
	{
		$this->db->insert('em_realisasi',$data_realisasi);		
	}

}