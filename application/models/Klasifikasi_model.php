<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Klasifikasi_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_klasifikasi()
    {
		return $this->db
					->from('em_klasifikasimateri') 
					->where('is_active !=','deleted')
					->order_by('nama_klasifikasi','asc')
					->get();
    }

    public function select_klasifikasi_active()
    {
		return $this->db
					->from('em_klasifikasimateri') 
					->where('is_active','active')
					->order_by('nama_klasifikasi','asc')
					->get();
    }

    public function check_klasifikasi($nama_klasifikasi)
    {
		return $this->db
					->from('em_klasifikasimateri') 
					->where('is_active !=','deleted')
					->where('nama_klasifikasi',$nama_klasifikasi)
					->order_by('nama_klasifikasi','asc')
					->get();
    }

    public function select_id_klasifikasi($idklasifikasi)
    {
		return $this->db
					->from('em_klasifikasimateri') 
					->where('id',$idklasifikasi)
					->order_by('nama_klasifikasi','asc')
					->get();
    }

    public function select_klasifikasi_dropdown()
    {
    	$result = $this->db
                    ->from('em_klasifikasimateri') 
					->where('is_active','active')
					->order_by('nama_klasifikasi','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['nama_klasifikasi'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_klasifikasi($data_insert)
	{
		$this->db->insert('em_klasifikasimateri',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_klasifikasi($data_insert, $id)
    {
        $this->db->update('em_klasifikasimateri', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_klasifikasi($data_insert, $id)
    {
        $this->db->update('em_klasifikasimateri', $data_insert, array('id' => $id));
    }
}