<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_tempat_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_kategori_tempat()
    {
		return $this->db
					->from('em_kategori_tempat') 
					->where('is_active !=','deleted')
					->order_by('kategori_tempat','asc')
					->get();
    }

    public function select_kategori_tempat_active()
    {
		return $this->db
					->from('em_kategori_tempat') 
					->where('is_active','active')
					->order_by('kategori_tempat','asc')
					->get();
    }

    public function check_kategori_tempat($kategori_tempat)
    {
		return $this->db
					->from('em_kategori_tempat') 
					->where('is_active !=','deleted')
					->where('kategori_tempat',$kategori_tempat)
					->order_by('kategori_tempat','asc')
					->get();
    }

    public function select_id_kategori_tempat($idkategori_tempat)
    {
		return $this->db
					->from('em_kategori_tempat') 
					->where('id',$idkategori_tempat)
					->order_by('kategori_tempat','asc')
					->get();
    }

    public function select_kategori_tempat_dropdown()
    {
    	$result = $this->db
                    ->from('em_kategori_tempat') 
					->where('is_active','active')
					->order_by('kategori_tempat','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['kategori_tempat'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_kategori_tempat($data_insert)
	{
		$this->db->insert('em_kategori_tempat',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_kategori_tempat($data_insert, $id)
    {
        $this->db->update('em_kategori_tempat', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_kategori_tempat($data_insert, $id)
    {
        $this->db->update('em_kategori_tempat', $data_insert, array('id' => $id));
    }
}