<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersetujuanUsulan_controller extends MY_Controller {

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
		$head['title'] 			= 'List Persetujuan Usulan - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/persetujuan_usulan/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_list']		= $this->persetujuan_usulan_model->select_persetujuan();
		
        //Load page
		$this->template->view('page/persetujuan_usulan/index',$data);
	}
	
	public function index_alt()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Set Head Content
		$head['title'] 			= 'List Persetujuan Usulan Pengganti - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/persetujuan_usulan/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_list']		= $this->persetujuan_usulan_model->select_persetujuan_pengganti();
		
        //Load page
		$this->template->view('page/persetujuan_usulan/index_alt',$data);
	}

	public function get_all_karyawan()
	{
		$username = 'event';
		$password = 'event';
	     
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
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

	public function add()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Set Head Content
		$head['title'] 			= 'Tambah List Persetujuan Usulan - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/persetujuan_usulan/add',$data);
	}

	public function process_add()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page adding bisnis unit
		if(count($_POST) == 0){
			redirect('list-persetujuan/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$idsdm			= $this->security->xss_clean(strip_image_tags($this->input->post('idsdm')));
		$nip			= $this->security->xss_clean(strip_image_tags($this->input->post('nip')));
		$nama			= $this->security->xss_clean(strip_image_tags($this->input->post('nama')));
		$posisi			= $this->security->xss_clean(strip_image_tags($this->input->post('posisi')));
		$unit_kerja		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_kerja')));
		$biaya_min		= $this->security->xss_clean(strip_image_tags($this->input->post('min')));
		if($biaya_min == '') $f_min = NULL;
		else $f_min = $biaya_min;
		$biaya_max		= $this->security->xss_clean(strip_image_tags($this->input->post('max')));
		if($biaya_max == '') $f_max = NULL;
		else $f_max = $biaya_max;
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table list persetujuan
		$data	= array(
							'idsdm'				=> $idsdm,
							'nip' 				=> $nip,
							'nama_lengkap' 		=> $nama,
							'unit_kerja' 		=> $unit_kerja,
							'posisi' 			=> $posisi,
							'biaya_minimum' 	=> $f_min,
							'biaya_maksimum'	=> $f_max,
							'is_active'			=> $status,
							'created_by' 		=> $id_user,
							'created_date' 		=> date('Y-m-d H:i:s')
						);
		$this->persetujuan_usulan_model->insert_persetujuan($data);
		
		//Insert Log
		$activities = 'Tambah List Persetujuan Usulan';
		$itemid		= $nama;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function add_alt()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Set Head Content
		$head['title'] 			= 'Tambah List Persetujuan Usulan Pengganti - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
		//Set Content
		$data['load_user']		= $this->persetujuan_usulan_model->select_persetujuan();
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/persetujuan_usulan/add_alt',$data);
	}

	public function process_add_alt()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page adding bisnis unit
		if(count($_POST) == 0){
			redirect('list-persetujuan-pengganti/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$iduser_alt		= $this->security->xss_clean(strip_image_tags($this->input->post('user_alt')));
		$idsdm			= $this->security->xss_clean(strip_image_tags($this->input->post('idsdm')));
		$nip			= $this->security->xss_clean(strip_image_tags($this->input->post('nip')));
		$nama			= $this->security->xss_clean(strip_image_tags($this->input->post('nama')));
		$posisi			= $this->security->xss_clean(strip_image_tags($this->input->post('posisi')));
		$unit_kerja		= $this->security->xss_clean(strip_image_tags($this->input->post('unit_kerja')));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table list persetujuan
		$data	= array(
							'id_listpersetujuan'	=> $iduser_alt,
							'idsdm'					=> $idsdm,
							'nip' 					=> $nip,
							'nama_lengkap' 			=> $nama,
							'unit_kerja' 			=> $unit_kerja,
							'posisi' 				=> $posisi,
							'is_active'				=> $status,
							'created_by' 			=> $id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$this->persetujuan_usulan_model->insert_persetujuan_pengganti($data);
		
		//Insert Log
		$activities = 'Tambah List Persetujuan Usulan Pengganti';
		$itemid		= $nama;
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
		$id		= $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'View List Persetujuan Usulan - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
		//Set Data
		$load_data				= $this->persetujuan_usulan_model->select_persetujuan_id($id);
		$data['load_data']		= $load_data;
		
        //Load page
		if($load_data->num_rows() > 0 ) $this->template->view('page/persetujuan_usulan/view',$data);
		else show_404();
	}

	public function view_alt()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id		= $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'View List Persetujuan Usulan Pengganti - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
		//Set Data
		$load_data				= $this->persetujuan_usulan_model->select_persetujuan_pengganti_id($id);
		$data['load_data']		= $load_data;
		
        //Load page
		if($load_data->num_rows() > 0 ) $this->template->view('page/persetujuan_usulan/view_alt',$data);
		else show_404();
	}
	
	public function get_content_user_alt()
	{
		$id_persetujuan = $this->security->xss_clean(strip_image_tags($this->input->post('idpersetujuan')));
		$load_data = $this->persetujuan_usulan_model->select_persetujuan_id($id_persetujuan);
		
		$rows = array();
		foreach($load_data->result() as $r){
			$rows[] = $r;
		}
		
		echo json_encode($rows);
		exit;
	}

	public function edit()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id 	= $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'Edit List Persetujuan Usulan - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['id']				= $id;
		$load_data				= $this->persetujuan_usulan_model->select_persetujuan_id($id);
		$data['load_data']		= $load_data;
		
        //Load page
		if($load_data->num_rows() > 0 ) $this->template->view('page/persetujuan_usulan/edit',$data);
		else show_404();
	}

	public function process_edit()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page editing kategori rab
		if(count($_POST) == 0){
			redirect('list-persetujuan/edit', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$nama			= $this->security->xss_clean(strip_image_tags($this->input->post('nama')));
		$id_persetujuan	= $this->security->xss_clean(strip_image_tags($this->input->post('id_persetujuan')));
		$biaya_min		= $this->security->xss_clean(strip_image_tags($this->input->post('min')));
		if($biaya_min == '') $f_min = NULL;
		else $f_min = $biaya_min;
		$biaya_max		= $this->security->xss_clean(strip_image_tags($this->input->post('max')));
		if($biaya_max == '') $f_max = NULL;
		else $f_max = $biaya_max;
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table list persetujuan
		$data	= array(
							'biaya_minimum' 	=> $f_min,
							'biaya_maksimum'	=> $f_max,
							'is_active'			=> $status,
							'modified_by' 		=> $id_user,
							'modified_date' 	=> date('Y-m-d H:i:s')
						);
		$this->persetujuan_usulan_model->update_persetujuan($id_persetujuan,$data);
		
		//Insert Log
		$activities = 'Edit List Persetujuan Usulan';
		$itemid		= $nama;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function edit_alt()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id 	= $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'Edit List Persetujuan Usulan Pengganti - Event Management System' ;
		$head['css']			=  $this->load->view('page/persetujuan_usulan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/persetujuan_usulan/include/add-script', NULL, TRUE);
        
		//Set Data 
		$data['id']				= $id;
		$load_data				= $this->persetujuan_usulan_model->select_persetujuan_pengganti_id($id);
		$data['load_data']		= $load_data;
		$data['load_user']		= $this->persetujuan_usulan_model->select_persetujuan();
		
        //Load page
		if($load_data->num_rows() > 0 ) $this->template->view('page/persetujuan_usulan/edit_alt',$data);
		else show_404();
	}

	public function process_edit_alt()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//No data -> redirected to page editing kategori rab
		if(count($_POST) == 0){
			redirect('list-persetujuan-pengganti/edit', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$iduser_alt		= $this->security->xss_clean(strip_image_tags($this->input->post('user_alt')));
		$nama			= $this->security->xss_clean(strip_image_tags($this->input->post('nama')));
		$id				= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id')));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert Data to table list persetujuan
		$data	= array(
							'id_listpersetujuan' 	=> $iduser_alt,
							'is_active'				=> $status,
							'modified_by' 			=> $id_user,
							'modified_date' 		=> date('Y-m-d H:i:s')
						);
		$this->persetujuan_usulan_model->update_persetujuan_pengganti($id,$data);
		
		//Insert Log
		$activities = 'Edit List Persetujuan Usulan Pengganti';
		$itemid		= $nama;
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
		
		//Get Data
		$id		 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-id'))); 
		$nama	 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-nama'))); 
		$id_user 	= $this->session->userdata('sess_user_id');
		
		if($id != '') {
			//Update Data table List Persetujuan -> is_active = deleted
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->persetujuan_usulan_model->update_persetujuan($id,$data);
			
			//Update Data table List Persetujuan Pengganti -> is_active = deleted
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->persetujuan_usulan_model->update_persetujuan_alt($id,$data);
			
			//insert log
			$activities = 'Hapus List Persetujuan Usulan';
			$itemid		= $nama;
			$this->insert_activities_user($activities,$itemid);
		
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('list-persetujuan');
	}
	
	public function process_delete_alt()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id		 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idpengganti'))); 
		$nama	 	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-namapengganti'))); 
		$id_user 	= $this->session->userdata('sess_user_id');
		
		if($id != '') {
			//Update Data table List Persetujuan Pengganti -> is_active = deleted
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->persetujuan_usulan_model->update_persetujuan_pengganti($id,$data);
			
			//insert log
			$activities = 'Hapus List Persetujuan Usulan Pengganti';
			$itemid		= $nama;
			$this->insert_activities_user($activities,$itemid);
		
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('list-persetujuan-pengganti');
	}
}