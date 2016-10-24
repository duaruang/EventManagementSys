<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_controller extends MY_Controller {

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
	public function index()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/cabang/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/cabang/include/index-script', NULL, TRUE);
        $data['load_cabang']	= $this->cabang_model->select_cabang();
        //Load page
		$this->template->view('page/cabang/index',$data);
	}

	public function add_cabang()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tambah Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/cabang/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/cabang/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/cabang/add-cabang',$data);
	}

	public function edit_cabang()
	{
	    //$this->is_logged();
	    $idcabang 		= $this->uri->segment(3);
        //Set Head Content
		$head['title'] 			= 'Edit Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/cabang/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/cabang/include/add-script', NULL, TRUE);
        $data['load_cabang']	= $this->cabang_model->select_id_cabang($idcabang);
        //Load page
		$this->template->view('page/cabang/edit-cabang',$data);
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
		$id_user			= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->cabang_model->check_cabang($nama_cabang);
		
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

			$this->cabang_model->insert_Cabang($data_insert);
            
            //insert log
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

	public function process_edit_cabang()
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
		$id_user			= $this->session->userdata('sess_user_id');
		$id_cabang			= $this->security->xss_clean(strip_image_tags($this->input->post('idcabang')));
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'nama_cabang'			=> $nama_cabang,
									'alamat_cabang'			=> $alamat_cabang,
									'no_telp'				=> $notelp_cabang,
									'wilayah'				=> $wilayah_cabang,
									'is_active' 			=> $status_cabang,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->cabang_model->update_cabang($data_insert,$id_cabang);
            
            //insert log
            $activities ='Edit Cabang';
			$itemid		= $nama_cabang;
			$this->insert_activities_user($activities,$itemid);
			
			$output = array(
				'result'  	=> 'OK',
				'msg'		=> 'Sukses'
			);
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		 
		
		echo json_encode($output);
		exit;
	}

	public function process_delete_cabang()
	{
		//Check user is logged or not
	    $this->is_logged();

		//==== Get Data ====
		$id_cabang			= $this->input->post('f-id-cabang');
		$nama_cabang		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-cabang')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id_cabang != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->cabang_model->delete_cabang($data_insert,$id_cabang);

			//insert log
            $activities ='Menghapus Cabang';
			$itemid		= $nama_cabang;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('cabang');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('cabang');
		}
	}
}