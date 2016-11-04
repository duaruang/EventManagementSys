<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persetujuan_usulan_model extends CI_Model
{
	//============================ Select Data ================================
    public function select_persetujuan()
    {
		return $this->db
                    ->from('em_listpersetujuan')
                    ->where('is_active!=','deleted')
                    ->order_by('nama_lengkap','asc')
                    ->get();
    }
	
    public function select_persetujuan_id($id_persetujuan)
    {
		return $this->db
                    ->from('em_listpersetujuan')
                    ->where('id',$id_persetujuan)
                    ->where('is_active!=','deleted')
					->limit(1)
                    ->get();
    }
	
    public function select_persetujuan_pengganti()
    {
		return $this->db
                    ->select('ela.id, ela.id_listpersetujuan, ela.nip as nip_alt, ela.nama_lengkap as nama_alt, ela.posisi as posisi_alt, ela.unit_kerja as unitkerja_alt, ela.is_active, el.nama_lengkap as nama_u, el.nip as nip_u, el.posisi as posisi_u, el.unit_kerja as unitkerja_u')
                    ->from('em_listpersetujuan_alt ela')
                    ->join('em_listpersetujuan el','ela.id_listpersetujuan = el.id','left')
                    ->where('ela.is_active!=','deleted')
                    ->order_by('ela.nama_lengkap','asc')
                    ->get();
    }
	
    public function select_persetujuan_pengganti_id($id_persetujuan_pengganti)
    {
		return $this->db
					->select('ela.id_listpersetujuan, ela.nip as nip_alt, ela.nama_lengkap as nama_alt, ela.posisi as posisi_alt, ela.unit_kerja as unitkerja_alt, ela.is_active, el.nama_lengkap as nama_u, el.nip as nip_u, el.posisi as posisi_u, el.unit_kerja as unitkerja_u')
                    ->from('em_listpersetujuan_alt ela')
                    ->join('em_listpersetujuan el','ela.id_listpersetujuan = el.id','left')
                    ->where('ela.id',$id_persetujuan_pengganti)
                    ->limit(1)
                    ->get();
    }
	
    public function select_persetujuan_alt($id)
    {
		return $this->db
                    ->from('em_listpersetujuan_alt')
                    ->where('id_listpersetujuan',$id)
                    ->where('is_active!=','deleted')
                    ->get();
    }
	

    //============================ Insert Data ================================
    public function insert_persetujuan($data)
    {
        $this->db->insert('em_listpersetujuan',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	
    public function insert_persetujuan_pengganti($data)
    {
        $this->db->insert('em_listpersetujuan_alt',$data);  
		$insert_id = $this->db->insert_id();
		
		return $insert_id;      
    }
	

    //============================ Update Data ================================
    public function update_persetujuan($id,$data)
    {
        $this->db->update('em_listpersetujuan', $data, array('id' => $id));
    }
	
    public function update_persetujuan_alt($id,$data)
    {
        $this->db->update('em_listpersetujuan_alt', $data, array('id_listpersetujuan' => $id));
    }
	
    public function update_persetujuan_pengganti($id,$data)
    {
        $this->db->update('em_listpersetujuan_alt', $data, array('id' => $id));
    }
}