<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipeExam_controller extends MY_Controller {

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
		$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_exam/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_exam/include/index-script', NULL, TRUE);
        $data['load_tipe_exam']	= $this->tipe_exam_model->select_tipe_exam();
        //Load page
		$this->template->view('page/tipe_exam/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_exam/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_exam/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/tipe_exam/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_exam/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_exam/include/add-script', NULL, TRUE);
        $data['load_tipe_exam']	= $this->tipe_exam_model->select_id_tipe_exam($id);
        //Load page
		$this->template->view('page/tipe_exam/edit',$data);
	}

	public function view()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_exam/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_exam/include/add-script', NULL, TRUE);
        $data['load_tipe_exam']	= $this->tipe_exam_model->select_id_tipe_exam($id);
        //Load page
		$this->template->view('page/tipe_exam/view',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$tipe_exam				= trim($this->security->xss_clean(strip_image_tags($this->input->post('tipe_exam'))));
		$status_tipe_exam		= $this->security->xss_clean(strip_image_tags($this->input->post('status_tipe_exam')));
		$id_user				= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->tipe_exam_model->check_tipe_exam($tipe_exam);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'tipe_exam'				=> $tipe_exam,
									'is_active' 			=> $status_tipe_exam,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->tipe_exam_model->insert_tipe_exam($data_insert);
            
            //insert log
            $activities ='Tambah Tipe Exam';
			$itemid		= $tipe_exam;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama tipe exam sudah ada, gunakan nama tipe_exam yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama tipe_exam sudah ada, gunakan nama tipe_exam yang lain.');
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
		$nama_tipe_exam		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_tipe_exam'))));
		$status_tipe_exam	= $this->security->xss_clean(strip_image_tags($this->input->post('status_tipe_exam')));
		$id					= trim($this->security->xss_clean(strip_image_tags($this->input->post('idtipeexam'))));
		$id_user			= $this->session->userdata('sess_user_id');
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'tipe_exam'				=> $nama_tipe_exam,
									'is_active' 			=> $status_tipe_exam,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->tipe_exam_model->update_tipe_exam($data_insert,$id);
            
            //insert log
            $activities ='Edit Tipe Exam';
			$itemid		= $nama_tipe_exam;
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
		$id_tipe_exam		= $this->input->post('f-id-tipeexam');
		$nama_tipe_exam	= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-tipeexam')));
		$id_user					= $this->session->userdata('sess_user_id');
		if($id_tipe_exam != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->tipe_exam_model->delete_tipe_exam($data_insert,$id_tipe_exam);

			//insert log
            $activities ='Menghapus Tipe Exam';
			$itemid		= $nama_tipe_exam;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('tipe-exam');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('tipe-exam');
		}
	}
}