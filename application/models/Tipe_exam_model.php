<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_exam_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_tipe_exam()
    {
		return $this->db
					->from('em_tipe_exam') 
					->where('is_active !=','deleted')
					->order_by('tipe_exam','asc')
					->get();
    }

    public function select_tipe_exam_active()
    {
		return $this->db
					->from('em_tipe_exam') 
					->where('is_active','active')
					->order_by('tipe_exam','asc')
					->get();
    }

    public function check_tipe_exam($tipe_exam)
    {
		return $this->db
					->from('em_tipe_exam') 
					->where('is_active !=','deleted')
					->where('tipe_exam',$tipe_exam)
					->order_by('tipe_exam','asc')
					->get();
    }

    public function select_id_tipe_exam($idtipe_exam)
    {
		return $this->db
					->from('em_tipe_exam') 
					->where('id',$idtipe_exam)
					->order_by('tipe_exam','asc')
					->get();
    }

    public function select_tipe_exam_dropdown()
    {
    	$result = $this->db
                    ->from('em_tipe_exam') 
					->where('is_active','active')
					->order_by('tipe_exam','asc')
					->get();
        $return = array();
        
        if ($result->num_rows() > 0){
            foreach($result->result_array() as $row)      
            {
                $return[$row['id']]=  $row['tipe_exam'];
            }
        }
        
        return $return;
    }

    //============================ Insert Data ================================

    public function insert_tipe_exam($data_insert)
	{
		$this->db->insert('em_tipe_exam',$data_insert);		
	}

	//============================ Update Data ================================
	public function update_tipe_exam($data_insert, $id)
    {
        $this->db->update('em_tipe_exam', $data_insert, array('id' => $id));
    }

    //============================ Delete Data ================================
    public function delete_tipe_exam($data_insert, $id)
    {
        $this->db->update('em_tipe_exam', $data_insert, array('id' => $id));
    }
}