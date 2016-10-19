<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrainerEksternal_controller extends MY_Controller {

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
		$head['title'] 			= 'Trainer Eksternal - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer_eksternal/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/trainer_eksternal/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_trainer']	= $this->trainer_eksternal_model->select_trainer();
		
        //Load page
		$this->template->view('page/trainer_eksternal/index',$data);
	}

	public function add()
	{
	    //$this->is_logged();
		
        //Set Head Content
		$head['title'] 			= 'Tambah Trainer Eksternal - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer_eksternal/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer_eksternal/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/trainer_eksternal/add',$data);
	}

	public function process_add()
	{
		//No data -> redirected to page adding trainer eksternal
		if(count($_POST) == 0){
			redirect('trainer-eksternal/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$nama_pemateri		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_pemateri'))));
		$nama_perusahaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_perusahaan'))));
		$status				= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$document			= $_FILES['files'];
		$id_user			= $this->session->userdata('sess_user_id');
		
		//Insert Data to table trainer eksternal
		$data_trainer	= array(
								'nama_pemateri'			=> $nama_pemateri,
								'nama_perusahaan'		=> $nama_perusahaan,
								'is_active' 			=> $status,
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
							);
		$id_trainer = $this->trainer_eksternal_model->insert_trainer($data_trainer);
           
		//Insert Data Document if exists to table trainer eksternal filesize
		if ($_FILES['files']) {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/attachments';
			$config['allowed_types'] 	= 'pdf|gif|jpg|jpeg|png';
			$config['max_size']    		= '2000';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			
			$doc_user = array();
			
			foreach ($document['name'] as $key => $doc_u) {
				$_FILES['files[]']['name']= $document['name'][$key];
				$_FILES['files[]']['type']= $document['type'][$key];
				$_FILES['files[]']['tmp_name']= $document['tmp_name'][$key];
				$_FILES['files[]']['error']= $document['error'][$key];
				$_FILES['files[]']['size']= $document['size'][$key];

				$doc_u = str_replace(' ', '', $doc_u);
				$fileName = $id_trainer.'_'.date('Ymd').'at'.date('His').'_'.$doc_u;

				$doc_user[] = $fileName;

				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('files[]')) {
					$this->upload->data();
					
					//Insert to table trainer eksternal files
					$data_files = array(
									'id_pemateri'			=> $id_trainer,
									'nama_file'				=> $fileName,
									'tipe_file'				=> $document['type'][$key],
									'is_active' 			=> 'active',
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);
					$this->trainer_eksternal_model->insert_trainer_files($data_files);
					
					$success = true;
				} else {
					$success = false;
				}
			}
		}
		
		//Insert Log
		$activities = 'Tambah Trainer Eksternal';
		$itemid		= $nama_pemateri;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function view()
	{
	    //$this->is_logged();
		//Get Data
		$id_trainer = $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'View Trainer Eksternal - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer_eksternal/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer_eksternal/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['load_trainer']	= $this->trainer_eksternal_model->select_trainer_id($id_trainer);
		$data['load_files']		= $this->trainer_eksternal_model->select_trainer_files($id_trainer);
		
        //Load page
		$this->template->view('page/trainer_eksternal/view',$data);
	}

	public function edit()
	{
	    //$this->is_logged();
	    //Get Data
		$id_trainer = $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'Edit Trainer Eksternal - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer_eksternal/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer_eksternal/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['id_trainer']		= $id_trainer;
		$data['load_trainer']	= $this->trainer_eksternal_model->select_trainer_id($id_trainer);
		$data['load_files']		= $this->trainer_eksternal_model->select_trainer_files($id_trainer);
		
        //Load page
		$this->template->view('page/trainer_eksternal/edit',$data);
	}

	public function process_edit()
	{
		//No data -> redirected to page editing trainer eksternal
		if(count($_POST) == 0){
			redirect('trainer-eksternal/edit', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id_trainer			= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idtrainer')));
		$nama_pemateri		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_pemateri'))));
		$nama_perusahaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_perusahaan'))));
		$status				= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$document			= $_FILES['files'];
		$id_deleted_file	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idfile-delete')));
		if($id_deleted_file) $deleted_file = explode(';',$id_deleted_file);
		$id_user			= $this->session->userdata('sess_user_id');
		
		//Update Data to table trainer eksternal
		$data_trainer	= array(
								'nama_pemateri'			=> $nama_pemateri,
								'nama_perusahaan'		=> $nama_perusahaan,
								'is_active' 			=> $status,
								'modified_by' 			=> $id_user,
								'modified_date' 		=> date('Y-m-d H:i:s')
							);
		$this->trainer_eksternal_model->update_trainer($id_trainer,$data_trainer);
		
		//Update Data to table trainer eksternal files
		if($id_deleted_file)
		{
			foreach($deleted_file as $id_file)
			{
				$data_files	= array(
										'is_active' 			=> 'deleted',
										'modified_by' 			=> $id_user,
										'modified_date' 		=> date('Y-m-d H:i:s')
									);
				$this->trainer_eksternal_model->update_trainer_files_id($id_file,$data_files);
			}
		}
		
		
		//Insert Data Document if exists to table trainer eksternal filesize
		if ($_FILES['files']) {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/attachments';
			$config['allowed_types'] 	= 'pdf|gif|jpg|jpeg|png';
			//$config['max_size']    		= '2000';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			
			$doc_user = array();
			
			foreach ($document['name'] as $key => $doc_u) {
				$_FILES['files[]']['name']= $document['name'][$key];
				$_FILES['files[]']['type']= $document['type'][$key];
				$_FILES['files[]']['tmp_name']= $document['tmp_name'][$key];
				$_FILES['files[]']['error']= $document['error'][$key];
				$_FILES['files[]']['size']= $document['size'][$key];

				$doc_u = str_replace(' ', '', $doc_u);
				$fileName = $id_trainer.'_'.date('Ymd').'at'.date('His').'_'.$doc_u;

				$doc_user[] = $fileName;

				$config['file_name'] = $fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('files[]')) {
					$this->upload->data();
					
					//Insert to table trainer eksternal files
					$data_files = array(
									'id_pemateri'			=> $id_trainer,
									'nama_file'				=> $fileName,
									'tipe_file'				=> $document['type'][$key],
									'is_active' 			=> 'active',
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);
					$this->trainer_eksternal_model->insert_trainer_files($data_files);
					
					$success = true;
				} else {
					$success = false;
				}
			}
		}
		
		
		//Insert Log
		$activities = 'Edit Trainer Eksternal';
		$itemid		= $nama_pemateri;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}
	
	public function process_delete()
	{
		//Check user is logged or not
	    //$this->is_logged();
		
		//Get Data
		$id_trainer 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idtrainer'))); 
		$trainer_name   = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-trainername')));
		$id_user	  	= $this->session->userdata('sess_user_id');
		
		if($id_trainer != '') {
			//Update Data table trainer eksternal -> is_active = deleted
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->trainer_eksternal_model->update_trainer($id_trainer,$data);
			
			//Update Data table trainer eksternal files -> is_active = deleted
			$data_a = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->trainer_eksternal_model->update_trainer_files($id_trainer,$data_a);
            
			//insert log
            $activities = 'Hapus Trainer Eksternal';
			$itemid		= $trainer_name;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('trainer-eksternal');
	}
}