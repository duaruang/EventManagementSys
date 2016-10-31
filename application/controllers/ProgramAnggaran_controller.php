<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramAnggaran_controller extends MY_Controller {

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
		$head['title'] 			= 'Matriks Program dan Anggaran - Event Management System' ;
		$head['css']			=  $this->load->view('page/program_anggaran/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/program_anggaran/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_parent']	= $this->program_anggaran_model->select_parent();
		
        //Load page
		$this->template->view('page/program_anggaran/index',$data);
	}

	public function add()
	{
	    //$this->is_logged();
		
        //Set Head Content
		$head['title'] 			= 'Tambah Matriks Program dan Anggaran - Event Management System' ;
		$head['css']			=  $this->load->view('page/program_anggaran/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
		//Set Content
		$data['load_level1']	= $this->program_anggaran_model->select_level_id(1);
		$data['load_level2']	= $this->program_anggaran_model->select_level_id(2);
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/program_anggaran/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/program_anggaran/add',$data);
	}
	
	public function load_level2()
	{
		$level2 = $_GET['level2'];
		$sql = $this->program_anggaran_model->select_parent_id($level2);
		if($sql->num_rows() > 0)
		{
			$data = $sql->result_array();
			$id_root = $data[0]['id_root'];
			
			$sql2 = $this->program_anggaran_model->select_parent_id($id_root);
			if($sql2->num_rows() > 0)
			{
				$data2 = $sql2->result_array();
				echo "Bisnis Unit: ".$data2[0]['deskripsi'];
			}
		}
	}

	public function process_add_level1()
	{
		//No data -> redirected to page adding matriks program anggaran
		if(count($_POST) == 0){
			redirect('matriks-program-anggaran/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$budget			= $this->security->xss_clean(strip_image_tags($this->input->post('budget')));
		if($budget=='') $f_budget = NULL; else $f_budget = $budget;
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table program anggaran
		$data	= array(
							'id_root'			=> NULL,
							'id_parent'			=> NULL,
							'level'				=> 1,
							'deskripsi'			=> $deskripsi,
							'budget'			=> $f_budget,
							'is_active' 		=> $status,
							'created_by' 		=> $id_user,
							'created_date' 		=> date('Y-m-d H:i:s')
						);
		$this->program_anggaran_model->insert_program_anggaran($data);
		
		//Insert Log
		$activities = 'Tambah Matriks Program & Anggaran (lv1)';
		$itemid		= $deskripsi;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function process_add_level2()
	{
		//No data -> redirected to page adding matriks program anggaran
		if(count($_POST) == 0){
			redirect('matriks-program-anggaran/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id_parent		= $this->security->xss_clean(strip_image_tags($this->input->post('id_parent')));
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$budget			= $this->security->xss_clean(strip_image_tags($this->input->post('budget')));
		if($budget=='') $f_budget = NULL; else $f_budget = $budget;
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Check Root's ID
		$id_p = $id_parent;
		$id_root = NULL;
		do{
			$sql_root = $this->program_anggaran_model->select_parent_id($id_p);
			if($sql_root->num_rows() > 0)
			{
				$root = $sql_root->result_array();
				$id_p = $root[0]['id_parent'];
				$id_root = $root[0]['id'];
			}
			else
			{
				break;
			}
		}while($id_p!=NULL);
		
		
		//Insert Data to table program anggaran
		$data	= array(
							'id_root'			=> $id_root,
							'id_parent'			=> $id_parent,
							'level'				=> 2,
							'deskripsi'			=> $deskripsi,
							'budget'			=> $f_budget,
							'is_active' 		=> $status,
							'created_by' 		=> $id_user,
							'created_date' 		=> date('Y-m-d H:i:s')
						);
		$this->program_anggaran_model->insert_program_anggaran($data);
		
		//Insert Log
		$activities = 'Tambah Matriks Program & Anggaran (lv2)';
		$itemid		= $deskripsi;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function process_add_level3()
	{
		//No data -> redirected to page adding matriks program anggaran
		if(count($_POST) == 0){
			redirect('matriks-program-anggaran/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id_parent		= $this->security->xss_clean(strip_image_tags($this->input->post('id_parent')));
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Check Root's ID
		$id_p = $id_parent;
		$id_root = NULL;
		do{
			$sql_root = $this->program_anggaran_model->select_parent_id($id_p);
			if($sql_root->num_rows() > 0)
			{
				$root = $sql_root->result_array();
				$id_p = $root[0]['id_parent'];
				$id_root = $root[0]['id'];
			}
			else
			{
				break;
			}
		}while($id_p!=NULL);
		
		
		//Insert Data to table program anggaran
		$data	= array(
							'id_root'			=> $id_root,
							'id_parent'			=> $id_parent,
							'level'				=> 3,
							'deskripsi'			=> $deskripsi,
							'budget'			=> NULL,
							'is_active' 		=> $status,
							'created_by' 		=> $id_user,
							'created_date' 		=> date('Y-m-d H:i:s')
						);
		$this->program_anggaran_model->insert_program_anggaran($data);
		
		//Insert Log
		$activities = 'Tambah Matriks Program & Anggaran (lv3)';
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
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
        //Set Head Content
		$head['title'] 			= 'View Matriks Progran dan Anggaran - Event Management System' ;
		$head['css']			=  $this->load->view('page/program_anggaran/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/program_anggaran/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['type']					= $type;
		$load_data						= $this->program_anggaran_model->select_parent_id($id);
		$d1 							= $load_data->result_array();
		$data['load_data']				= $load_data;
		$data['kategori_program'] 		= '';
		$data['kategori_program_id'] 	= '';
		$data['bisnis_unit'] 			= '';
		$data['bisnis_unit_id']			= '';
		if($type==3)
		{
			$sql_parent = $this->program_anggaran_model->select_parent_id($d1[0]['id_parent']);
			if($sql_parent->num_rows() > 0)
			{
				$sp = $sql_parent->result_array();
				$data['kategori_program'] = $sp[0]['deskripsi'];
				$data['kategori_program_id'] = $sp[0]['id'];
			}
		}
		if($type==2 or $type==3)
		{
			$sql_root = $this->program_anggaran_model->select_parent_id($d1[0]['id_root']);
			if($sql_root->num_rows() > 0)
			{
				$sr = $sql_root->result_array();
				$data['bisnis_unit'] = $sr[0]['deskripsi'];
				$data['bisnis_unit_id'] = $sr[0]['id'];
			}
		}

        //Load page
		$this->template->view('page/program_anggaran/view',$data);
	}

	public function edit()
	{
	    //$this->is_logged();
	    //Get Data
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
        //Set Head Content
		$head['title'] 			= 'Edit Matriks Program dan Anggaran - Event Management System' ;
		$head['css']			=  $this->load->view('page/program_anggaran/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/program_anggaran/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['type']					= $type;
		$data['id']						= $id;
		$load_data						= $this->program_anggaran_model->select_parent_id($id);
		$d1 							= $load_data->result_array();
		$data['load_data']				= $load_data;
		$data['load_level1']			= $this->program_anggaran_model->select_level_id(1);
		$data['load_level2']			= $this->program_anggaran_model->select_child_level($d1[0]['id_root'],2);
		$data['kategori_program'] 		= '';
		$data['kategori_program_id'] 	= '';
		$data['bisnis_unit'] 			= '';
		$data['bisnis_unit_id']			= '';
		if($type==3)
		{
			$sql_parent = $this->program_anggaran_model->select_parent_id($d1[0]['id_parent']);
			if($sql_parent->num_rows() > 0)
			{
				$sp = $sql_parent->result_array();
				$data['kategori_program'] = $sp[0]['deskripsi'];
				$data['kategori_program_id'] = $sp[0]['id'];
			}
		}
		if($type==2 or $type==3)
		{
			$sql_root = $this->program_anggaran_model->select_parent_id($d1[0]['id_root']);
			if($sql_root->num_rows() > 0)
			{
				$sr = $sql_root->result_array();
				$data['bisnis_unit'] = $sr[0]['deskripsi'];
				$data['bisnis_unit_id'] = $sr[0]['id'];
			}
		}
		
        //Load page
		$this->template->view('page/program_anggaran/edit',$data);
	}
	
	public function load_kategori()
	{	
		//$this->is_logged();
		
		$id_root = $this->security->xss_clean(strip_image_tags($this->input->post('idroot')));
		$load_content = $this->program_anggaran_model->select_child($id_root);
		
		$rows = array();
		foreach($load_content->result() as $c){
			$rows[] = $c;
		}
		
		echo json_encode($rows);
		exit;
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
		$type		= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-type')));
		$id			= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id')));
		$id_root	= $this->security->xss_clean(strip_image_tags($this->input->post('id_root')));
		$id_parent	= $this->security->xss_clean(strip_image_tags($this->input->post('id_parent')));
		$deskripsi	= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$budget		= $this->security->xss_clean(strip_image_tags($this->input->post('budget')));
		$status		= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		if($type==1)
		{
			$f_budget = $budget;
			$f_root = NULL;
			$f_parent = NULL;
			$lv = '(lv1)';
		}
		elseif($type==2)
		{
			$f_budget = $budget;
			$f_root = $id_root;
			$f_parent = $id_root;
			$lv = '(lv2)';
		}
		elseif($type==3)
		{
			$f_budget = NULL;
			$f_root = $id_root;
			$f_parent = $id_parent;
			$lv = '(lv3)';
		}
		$id_user	= $this->session->userdata('sess_user_id');
		
		//Update Data to table kategori rab
		$data	= array(
							'id_root'			=> $f_root,
							'id_parent'			=> $f_parent,
							'deskripsi'			=> $deskripsi,
							'budget'			=> $f_budget,
							'is_active' 		=> $status,
							'modified_by' 		=> $id_user,
							'modified_date' 	=> date('Y-m-d H:i:s')
						);
		$this->program_anggaran_model->update_program_anggaran($id,$data);
		
		//Insert Log
		$activities = 'Edit Matriks Program & Anggaran '.$lv;
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
		$id		 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id'))); 
		$type	 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-type'))); 
		$deskripsi  = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-deskripsi')));
		$id_user = $this->session->userdata('sess_user_id');
		
		if($id != '') {
			if($type==1) //Level 1 : Bisnis Unit
			{
				//Update Level 1
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->program_anggaran_model->update_program_anggaran($id,$data);
				
				//Update Child (Level 2&3) based on Its Root
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->program_anggaran_model->update_program_anggaran_root($id,$data);
				
				//insert log
				$activities = 'Hapus Bisnis Unit (beserta Kategori Program dan Program nya)';
				$itemid		= $deskripsi;
				$this->insert_activities_user($activities,$itemid);
			}
			elseif($type==2) //Level 2 : Kategori Program
			{
				//Update Level 2
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->program_anggaran_model->update_program_anggaran($id,$data);
				
				//Update Child (Level 3) based on Its Parent
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->program_anggaran_model->update_program_anggaran_parent($id,$data);
				
				//insert log
				$activities = 'Hapus Kategori Program (beserta Program nya)';
				$itemid		= $deskripsi;
				$this->insert_activities_user($activities,$itemid);
			}
			else //Level 3 : Program
			{
				//Update Level 3
				$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
				$this->program_anggaran_model->update_program_anggaran($id,$data);
				
				//insert log
				$activities = 'Hapus Program';
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
		
		redirect('matriks-program-anggaran');
	}
}