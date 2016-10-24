<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kategori_event_model extends CI_Model
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

    public function select_kategori_event_active()
    {
		return $this->db
					->from('em_kategori_event') 
					->where('is_active','active')
					->order_by('kategori_event','asc')
					->get();
    }

    public function check_kategori_event($kategori_event)
    {
		return $this->db
					->from('em_kategori_event') 
					->where('is_active !=','deleted')
					->where('kategori_event',$kategori_event)
					->order_by('kategori_event','asc')
					->get();
    }

    public function select_id_kategori_event($idkategori_event)
    {
		return $this->db
					->from('em_kategori_event') 
					->where('id',$idkategori_event)
					->order_by('kategori_event','asc')
					->get();
    }

    public function select_kategori_event_dropdown()
    {
    	$result = $this->db
                    ->from('em_kategori_event') 
					->where('is_active','active')
					->order_by('kategori_event','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['kategori_event'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_kategori_event($data_insert)
	{
		$this->db->insert('em_kategori_event',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_kategori_event($data_insert, $id)
    {
        $this->db->update('em_kategori_event', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_kategori_event($data_insert, $id)
    {
        $this->db->update('em_kategori_event', $data_insert, array('id' => $id));
    }
}