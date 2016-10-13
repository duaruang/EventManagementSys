<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KlasifikasiM_controller extends MY_Controller {

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
		$head['title'] 			= 'klasifikasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/klasifikasi/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/klasifikasi/include/index-script', NULL, TRUE);
        $data['load_klasifikasi']		= $this->klasifikasi_model->select_klasifikasi();
        //Load page
		$this->template->view('page/klasifikasi/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'klasifikasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/klasifikasi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/klasifikasi/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/klasifikasi/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'klasifikasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/klasifikasi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/klasifikasi/include/add-script', NULL, TRUE);
        $data['load_klasifikasi']	= $this->klasifikasi_model->select_id_klasifikasi($id);
        //Load page
		$this->template->view('page/klasifikasi/edit',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$nama_klasifikasi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_klasifikasi'))));
		$status_klasifikasi		= $this->security->xss_clean(strip_image_tags($this->input->post('status_klasifikasi')));
		$id_user			= $this->session->userdata('sess_user_nik');
		
		//==== Check Data ====
		$sql_cab= $this->klasifikasi_model->check_klasifikasi($nama_klasifikasi);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'nama_klasifikasi'		=> $nama_klasifikasi,
									'is_active' 			=> $status_klasifikasi,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->klasifikasi_model->insert_klasifikasi($data_insert);
            
            //insert log
            $activities ='Tambah klasifikasi';
			$itemid		= $nama_klasifikasi;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama klasifikasi sudah ada, gunakan nama klasifikasi yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama klasifikasi sudah ada, gunakan nama klasifikasi yang lain.');
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
		$nama_klasifikasi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_klasifikasi'))));
		$status_klasifikasi		= $this->security->xss_clean(strip_image_tags($this->input->post('status_klasifikasi')));
		$id_user			= $this->session->userdata('sess_user_nik');
		$id					= trim($this->security->xss_clean(strip_image_tags($this->input->post('idklasifikasi'))));
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'nama_klasifikasi'			=> $nama_klasifikasi,
									'is_active' 			=> $status_klasifikasi,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->klasifikasi_model->update_klasifikasi($data_insert,$id);
            
            //insert log
            $activities ='Edit klasifikasi';
			$itemid		= $nama_klasifikasi;
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
		$id_klasifikasi		= $this->input->post('f-id-klasifikasi');
		$nama_klasifikasi		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-klasifikasi')));
		$id_user			= $this->session->userdata('sess_user_nik'); 
		if($id_klasifikasi != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->klasifikasi_model->delete_klasifikasi($data_insert,$id_klasifikasi);

			//insert log
            $activities ='Menghapus klasifikasi';
			$itemid		= $nama_klasifikasi;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('klasifikasi-materi');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('klasifikasi-materi');
		}
	}
}