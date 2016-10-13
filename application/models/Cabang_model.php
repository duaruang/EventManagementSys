<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabang_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_cabang()
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active !=','deleted')
					->order_by('nama_cabang','asc')
					->get();
    }

    public function select_cabang_active()
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active','active')
					->order_by('nama_cabang','asc')
					->get();
    }

    public function check_cabang($nama_cabang)
    {
		return $this->db
					->from('em_cabang') 
					->where('is_active !=','deleted')
					->where('nama_cabang',$nama_cabang)
					->order_by('nama_cabang','asc')
					->get();
    }

    public function select_id_cabang($idcabang)
    {
		return $this->db
					->from('em_cabang') 
					->where('id',$idcabang)
					->order_by('nama_cabang','asc')
					->get();
    }

    public function select_cabang_dropdown()
    {
    	$result = $this->db
                    ->from('em_cabang') 
					->where('is_active','active')
					->order_by('nama_cabang','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['nama_cabang'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_cabang($data_insert)
	{
		$this->db->insert('em_cabang',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_cabang($data_insert, $id_cabang)
    {
        $this->db->update('em_cabang', $data_insert, array('id' => $id_cabang));
    }

    //============================ Delete Data ================================
    public function delete_cabang($data_insert, $id_cabang)
    {
        $this->db->update('em_cabang', $data_insert, array('id' => $id_cabang));
    }
}