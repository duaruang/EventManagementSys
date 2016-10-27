<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BisnisUnit_controller extends MY_Controller {

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
	    //Check user is logged or not
	    $this->is_logged();
		
		//Set Head Content
		$head['title'] 			= 'Bisnis Unit dan Jabatan - Event Management System' ;
		$head['css']			=  $this->load->view('page/bisnis_unit/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/bisnis_unit/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_bisnis']	= $this->bisnis_unit_model->select_bisnis_unit();
		
        //Load page
		$this->template->view('page/bisnis_unit/index',$data);
	}

	public function add()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Set Head Content
		$head['title'] 			= 'Tambah Bisnis Unit dan Jabatan - Event Management System' ;
		$head['css']			=  $this->load->view('page/bisnis_unit/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
		//Set Content
		$data['load_bisnis']	= $this->bisnis_unit_model->select_bisnis_unit();
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/bisnis_unit/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/bisnis_unit/add',$data);
	}

	public function process_add_bisnisunit()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page adding bisnis unit
		if(count($_POST) == 0){
			redirect('bisnis-unit-jabatan/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table bisnis unit
		$data_bisnis	= array(
							'deskripsi'				=> $deskripsi,
							'is_active' 			=> $status,
							'created_by' 			=> $id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$this->bisnis_unit_model->insert_bisnis_unit($data_bisnis);
		
		//Insert Log
		$activities = 'Tambah Bisnis Unit';
		$itemid		= $deskripsi;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function process_add_jabatan()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page adding jabatan
		if(count($_POST) == 0){
			redirect('bisnis-unit-jabatan/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id_bisnis_unit	= $this->security->xss_clean(strip_image_tags($this->input->post('bisnis_unit')));
		$nama_jabatan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_jabatan'))));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table kategori rab
		$data_rab	= array(
							'id_bisnis_unit'		=> $id_bisnis_unit,
							'nama_jabatan'			=> $nama_jabatan,
							'is_active' 			=> $status,
							'created_by' 			=> $id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$this->bisnis_unit_model->insert_jabatan($data_rab);
		
		//Insert Log
		$activities = 'Tambah Bisnis Unit-Jabatan';
		$itemid		= $nama_jabatan;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function view()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$type 	= $this->uri->segment(3);
		$id		= $this->uri->segment(4);
		
        //Set Head Content
		$head['title'] 			= 'View Bisnis Unit dan Jabatan - Event Management System' ;
		$head['css']			=  $this->load->view('page/bisnis_unit/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/bisnis_unit/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['type']			= $type; //1=bisnis unit; 2=jabatan
		if($type==1) //Bisnis Unit View
		{
			$data['load_data']		= $this->bisnis_unit_model->select_bisnis_unit_id($id);
		}
		elseif($type==2) //Jabatan View
		{
			$data['load_data']		= $this->bisnis_unit_model->select_jabatan_id($id);
		}
		else
		{
			show_404();
		}
		
        //Load page
		$this->template->view('page/bisnis_unit/view',$data);
	}

	public function edit()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$type 	= $this->uri->segment(3);
		$id		= $this->uri->segment(4);
		
        //Set Head Content
		$head['title'] 			= 'Edit Bisnis Unit dan Jabatan - Event Management System' ;
		$head['css']			=  $this->load->view('page/bisnis_unit/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/bisnis_unit/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['id']				= $id;
		$data['type']			= $type;
		if($type==1) //Bisnis Unit View
		{
			$data['load_data']		= $this->bisnis_unit_model->select_bisnis_unit_id($id);
		}
		elseif($type==2) //Jabatan View
		{
			$data['load_data']		= $this->bisnis_unit_model->select_jabatan_id($id);
		}
		else
		{
			show_404();
		}
		$data['load_bisnis']	= $this->bisnis_unit_model->select_bisnis_unit();
		
        //Load page
		$this->template->view('page/bisnis_unit/edit',$data);
	}

	public function process_edit()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page editing kategori rab
		if(count($_POST) == 0){
			redirect('kategori-rab/edit', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id				= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id')));
		$type			= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-type')));
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$id_bisnis_unit	= $this->security->xss_clean(strip_image_tags($this->input->post('bisnis_unit')));
		$nama_jabatan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_jabatan'))));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		if($type==1) //Bisnis Unit Process Edit
		{
			//Update Data to table bisnis unit
			$data	= array(
								'deskripsi'				=> $deskripsi,
								'is_active' 			=> $status,
								'modified_by' 			=> $id_user,
								'modified_date' 		=> date('Y-m-d H:i:s')
							);
			$this->bisnis_unit_model->update_bisnis_unit($id,$data);
			
			//Insert Log
			$activities = 'Edit Bisnis Unit';
			$itemid		= $deskripsi;
			$this->insert_activities_user($activities,$itemid);
		}
		elseif($type==2) //Jabatan Process Edit
		{
			//Update Data to table bisnis unit jabatan
			$data	= array(
								'id_bisnis_unit'		=> $id_bisnis_unit,
								'nama_jabatan'			=> $nama_jabatan,
								'is_active' 			=> $status,
								'modified_by' 			=> $id_user,
								'modified_date' 		=> date('Y-m-d H:i:s')
							);
			$this->bisnis_unit_model->update_jabatan($id,$data);
			
			//Insert Log
			$activities = 'Edit Bisnis Unit-Jabatan';
			$itemid		= $nama_jabatan;
			$this->insert_activities_user($activities,$itemid);
		}
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}
	
	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id		 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id'))); 
		$type	 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-type'))); 
		$deskripsi  = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-deskripsi')));
		$id_user 	= $this->session->userdata('sess_user_id');
		
		if($id != '') {
			if($type==1) //Delete Bisnis Unit
			{
				//Update Data table bisnis unit -> is_active = deleted, delete parent
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->bisnis_unit_model->update_bisnis_unit($id,$data);
				
				//Update Data table bisnis unit jabatan (based on id bisnis_unit) -> is_active = deleted, delete child
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->bisnis_unit_model->update_bisnis_unit_jabatan($id,$data);
				
				//insert log
				$activities = 'Hapus Bisnis Unit (beserta List Jabatan nya)';
				$itemid		= $deskripsi;
				$this->insert_activities_user($activities,$itemid);
			}
			else //Delete Jabatan
			{
				//Update Data table bisnis unit jabatan -> is_active = deleted
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->bisnis_unit_model->update_jabatan($id,$data);
				
				//insert log
				$activities = 'Hapus Bisnis Unit-Jabatan';
				$itemid		= $deskripsi;
				$this->insert_activities_user($activities,$itemid);
			}
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('bisnis-unit-jabatan');
	}
}