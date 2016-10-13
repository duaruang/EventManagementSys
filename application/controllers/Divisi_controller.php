<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_controller extends MY_Controller {

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
		$head['title'] 			= 'Divisi - Event Management System' ;
		$head['css']			=  $this->load->view('page/divisi/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/divisi/include/index-script', NULL, TRUE);
        $data['load_divisi']		= $this->divisi_model->select_divisi();
        //Load page
		$this->template->view('page/divisi/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Divisi - Event Management System' ;
		$head['css']			=  $this->load->view('page/divisi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/divisi/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/divisi/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Divisi - Event Management System' ;
		$head['css']			=  $this->load->view('page/divisi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/divisi/include/add-script', NULL, TRUE);
        $data['load_divisi']	= $this->divisi_model->select_id_divisi($id);
        //Load page
		$this->template->view('page/divisi/edit',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$nama_divisi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_divisi'))));
		$status_divisi		= $this->security->xss_clean(strip_image_tags($this->input->post('status_divisi')));
		$id_user			= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->divisi_model->check_divisi($nama_divisi);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'nama_divisi'			=> $nama_divisi,
									'is_active' 			=> $status_divisi,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->divisi_model->insert_divisi($data_insert);
            
            //insert log
            $activities ='Tambah Divisi';
			$itemid		= $nama_divisi;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama divisi sudah ada, gunakan nama divisi yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama divisi sudah ada, gunakan nama divisi yang lain.');
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
		$nama_divisi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_divisi'))));
		$status_divisi		= $this->security->xss_clean(strip_image_tags($this->input->post('status_divisi')));
		$id_user			= $this->session->userdata('sess_user_id');
		$id					= trim($this->security->xss_clean(strip_image_tags($this->input->post('iddivisi'))));
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'nama_divisi'			=> $nama_divisi,
									'is_active' 			=> $status_divisi,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->divisi_model->update_divisi($data_insert,$id);
            
            //insert log
            $activities ='Edit Divisi';
			$itemid		= $nama_divisi;
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
		$id_divisi		= $this->input->post('f-id-divisi');
		$nama_divisi		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-divisi')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id_divisi != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->divisi_model->delete_divisi($data_insert,$id_divisi);

			//insert log
            $activities ='Menghapus divisi';
			$itemid		= $nama_divisi;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('divisi');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('divisi');
		}
	}
}