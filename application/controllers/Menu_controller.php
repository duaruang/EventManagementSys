<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_controller extends MY_Controller {

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
		$head['title'] 			= 'Menu - Event Management System' ;
		$head['css']			=  $this->load->view('page/menu/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/menu/include/index-script', NULL, TRUE);
        $data['load_menu']		= $this->menu_model->select_menu();
        //Load page
		$this->template->view('page/menu/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Menu - Event Management System' ;
		$head['css']			=  $this->load->view('page/menu/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/menu/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/menu/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Menu - Event Management System' ;
		$head['css']			=  $this->load->view('page/menu/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/menu/include/add-script', NULL, TRUE);
        $data['load_menu']		= $this->menu_model->select_menu_id($id);
        //Load page
		$this->template->view('page/menu/edit',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$nama_menu		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_menu'))));
		$parent_menu	= $this->security->xss_clean(strip_image_tags($this->input->post('parent_menu')));
		$nama_modul		= $this->security->xss_clean(strip_image_tags($this->input->post('nama_modul')));
		$status_menu		= $this->security->xss_clean(strip_image_tags($this->input->post('status_menu')));
		$id_user			= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_cab= $this->menu_model->check_menu($nama_menu);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'nama_menu'				=> $nama_menu,
									'menu_parent'			=> $parent_menu,
									'nama_modul'			=> $nama_modul,
									'is_active' 			=> $status_menu,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->menu_model->insert_menu($data_insert);
            
            //insert log
            $activities ='Tambah Menu';
			$itemid		= $nama_menu;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama menu sudah ada, gunakan nama menu yang lain.'
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
		$nama_menu		= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_menu'))));
		$parent_menu	= $this->security->xss_clean(strip_image_tags($this->input->post('parent_menu')));
		$nama_modul		= $this->security->xss_clean(strip_image_tags($this->input->post('nama_modul')));
		$status_menu	= $this->security->xss_clean(strip_image_tags($this->input->post('status_menu')));
		$id				= $this->security->xss_clean(strip_image_tags($this->input->post('id')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//==== Insert Data ====
			$data_insert	= array(
									'nama_menu'				=> $nama_menu,
									'menu_parent'			=> $parent_menu,
									'nama_modul'			=> $nama_modul,
									'is_active' 			=> $status_menu,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->menu_model->update_menu($data_insert,$id);
            
            //insert log
            $activities ='Tambah Menu';
			$itemid		= $nama_menu;
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
		$id_menu		= $this->input->post('f-id-menu');
		$nama_menu		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-menu')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id_menu != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->menu_model->delete_menu($data_insert,$id_menu);

			//insert log
            $activities ='Menghapus menu';
			$itemid		= $nama_menu;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('menu');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('menu');
		}
	}
}