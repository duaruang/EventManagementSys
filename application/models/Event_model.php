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
	
    public function select_event_status($status)
    {
        return $this->db
                    ->select('em_event.*,em_kategori_event.*,em_event.is_active as eventactive,em_event.created_date as crdate_event')
                    ->from('em_event') 
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
                    ->where('em_event.is_active !=','deleted')
                    ->where('em_event.status_event',$status)
                    ->order_by('em_event.created_date','desc')
                    ->get();
    }
	
    public function select_event_approval_tingkat($id_event,$tingkat)
    {
        return $this->db
                    ->from('em_event_approval') 
                    ->where('id_event',$id_event)
                    ->where('tingkat_approval',$tingkat)
                    ->order_by('created_date','desc')
                    ->get();
    }
	
	
	//============================ Select Edit Event================================
    public function select_detail_event($id)
    {
        return $this->db
                    ->select('em_event.*,em_event.id_event as idevent,
                        em_event_listpeserta.*,
                        em_event_materikm.*,
                        em_event_exam.*,
                        em_event_pic.*,
                        em_event_rab.*,
                        em_event_rundown.*,
                        em_event_trainer.*,
                        em_kategori_event.id,em_kategori_event.kategori_event,em_kategori_event.is_active')
                    ->from('em_event')
                    ->join('em_event_exam','em_event_exam.id_event = em_event.id_event','left') 
                    ->join('em_event_listpeserta','em_event_listpeserta.id_event = em_event.id_event','left')
                    ->join('em_event_materikm','em_event_materikm.id_event = em_event.id_event','left')
                    ->join('em_event_pic','em_event_pic.id_event = em_event.id_event','left')
                    ->join('em_event_rab','em_event_rab.id_event = em_event.id_event','left')
                    ->join('em_event_rundown','em_event_rundown.id_event = em_event.id_event','left')
                    ->join('em_event_trainer','em_event_trainer.id_event = em_event.id_event','left')
                    ->join('em_kategori_event','em_kategori_event.id = em_event.id_kategori_event','left')
                    ->where('em_event.id_event',$id)
                    ->order_by('em_event.created_date','desc')
                    ->get();
    }
	

     public function select_peserta($id)
     {
             return $this->db
                    ->from('em_event_listpeserta') 
                    ->where('id_event',$id)
                    ->get();
     }

     public function select_pic($id)
     {
             return $this->db
                    ->from('em_event_pic') 
                    ->where('id_event',$id)
                    ->where('is_active','active')
                    ->get();
     }

     public function select_trainer($id)
     {
             return $this->db
                    ->select('em_event_trainer.*,em_trainer.*')
                    ->from('em_event_trainer') 
                    ->join('em_trainer','em_trainer.id = em_event_trainer.id_kategori_trainer','left')
                    ->where('em_event_trainer.id_event',$id)
                    ->where('em_event_trainer.is_active','active')
                    ->get();
     }

     public function select_materi($id)
     {
             return $this->db
                    ->from('em_event_materikm') 
                    ->where('id_event',$id)
                    ->where('is_active','active')
                    ->get();
     }

     public function select_rab($id_rab,$id)
     {
             return $this->db
                    ->from('em_event_rab') 
                    ->where('id_rab',$id_rab)
                    ->where('id_event',$id)
                    ->where('is_active','active')
                    ->get();
     }

     public function select_rundown($id)
     {
             return $this->db
                    ->from('em_event_rundown') 
                    ->where('id_event',$id)
                    ->where('is_active','active')
                    ->get();
     }


    //============================ Select Data RAB================================
    public function select_rab_parent_category($id)
    {
        return $this->db
                    ->select('em_event_rab.*,em_kategori_rab.id as katid,em_kategori_rab.deskripsi,em_kategori_rab.jumlah_unit,em_kategori_rab.frekwensi')
                    ->from('em_event_rab') 
                    ->join('em_kategori_rab','em_kategori_rab.id = em_event_rab.id_rab','left')
                    ->where('em_event_rab.id_rab_parent',NULL)
                    ->where('em_event_rab.id_event',$id)
                    ->order_by('id','asc')
                    ->get();
    }
    public function select_rab_event($id_parent,$id_event)
    {
          return $this->db
                    ->select('em_event_rab.*,em_kategori_rab.id as katid,em_kategori_rab.deskripsi,em_kategori_rab.jumlah_unit,em_kategori_rab.frekwensi')
                    ->from('em_event_rab') 
                    ->join('em_kategori_rab','em_kategori_rab.id = em_event_rab.id_rab','left')
                    ->where('em_event_rab.id_event',$id_event)
                    ->where('em_event_rab.id_rab_parent',$id_parent)
                    ->get();
    }

    //============================ Select Data trainer================================
    public function select_data_trainer($id)
    {
        return $this->db
                    ->select('em_event_trainer.*,em_trainer.id as idtrain,em_trainer.nama_pemateri,em_trainer.nik')
                    ->from('em_event_trainer') 
                    ->join('em_trainer','em_trainer.id = em_event_trainer.id_kategori_trainer','left')
                    ->where('em_event_trainer.is_active','active')
                    ->where('em_event_trainer.id_event',$id)
                    ->get();
    }

    //============================ Select Data PIC================================
     public function select_data_pic($id)
    {
        return $this->db
                    ->from('em_event_pic') 
                    ->where('is_active !=','deleted')
                    ->where('id_event',$id)
                    ->get();
    }

     public function select_tanggal_ubah($id_event)
    {
        return $this->db
                    ->select('em_event_changedate.*,em_user.*')
                    ->from('em_event_changedate') 
                    ->join('em_user','em_user.id = em_event_changedate.created_by','left')
                    ->where('em_event_changedate.is_active !=','deleted')
                    ->where('em_event_changedate.id_event',$id_event)
                    ->order_by('em_event_changedate.created_date','desc')
                    ->get();
    }
    //============================ Insert Data ================================

    public function insert_event($data_insert)
	{
		$this->db->insert('em_event',$data_insert);		
	}

    public function insert_event_changedate($data_insert_date)
    {
        $this->db->insert('em_event_changedate',$data_insert_date);     
    }

    public function insert_peserta_event($data_array)
    {
        $this->db->insert('em_event_listpeserta',$data_array);     
    }

    public function insert_rab_event($data_insert)
    {
        $this->db->insert('em_event_rab',$data_insert);     
    }

    public function insert_rundown_event_files($data_files)
    {
        $this->db->insert('em_event_rundown',$data_files);     
    }

    public function insert_materi_event_files($data_files)
    {
        $this->db->insert('em_event_materikm',$data_files);     
    }

    public function insert_pic_event($data_pic)
    {
        $this->db->insert('em_event_pic',$data_pic);     
    }

    public function insert_exam_event($data_exam)
    {
        $this->db->insert('em_event_exam',$data_exam);     
    }

    public function insert_trainer_event($data_trainer)
    {
        $this->db->insert('em_event_trainer',$data_trainer);     
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
	public function update_event($data_insert_event, $id_event)
    {
        $this->db->update('em_event', $data_insert_event, array('id_event' => $id_event));
    }

    public function update_event_exam($data_exam, $id_event)
    {
        $this->db->update('em_event_exam', $data_exam, array('id_event' => $id_event));
    }

    public function update_event_pic($data_pic, $id_event)
    {
        $this->db->update('em_event_pic', $data_pic, array('id_event' => $id_event));
    }

    public function update_event_trainer($data_trainer, $id_event)
    {
        $this->db->update('em_event_trainer', $data_trainer, array('id_event' => $id_event));
    }

    public function update_event_materi($data_file_materi, $id_event)
    {
        $this->db->update('em_event_materikm', $data_file_materi, array('id_event' => $id_event));
    }

    public function update_event_rundown($data_files, $id_event)
    {
        $this->db->update('em_event_rundown', $data_files, array('id_event' => $id_event));
    }

    public function update_event_listpeserta($data_array, $id_event)
    {
        $this->db->update('em_event_listpeserta', $data_array, array('id_event' => $id_event));
    }

    public function update_event_rab($data_rab, $id_event)
    {
        $this->db->update('em_event_rab', $data_rab, array('id_event' => $id_event));
    }

    public function update_status_event($update_status,$id_event)
    {
        $this->db->update('em_event', $update_status, array('id_event' => $id_event));
    }
    //============================ Delete Data ================================
    public function delete_event($data_delete, $id_event)
    {
        $this->db->update('em_event', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_exam', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_rab', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_listpeserta', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_rundown', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_materikm', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_trainer', $data_delete, array('id_event' => $id_event));
        $this->db->update('em_event_pic', $data_delete, array('id_event' => $id_event));

    }

    public function delete_event_list_peserta($id_event){
        $this->db->delete('em_event_listpeserta',array('id_event' => $id_event));
    }
    public function delete_event_pic($id_event){
        $this->db->delete('em_event_pic',array('id_event' => $id_event));
    }
    public function delete_event_trainer($id_event){
        $this->db->delete('em_event_trainer',array('id_event' => $id_event));
    }
    public function delete_event_rab($id_event){
        $this->db->delete('em_event_rab',array('id_event' => $id_event));
    }
    public function delete_event_rundown($id_event){
        $this->db->delete('em_event_rundown',array('id_event' => $id_event));
    }
    public function delete_event_materi($id_event){
        $this->db->delete('em_event_materikm',array('id_event' => $id_event));
    }
    public function delete_event_exam($id_event){
        $this->db->delete('em_event_exam',array('id_event' => $id_event));
    }

}