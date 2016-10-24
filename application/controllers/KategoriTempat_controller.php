<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriTempat_controller extends MY_Controller {

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
		$head['title'] 			= 'Kategori Tempat Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_tempat/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_tempat/include/index-script', NULL, TRUE);
        $data['load_kategori_tempat']		= $this->kategori_tempat_model->select_kategori_tempat();
        //Load page
		$this->template->view('page/kategori_tempat/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Tempat Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_tempat/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_tempat/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/kategori_tempat/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Tempat Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_tempat/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_tempat/include/add-script', NULL, TRUE);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_id_kategori_tempat($id);
        //Load page
		$this->template->view('page/kategori_tempat/edit',$data);
	}

	public function view()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Kategori Tempat Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_tempat/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_tempat/include/add-script', NULL, TRUE);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_id_kategori_tempat($id);
        //Load page
		$this->template->view('page/kategori_tempat/view',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$kategori_tempat		= trim($this->security->xss_clean(strip_image_tags($this->input->post('kategori_tempat'))));
		$status_kategori_tempat		= $this->security->xss_clean(strip_image_tags($this->input->post('status_kategori_tempat')));
		$id_user			= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->kategori_tempat_model->check_kategori_tempat($kategori_tempat);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'kategori_tempat'		=> $kategori_tempat,
									'is_active' 			=> $status_kategori_tempat,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->kategori_tempat_model->insert_kategori_tempat($data_insert);
            
            //insert log
            $activities ='Tambah kategori tempat';
			$itemid		= $kategori_tempat;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama kategori_tempat sudah ada, gunakan nama kategori_tempat yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama kategori_tempat sudah ada, gunakan nama kategori_tempat yang lain.');
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
		$nama_kategori_tempat		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_kategori_tempat'))));
		$status_kategori_tempat		= $this->security->xss_clean(strip_image_tags($this->input->post('status_kategori_tempat')));
		$id_user			= $this->session->userdata('sess_user_id');
		$id					= trim($this->security->xss_clean(strip_image_tags($this->input->post('idtempat'))));
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'kategori_tempat'		=> $nama_kategori_tempat,
									'is_active' 			=> $status_kategori_tempat,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->kategori_tempat_model->update_kategori_tempat($data_insert,$id);
            
            //insert log
            $activities ='Edit kategori tempat';
			$itemid		= $nama_kategori_tempat;
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
		$id_kategori_tempat		= $this->input->post('f-id-kategoritempat');
		$nama_kategori_tempat	= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-kategoritempat')));
		$id_user				= $this->session->userdata('sess_user_id'); 
		if($id_kategori_tempat != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->kategori_tempat_model->delete_kategori_tempat($data_insert,$id_kategori_tempat);

			//insert log
            $activities ='Menghapus kategori tempat';
			$itemid		= $nama_kategori_tempat;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('kategori-tempat');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('kategori-tempat');
		}
	}
}