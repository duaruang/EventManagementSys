<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_event()
    {
		return $this->db
                    ->select('em_event.*,em_kategori_event.*,em_event.is_active as eventactive')
					->from('em_event') 
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
					->where('em_event.is_active !=','deleted')
					->order_by('em_event.nama_event','asc')
					->get();
    }


    public function check_event($id_event)
    {
		return $this->db
					->from('em_event') 
					->where('is_active !=','deleted')
					->where('id_event',$id_event)
					->get();
    }

    public function select_event_dropdown()
    {
    	$result = $this->db
                    ->from('em_event') 
					->where('is_active','active')
					->order_by('nama_event','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['nama_event'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_event($data_insert)
	{
		$this->db->insert('em_event',$data_insert);		
	}

    public function insert_peserta_event($data_insert)
    {
        $this->db->insert('em_event_listpeserta',$data_insert);     
    }

	//============================ Update Data ================================
	public function update_event($data_insert, $id)
    {
        $this->db->update('em_event', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_event($data_insert, $id)
    {
        $this->db->update('em_event', $data_insert, array('id' => $id));
    }
}