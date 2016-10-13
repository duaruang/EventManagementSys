<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_controller extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function cabang()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/master/include/index-script', NULL, TRUE);
        $data['load_cabang']	= $this->master_model->select_cabang();
        //Load page
		$this->template->view('page/master/cabang',$data);
	}

	public function add_cabang()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tambah Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/master/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/master/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/add-cabang',$data);
	}

	public function edit_cabang()
	{
	    //$this->is_logged();
	    $idcabang 		= $this->uri->segment(3);
        //Set Head Content
		$head['title'] 			= 'Edit Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/master/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/master/include/add-script', NULL, TRUE);
        $data['load_cabang']	= $this->master_model->select_id_cabang($idcabang);
        //Load page
		$this->template->view('page/master/edit-cabang',$data);
	}

	public function process_add_cabang()
	{
		
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$nama_cabang		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_cabang'))));
		$alamat_cabang		= $this->security->xss_clean(strip_image_tags($this->input->post('alamat_cabang')));
		$notelp_cabang		= $this->security->xss_clean(strip_image_tags($this->input->post('notelp_cabang')));
		$wilayah_cabang		= $this->security->xss_clean(strip_image_tags($this->input->post('wilayah_cabang')));
		$status_cabang		= $this->security->xss_clean(strip_image_tags($this->input->post('status_cabang')));
		$id_user			= $this->session->userdata('sess_user_nik');
		
		//==== Check Data ====
		$sql_cab= $this->master_model->check_cabang($nama_cabang);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'nama_cabang'			=> $nama_cabang,
									'alamat_cabang'			=> $alamat_cabang,
									'no_telp'				=> $notelp_cabang,
									'wilayah'				=> $wilayah_cabang,
									'is_active' 			=> $status_cabang,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->master_model->insert_Cabang($data_insert);
            
            $activities ='Tambah Cabang';
			$itemid		= $nama_cabang;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama cabang sudah ada, gunakan nama cabang yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama cabang sudah ada, gunakan nama cabang yang lain.');
		}
		
		echo json_encode($output);
		exit;
	}

	public function divisi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Divisi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/divisi',$data);
	}

	public function trainer()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Trainer - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/trainer',$data);
	}

	public function tipe_pelatihan()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Tipe Pelatihan - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/tipe_pelatihan',$data);
	}

	public function klasifikasi_materi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Klasifikasi Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/klasifikasi_materi',$data);
	}

	public function materi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/materi',$data);
	}

	public function kategori_event()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/kategori_event',$data);
	}
    
   
}
