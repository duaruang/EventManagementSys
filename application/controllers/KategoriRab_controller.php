<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriRab_controller extends MY_Controller {

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
		$head['title'] 			= 'Kategori RAB - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_rab/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/kategori_rab/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_parent']	= $this->kategori_rab_model->select_parent_category();
		
        //Load page
		$this->template->view('page/kategori_rab/index',$data);
	}

	public function add()
	{
	    //$this->is_logged();
		
        //Set Head Content
		$head['title'] 			= 'Tambah Kategori RAB - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_rab/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
		//Set Content
		$data['load_parent']	= $this->kategori_rab_model->select_parent_category();
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_rab/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/kategori_rab/add',$data);
	}

	public function process_add_kategori()
	{
		//No data -> redirected to page adding kategori rab
		if(count($_POST) == 0){
			redirect('kategori-rab/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$jumlah_unit	= trim($this->security->xss_clean(strip_image_tags($this->input->post('jumlah_unit'))));
		$frekwensi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('frekwensi'))));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table kategori rab
		$data_rab	= array(
							'id_parent'				=> NULL,
							'deskripsi'				=> $deskripsi,
							'jumlah_unit'			=> $jumlah_unit,
							'frekwensi'				=> $frekwensi,
							'is_active' 			=> $status,
							'created_by' 			=> $id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$this->kategori_rab_model->insert_category_rab($data_rab);
		
		//Insert Log
		$activities = 'Tambah Kategori RAB';
		$itemid		= $deskripsi;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function process_add_subkategori()
	{
		//No data -> redirected to page adding kategori rab
		if(count($_POST) == 0){
			redirect('kategori-rab/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$parent		= $this->security->xss_clean(strip_image_tags($this->input->post('parent')));
		$deskripsi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$jumlah_unit	= trim($this->security->xss_clean(strip_image_tags($this->input->post('jumlah_unit'))));
		$frekwensi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('frekwensi'))));
		$status		= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user	= $this->session->userdata('sess_user_id');
		
		//Insert Data to table kategori rab
		$data_rab	= array(
							'id_parent'				=> $parent,
							'deskripsi'				=> $deskripsi,
							'jumlah_unit'			=> $jumlah_unit,
							'frekwensi'				=> $frekwensi,
							'is_active' 			=> $status,
							'created_by' 			=> $id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$this->kategori_rab_model->insert_category_rab($data_rab);
		
		//Insert Log
		$activities = 'Tambah Kategori RAB';
		$itemid		= $deskripsi;
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
		$id_rab = $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'View Kategori RAB - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_rab/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_rab/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['load_rab']		= $this->kategori_rab_model->select_category_id($id_rab);
		
        //Load page
		$this->template->view('page/kategori_rab/view',$data);
	}

	public function edit()
	{
	    //$this->is_logged();
	    //Get Data
		$id_rab = $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'Edit Kategori RAB - Event Management System' ;
		$head['css']			=  $this->load->view('page/kategori_rab/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/kategori_rab/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['id_rab']			= $id_rab;
		$data['load_rab']		= $this->kategori_rab_model->select_category_id($id_rab);
		$data['load_parent']	= $this->kategori_rab_model->select_parent_category();
		
        //Load page
		$this->template->view('page/kategori_rab/edit',$data);
	}

	public function process_edit()
	{
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
		$id_rab		= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id-rab')));
		$parent		= $this->security->xss_clean(strip_image_tags($this->input->post('parent')));
		if($parent=='') $f_parent = NULL; else $f_parent = $parent;
		$deskripsi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$status		= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user	= $this->session->userdata('sess_user_id');
		
		//Update Data to table kategori rab
		$data_rab	= array(
							'id_parent'				=> $f_parent,
							'deskripsi'				=> $deskripsi,
							'is_active' 			=> $status,
							'modified_by' 			=> $id_user,
							'modified_date' 		=> date('Y-m-d H:i:s')
						);
		$this->kategori_rab_model->update_category_rab($id_rab,$data_rab);
		
		//Insert Log
		$activities = 'Edit Kategori RAB';
		$itemid		= $deskripsi;
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
		$id_rab		 = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idrab'))); 
		$id_parent	 = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idparent'))); 
		$deskripsi   = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-deskripsi')));
		$id_user	 = $this->session->userdata('sess_user_id');
		
		if($id_rab != '') {
			if($id_parent=='') //Kategori Utama (parent)
			{
				//Update Data table Kategori RAB -> is_active = deleted, delete parent
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->kategori_rab_model->update_category_rab($id_rab,$data);
				
				//Update Data table Kategori RAB -> is_active = deleted, delete child
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->kategori_rab_model->update_subcategory_rab($id_rab,$data);
				
				//insert log
				$activities = 'Hapus Kategori (beserta Sub-Kategori nya) RAB';
				$itemid		= $deskripsi;
				$this->insert_activities_user($activities,$itemid);
			}
			else //Sub-Kategori (child)
			{
				//Update Data table Kategori RAB -> is_active = deleted, delete current sub category
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->kategori_rab_model->update_category_rab($id_rab,$data);
				
				//insert log
				$activities = 'Hapus Sub-Kategori RAB';
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
		
		redirect('kategori-rab');
	}
}