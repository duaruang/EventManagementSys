<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_pelatihan_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_tipe_pelatihan()
    {
		return $this->db
					->from('em_tipepelatihan') 
					->where('is_active !=','deleted')
					->order_by('tipe_pelatihan','asc')
					->get();
    }

    public function select_tipe_pelatihan_active()
    {
		return $this->db
					->from('em_tipepelatihan') 
					->where('is_active','active')
					->order_by('tipe_pelatihan','asc')
					->get();
    }

    public function check_tipe_pelatihan($tipe_pelatihan)
    {
		return $this->db
					->from('em_tipepelatihan') 
					->where('is_active !=','deleted')
					->where('tipe_pelatihan',$tipe_pelatihan)
					->order_by('tipe_pelatihan','asc')
					->get();
    }

    public function select_id_tipe_pelatihan($idtipe_pelatihan)
    {
		return $this->db
					->from('em_tipepelatihan') 
					->where('id',$idtipe_pelatihan)
					->order_by('tipe_pelatihan','asc')
					->get();
    }

    public function select_tipe_pelatihan_dropdown()
    {
    	$result = $this->db
                    ->from('em_tipepelatihan') 
					->where('is_active','active')
					->order_by('tipe_pelatihan','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['tipe_pelatihan'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_tipe_pelatihan($data_insert)
	{
		$this->db->insert('em_tipepelatihan',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_tipe_pelatihan($data_insert, $id)
    {
        $this->db->update('em_tipepelatihan', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_tipe_pelatihan($data_insert, $id)
    {
        $this->db->update('em_tipepelatihan', $data_insert, array('id' => $id));
    }
}