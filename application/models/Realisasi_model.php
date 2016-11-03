<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realisasi_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_kategori_event()
    {
		return $this->db
					->from('em_kategori_event') 
					->where('is_active !=','deleted')
					->order_by('kategori_event','asc')
					->get();
    }

    //============================ Insert Data ================================

    public function insert_event($data_realisasi)
	{
		$this->db->insert('em_realisasi',$data_realisasi);		
	}

}