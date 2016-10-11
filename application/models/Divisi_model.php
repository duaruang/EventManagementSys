<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divisi_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_divisi()
    {
		return $this->db
					->from('em_divisi') 
					->where('is_active !=','deleted')
					->order_by('nama_divisi','asc')
					->get();
    }

    public function select_divisi_active()
    {
		return $this->db
					->from('em_divisi') 
					->where('is_active','active')
					->order_by('nama_divisi','asc')
					->get();
    }

    public function check_divisi($nama_divisi)
    {
		return $this->db
					->from('em_divisi') 
					->where('is_active !=','deleted')
					->where('nama_divisi',$nama_divisi)
					->order_by('nama_divisi','asc')
					->get();
    }

    public function select_id_divisi($iddivisi)
    {
		return $this->db
					->from('em_divisi') 
					->where('id',$iddivisi)
					->order_by('nama_divisi','asc')
					->get();
    }

    public function select_divisi_dropdown()
    {
    	$result = $this->db
                    ->from('em_divisi') 
					->where('is_active','active')
					->order_by('nama_divisi','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['nama_divisi'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_divisi($data_insert)
	{
		$this->db->insert('em_divisi',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_divisi($data_insert, $id)
    {
        $this->db->update('em_divisi', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_divisi($data_insert, $id)
    {
        $this->db->update('em_divisi', $data_insert, array('id' => $id));
    }
}