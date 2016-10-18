<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriEvent_controller extends MY_Controller {

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
		$head['title'] 			= 'Kategori Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_event/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_event/include/index-script', NULL, TRUE);
        $data['load_kategori_event']		= $this->kategori_event_model->select_kategori_event();
        //Load page
		$this->template->view('page/kategori_event/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_event/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_event/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/kategori_event/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_event/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_event/include/add-script', NULL, TRUE);
        $data['load_kategori_event']	= $this->kategori_event_model->select_id_kategori_event($id);
        //Load page
		$this->template->view('page/kategori_event/edit',$data);
	}

	public function view()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_event/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_event/include/add-script', NULL, TRUE);
        $data['load_kategori_event']	= $this->kategori_event_model->select_id_kategori_event($id);
        //Load page
		$this->template->view('page/kategori_event/view',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$kategori_event				= trim($this->security->xss_clean(strip_image_tags($this->input->post('kategori_event'))));
		$status_kategori_event		= $this->security->xss_clean(strip_image_tags($this->input->post('status_kategori_event')));
		$id_user					= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->kategori_event_model->check_kategori_event($kategori_event);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'kategori_event'		=> $kategori_event,
									'is_active' 			=> $status_kategori_event,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->kategori_event_model->insert_kategori_event($data_insert);
            
            //insert log
            $activities ='Tambah kategori event';
			$itemid		= $kategori_event;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama kategori_event sudah ada, gunakan nama kategori_event yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama kategori_event sudah ada, gunakan nama kategori_event yang lain.');
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
		$nama_kategori_event		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_kategori_event'))));
		$status_kategori_event		= $this->security->xss_clean(strip_image_tags($this->input->post('status_kategori_event')));
		$id							= trim($this->security->xss_clean(strip_image_tags($this->input->post('idevent'))));
		$id_user					= $this->session->userdata('sess_user_id');
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'kategori_event'		=> $nama_kategori_event,
									'is_active' 			=> $status_kategori_event,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->kategori_event_model->update_kategori_event($data_insert,$id);
            
            //insert log
            $activities ='Edit kategori event';
			$itemid		= $nama_kategori_event;
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
		$id_kategori_event		= $this->input->post('f-id-kategorievent');
		$nama_kategori_event	= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-kategorievent')));
		$id_user					= $this->session->userdata('sess_user_id');
		if($id_kategori_event != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->kategori_event_model->delete_kategori_event($data_insert,$id_kategori_event);

			//insert log
            $activities ='Menghapus kategori event';
			$itemid		= $nama_kategori_event;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('kategori-event');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('kategori-event');
		}
	}
}