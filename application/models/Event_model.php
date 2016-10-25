<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_event()
    {
		return $this->db
                    ->select('em_event.*,em_kategori_event.*,em_event.is_active as eventactive,em_event.created_date as crdate_event')
					->from('em_event') 
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
					->where('em_event.is_active !=','deleted')
					->order_by('em_event.created_date','desc')
					->get();
    }

    public function select_event_submitted()
    {
        return $this->db
                    ->select('em_event.*,em_kategori_event.*,em_event.is_active as eventactive,em_event.created_date as crdate_event')
                    ->from('em_event') 
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
                    ->where('em_event.is_active !=','deleted')
                    ->where('em_event.status_event !=','draft')
                    ->order_by('em_event.created_date','desc')
                    ->get();
    }

    public function select_event_submitted_test($id)
    {
        return $this->db
                    ->select('em_kategori_tempat.*,em_event.*,em_kategori_event.*,em_event.is_active as eventactive,em_event.created_date as crdate_event,em_event_listpeserta.*')
                    ->from('em_event') 
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
                    ->join('em_event_listpeserta','em_event_listpeserta.id_event = em_event.id_event','left')
                    ->join('em_kategori_tempat','em_kategori_tempat.id = em_event.id_kategori_tempat_pelaksanaan','left')
                    ->where('em_event.is_active !=','deleted')
                    ->where('em_event.status_event !=','draft')
                    ->where('em_event_listpeserta.id_event',$id)
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


    public function get_list_peserta($id)
    {
        return $this->db
                    ->select('em_event.*,em_event_listpeserta.*')
                    ->from('em_event') 
                    ->join('em_event_listpeserta','em_event_listpeserta.id_event = em_event.id_event','left')
                    ->where('em_event.is_active !=','deleted')
                    ->where('em_event_listpeserta.id_event',$id)
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

    public function insert_peserta_event($data_array)
    {
        $this->db->insert('em_event_listpeserta',$data_array);     
    }

    public function insert_rundown_event_files($data_files)
    {
        $this->db->insert('em_event_rundown',$data_files);     
    }

    public function insert_approval_event($data_approval)
    {
        $this->db->insert('em_event_approval',$data_approval);     
    }

    public function insert_approval_event_files($data_files)
    {
        $this->db->insert('em_event_approval_files',$data_files);     
    }

	//============================ Update Data ================================
	public function update_event($data_insert, $id)
    {
        $this->db->update('em_event', $data_insert, array('id' => $id));
    }

    public function update_status_event($update_status,$id_event)
    {
        $this->db->update('em_event', $update_status, array('id_event' => $id_event));
    }
    //============================ Delete Data ================================
    public function delete_event($data_insert, $id)
    {
        $this->db->update('em_event', $data_insert, array('id' => $id));
    }
}