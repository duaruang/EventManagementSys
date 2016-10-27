<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer_controller extends MY_Controller {

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
		$head['title'] 			= 'Trainer - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer/include/index-script', NULL, TRUE);
        $data['load_trainer']	= $this->trainer_model->select_trainer();
        //Load page
		$this->template->view('page/trainer/index',$data);
	}

	public function add()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tambah Trainer - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer/include/add-script', NULL, TRUE);
        $data['load_cabang']	= $this->cabang_model->select_cabang_active();
        $data['load_divisi']	= $this->divisi_model->select_divisi_active();
        
        //Load page
		$this->template->view('page/trainer/add',$data);
	}

	public function edit()
	{
	    //$this->is_logged();
	    $id		= $this->uri->segment(3);
        //Set Head Content
		$head['title'] 			= 'Edit Trainer - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer/include/add-script', NULL, TRUE);
        $data['load_trainer']	= $this->trainer_model->select_trainer_id($id);
        //Load page
		$this->template->view('page/trainer/edit',$data);
	}

	public function view()
	{
	    //$this->is_logged();
	    $id		= $this->uri->segment(3);
        //Set Head Content
		$head['title'] 			= 'View Trainer - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer/include/add-script', NULL, TRUE);
        $data['load_trainer']	= $this->trainer_model->select_trainer_id($id);
        //Load page
		$this->template->view('page/trainer/view',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$nik			= trim($this->security->xss_clean(strip_image_tags($this->input->post('nip'))));
		$nama_trainer	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_trainer'))));
		$posisi			= $this->security->xss_clean(strip_image_tags($this->input->post('posisi')));
		$unit_kerja		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_kerja')));
		$status_trainer	= $this->security->xss_clean(strip_image_tags($this->input->post('status_trainer')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->trainer_model->check_trainer($nik);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'nik'					=> $nik,
									'nama_pemateri'			=> $nama_trainer,
									'posisi'				=> $posisi,
									'unit_kerja'			=> $unit_kerja,
									'is_active' 			=> $status_trainer,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->trainer_model->insert_trainer($data_insert);
            
            //insert log
            $activities ='Tambah Trainer';
			$itemid		= $nama_trainer;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Trainer sudah terdaftar, Pilih trainer yang lain.'
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
		$nik			= trim($this->security->xss_clean(strip_image_tags($this->input->post('nip'))));
		$nama_trainer	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_trainer'))));
		$posisi			= $this->security->xss_clean(strip_image_tags($this->input->post('posisi')));
		$unit_kerja		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_kerja')));
		$status_trainer	= $this->security->xss_clean(strip_image_tags($this->input->post('status_trainer')));
		$id_user		= $this->session->userdata('sess_user_id');
		$id 			= $this->input->post('idtrainer');
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'nik'					=> $nik,
									'nama_pemateri'			=> $nama_trainer,
									'posisi'				=> $posisi,
									'unit_kerja'			=> $unit_kerja,
									'is_active' 			=> $status_trainer,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->trainer_model->update_trainer($data_insert,$id);
            
            //insert log
            $activities ='Edit Trainer';
			$itemid		= $nama_trainer;
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
		$id_trainer		= $this->input->post('f-id-trainer');
		$nama_trainer		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-trainer')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id_trainer != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->trainer_model->delete_trainer($data_insert,$id_trainer);

			//insert log
            $activities ='Menghapus trainer';
			$itemid		= $nama_trainer;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('trainer');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('trainer');
		}
	}

	public function get_all_karyawan()
	{
		$this->is_logged();
		$username 		= 'event';
		$password 		= 'event';
	     
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
	    //curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	     
	    // Optional, delete this line if your API is open
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);

	    //count total data
		$total = 0;
		foreach ($result->karyawan[0]->data as $row) {
		    $total ++;
		};

		//sent data to datatables
		$oleh = array(
					'draw' 				=> 1,
					'recordsTotal' 		=> $total,
					'recordsFiltered' 	=> $total,
					'data'				=> $result->karyawan[0]->data
			);
		echo json_encode($oleh);
		exit;
	}
}