<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_controller extends MY_Controller {

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
		$head['title'] 			= 'Materi - Event Management System' ;
		$head['css']			=  $this->load->view('page/materi/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/materi/include/index-script', NULL, TRUE);
        $data['load_materi']	= $this->materi_model->select_materi();
        //Load page
		$this->template->view('page/materi/index',$data);
	}

	public function add()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tambah Materi - Event Management System' ;
		$head['css']			=  $this->load->view('page/materi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     		= $this->load->view('page/materi/include/add-script', NULL, TRUE);
        $data['load_klasifikasi']	= $this->klasifikasi_model->select_klasifikasi_active();
        
        //Load page
		$this->template->view('page/materi/add',$data);
	}

	public function edit()
	{
	    //$this->is_logged();
	    $id		= $this->uri->segment(3);
        //Set Head Content
		$head['title'] 			= 'Edit materi - Event Management System' ;
		$head['css']			=  $this->load->view('page/materi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/materi/include/add-script', NULL, TRUE);
        $data['load_materi']	= $this->materi_model->select_materi_id($id);
        $data['load_klasifikasi']	= $this->klasifikasi_model->select_klasifikasi_dropdown();
        //Load page
		$this->template->view('page/materi/edit',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$kode_materi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('kode_materi'))));
		$nama_materi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_materi'))));
		$klasifikasi	= $this->security->xss_clean(strip_image_tags($this->input->post('klasifikasi')));
		$status_materi	= $this->security->xss_clean(strip_image_tags($this->input->post('status_materi')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_mat= $this->materi_model->check_materi($kode_materi);
		
		if($sql_mat->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'id_materi'				=> $kode_materi,
									'nama_materi'			=> $nama_materi,
									'id_klasifikasi_materi'	=> $klasifikasi,
									'is_active' 			=> $status_materi,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->materi_model->insert_materi($data_insert);
            
            //insert log
            $activities ='Tambah materi';
			$itemid		= $nama_materi;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nomor kode_materi sudah ada, gunakan Nomor kode_materi yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama cabang sudah ada, gunakan nama cabang yang lain.');
		}
		
		echo json_encode($output);
		exit;
	}

	public function process_edit()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$kode_materi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('kode_materi'))));
		$nama_materi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_materi'))));
		$klasifikasi	= $this->security->xss_clean(strip_image_tags($this->input->post('klasifikasi')));
		$status_materi	= $this->security->xss_clean(strip_image_tags($this->input->post('status_materi')));
		$id_user		= $this->session->userdata('sess_user_id');
		$id 			= $this->input->post('idmateri');
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'id_materi'				=> $kode_materi,
									'nama_materi'			=> $nama_materi,
									'id_klasifikasi_materi'	=> $klasifikasi,
									'is_active' 			=> $status_materi,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->materi_model->update_materi($data_insert,$id);
            
            //insert log
            $activities ='Edit materi';
			$itemid		= $nama_materi;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		
		echo json_encode($output);
		exit;
	}

	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();

		//==== Get Data ====
		$id					= $this->input->post('f-id-materi');
		$nama_materi		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-materi')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->materi_model->delete_materi($data_insert,$id);

			//insert log
            $activities ='Menghapus materi';
			$itemid		= $nama_materi;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('materi');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('materi');
		}
	}
}