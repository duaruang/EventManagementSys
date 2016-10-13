<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends MY_Controller {

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
	


    //Function: table user
	public function index()
	{
        //Set Head Content
		$head['title'] 		= 'User Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user/include/index-script', NULL, TRUE);
        $data['load_user']		= $this->user_model->select_user();
        
		$this->template->view('page/user/index',$data);
	}

	//Function: Setting
	public function setting()
	{
        //Set Head Content
		$head['title'] 		= 'User Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user/include/index-script', NULL, TRUE);
        $data['load_user']		= $this->user_model->select_user();
        
		$this->template->view('page/user/setting',$data);
	}

	//Function: table user-group
	public function user_group()
	{
        //Set Head Content
		$head['title'] 		= 'User Group Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/user-group-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/include/user-group-script', NULL, TRUE);
        
		$this->template->view('page/user/user-group',$data);
	}

	//Function: form add user
	public function add_user()
	{
        //Set Head Content
		$head['title'] 		= 'Add User Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/adduser-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/include/adduser-script', NULL, TRUE);
        $data['load_all_karyawan']		= $this->get_all_karyawan();
        $data['load_user_group']		= $this->user_group_model->select_usergroup_active();
		$this->template->view('page/user/add-user',$data);
	}

	//Function: form Process Add
	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$idsdm					= $this->security->xss_clean(strip_image_tags($this->input->post('idsdm')));
		$nama_lengkap			= $this->security->xss_clean(strip_image_tags($this->input->post('nama_lengkap')));
		$nik					= $this->security->xss_clean(strip_image_tags($this->input->post('nik')));
		$username				= $this->security->xss_clean(strip_image_tags($this->input->post('username')));
		$email					= $this->security->xss_clean(strip_image_tags($this->input->post('email')));
		$nama_organisasi		= $this->security->xss_clean(strip_image_tags($this->input->post('nama_organisasi')));
		$deskripsi_organisasi	= $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_organisasi')));
		$hak_akses				= $this->security->xss_clean(strip_image_tags($this->input->post('hak_akses')));
		$status_user			= $this->security->xss_clean(strip_image_tags($this->input->post('status_user')));
		$id_user				= $this->session->userdata('sess_user_id');
		
		//==== Check Data ====
		$sql_user= $this->user_model->check_user($idsdm);
		
		if($sql_user->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'idsdm'					=> $idsdm,
									'nik'					=> $nik,
									'id_user_group'			=> $hak_akses,
									'username'				=> $username,
									'fullname'				=> $nama_lengkap,
									'email'					=> $email,
									'organisasi_name'		=> $nama_organisasi,
									'organisasi_desc'		=> $deskripsi_organisasi,
									'is_active' 			=> $status_user,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->user_model->insert_user($data_insert);
            
            //insert log
            $activities ='Tambah User';
			$itemid		= $nama_lengkap;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'User sudah ada, silahkan cari user yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama cabang sudah ada, gunakan nama cabang yang lain.');
		}
		
		echo json_encode($output);
		exit;
	}

	//Function: View user
	public function view_user()
	{
		$id = $this->uri->segment(3);
        //Set Head Content
		$head['title'] 		= 'View User Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/adduser-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/include/adduser-script', NULL, TRUE);
        $data['load_user_group']		= $this->user_group_model->select_usergroup_dropdown();
        $data['load_user']				= $this->user_model->select_user_id($id);
		$this->template->view('page/user/view-user',$data);
	}

	//Function: form edit user
	public function edit_user()
	{
		$id = $this->uri->segment(3);
        //Set Head Content
		$head['title'] 		= 'Edit User Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/adduser-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/include/adduser-script', NULL, TRUE);
        $data['load_user_group']		= $this->user_group_model->select_usergroup_dropdown();
        $data['load_user']				= $this->user_model->select_user_id($id);
		$this->template->view('page/user/edit-user',$data);
	}

	//Function: form Process Add
	public function process_edit()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$idsdm					= $this->security->xss_clean(strip_image_tags($this->input->post('idsdm')));
		$nama_lengkap			= $this->security->xss_clean(strip_image_tags($this->input->post('nama_lengkap')));
		$nik					= $this->security->xss_clean(strip_image_tags($this->input->post('nik')));
		$username				= $this->security->xss_clean(strip_image_tags($this->input->post('username')));
		$email					= $this->security->xss_clean(strip_image_tags($this->input->post('email')));
		$nama_organisasi		= $this->security->xss_clean(strip_image_tags($this->input->post('nama_organisasi')));
		$deskripsi_organisasi	= $this->security->xss_clean(strip_image_tags($this->input->post('deskripsi_organisasi')));
		$hak_akses				= $this->security->xss_clean(strip_image_tags($this->input->post('hak_akses')));
		$status_user			= $this->security->xss_clean(strip_image_tags($this->input->post('status_user')));
		$id_user				= $this->session->userdata('sess_user_id');
		
		//==== Insert Data ====
		$data_insert	= array(
								'idsdm'					=> $idsdm,
								'nik'					=> $nik,
								'id_user_group'			=> $hak_akses,
								'username'				=> $username,
								'fullname'				=> $nama_lengkap,
								'email'					=> $email,
								'organisasi_name'		=> $nama_organisasi,
								'organisasi_desc'		=> $deskripsi_organisasi,
								'is_active' 			=> $status_user,
								'modified_by' 			=> $id_user,
								'modified_date' 		=> date('Y-m-d H:i:s')
							);

		$this->user_model->update_user($data_insert,$idsdm);
        
        //insert log
        $activities ='Edit User';
		$itemid		= $nama_lengkap;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		
		echo json_encode($output);
		exit;
	}

	//Function : User delete
	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();

		//==== Get Data ====
		$idsdm				= $this->input->post('f-id-user');
		$nama_user			= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-user')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($idsdm != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->user_model->delete_user($data_insert,$idsdm);

			//insert log
            $activities ='Menghapus user';
			$itemid		= $nama_user;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('users');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('users');
		}
	}

	//Function: Sign in to the application
	public function signin()
	{
        //Set Head Content
		$head['title'] 		= 'Sign in - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/vendor-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
        
		$this->load->view('page/user/signin');
	}
	
	//Function: Process of signing in 
	public function cek_authorization()
	{
		/*====================================================================
		PARSE URL PARAMETER
		======================================================================*/
		$url= parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $params);

		$pecah = explode("&", $url['query']);
		$idsdm = $pecah[0];
		$NIK = $pecah[1];
		$username = $pecah[2];
		$nama = $pecah[3];
		$email = $pecah[4];

		$username = substr($username, strpos($username, "=") + 1);
		$idsdm = substr($idsdm, strpos($idsdm, "=") + 1);
		$secret_code=strtoupper("$3cretc0d3".$username.",EVENT,".$idsdm);
		header('Content-Type: application/json');
		$data = json_decode(file_get_contents('http://182.23.52.249/Dummy/SSO_WebService/crosscheck.php?secret='.$secret_code.'&app_code=EVENT&username='.$username));
		$data = json_encode($data);
		$json = json_decode($data, true);
		/*====================================================================
		GET DATA FROM API SSO
		======================================================================*/
		$idsdm 				=$json['login'][0]['data'][0]['idsdm'];
		$nik 				=$json['login'][0]['data'][0]['nik'];
		$username 			=$json['login'][0]['data'][0]['username'];
		$email 				=$json['login'][0]['data'][0]['email'];
		$nama 				=$json['login'][0]['data'][0]['nama'];
		$idsdm 				=$json['login'][0]['data'][0]['idsdm'];
		$posisinama			=$json['login'][0]['data'][0]['posisi_nama'];
		$posisisso			=$json['login'][0]['data'][0]['posisi_sso'];
		$posisisingkatan	=$json['login'][0]['data'][0]['posisi_singkatan'];
		$lokasikerja		=$json['login'][0]['data'][0]['lokasi_kerja'];
		$kodecabang			=$json['login'][0]['data'][0]['kode_cabang'];
		$cabang 			=$json['login'][0]['data'][0]['cabang'];
		$unit				=$json['login'][0]['data'][0]['unit'];
		$kode_unit			=$json['login'][0]['data'][0]['kode_unit'];
		$organisasiname		=$json['login'][0]['data'][0]['organisasi_name'];
		$organisasidesc		=$json['login'][0]['data'][0]['organisasi_desc'];
		$foto 				=$json['login'][0]['data'][0]['foto'];

	
		/*====================================================================
		CHECK DATA USER FROM TABLE USER EVENT MANAGEMENT
		======================================================================*/
		$query_user		= $this->user_model->select_checkin($nik);
		
		if($query_user->num_rows() > 0){
			$sql_user 		= $query_user->result_array();

			//Set session userdata
			$session_array = array(
								'logged_in'					=> TRUE,
								'sess_user_idsdm'			=> $sql_user[0]['idsdm'],
								'sess_user_id'				=> $sql_user[0]['id_user'],
								'sess_user_id_user_group'	=> $sql_user[0]['id_user_group'],
								'sess_user_nik'       		=> $sql_user[0]['nik'],
								'sess_user_nama'       		=> $sql_user[0]['fullname'],
								'sess_user_username'       	=> $sql_user[0]['username'],
								'sess_user_email'   	    => $sql_user[0]['email'],
								'sess_user_nama_cabang'		=> $cabang,
								'sess_user_foto'  			=> $foto,
								'sess_user_kode_fingerprint'=> $sql_user[0]['finger_print']
							 );                
			$this->session->set_userdata($session_array);
			
			$activities ='Sign in';
			$itemid		= '';
			$this->insert_activities_user($activities,$itemid);

			redirect('dashboard');
			

		}else
		{
			    $this->session->set_flashdata('error', 'Mohon maaf, anda tidak terdaftar pada sistem event management system. Hubungi IT center');
			    //redirect ke halaman menampilkan pesan error
				redirect('lock');
		}
		
	}

	public function get_all_karyawan()
	{

	$username = 'event';
	$password = 'event';
     
    // Set up and execute the curl process
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/getSSObyAppCode.php?app_code=event');
    //curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
     
    // Optional, delete this line if your API is open
    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
     
    $buffer = curl_exec($curl_handle);
    curl_close($curl_handle);
     
    $result = json_decode($buffer);
	//foreach($result->karyawan[0]->data as $data)
	//{
	//	echo json_encode($data);
	//	echo ',';
	//}
	return $result;
	}

	public function lock_user()
	{
		$this->load->view('page/user/lock');
	}

    public function forgot_password()
	{
        //Set Head Content
		$head['title'] = 'Forgot Password - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user/include/vendor-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
		
		$this->load->view('page/user/forgot-password');
	}
	
	
	//Function: Process of signing out
    public function process_signout()
    {
        $this->is_logged();
		
        //Log user activities
        $activities = 'Sign out';
        $itemid		= '';
        $this->insert_activities_user($activities,$itemid);
        
		//Set session userdata
		$session_array = array(
							'logged_in'					=> '',
							'sess_user_idsdm'			=> '',
							'sess_user_id'				=> '',
							'sess_user_id_user_group'	=> '',
							'sess_user_nik'       		=> '',
							'sess_user_nama'       		=> '',
							'sess_user_username'       	=> '',
							'sess_user_email'   	    => '',
							'sess_user_nama_cabang'		=> '',
							'sess_user_foto'  			=> '',
							'sess_user_kode_fingerprint'=> ''
						 );                
		$this->session->set_userdata($session_array);
		
		//Unset session userdata and destroy all session userdata
        $this->session->unset_userdata($session_array);
        //$this->session->sess_destroy();
        
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Anda telah berhasil sign out!');
        redirect('dashboard');
    }
    
    public function my_profile()
	{
        $this->is_logged();
       
        $head['title'] = 'Selamat datang di aplikasi e-proposal' ;
    	$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/script/script-myprofile', NULL, TRUE);
        
        //==== Get Data ====
		$id_p						= '';
    	$data['load_profile'] 		= $this->user_model->select_user_profile();
        $data['load_activities'] 	= $this->user_model->load_activities_user();
        $data['load_provinsi'] 		= $this->location_model->select_dropdown_provinsi();
        $data['load_kabupaten'] 	= $this->location_model->select_dropdown_kabupaten($id_p);
		
		//==== Get Data: Provinsi ====
		$data['id_provinsi']	= '';
        $sql_provinsi			= $this->location_model->select_provinsi_by_name($this->session->userdata('sess_user_provinsi'));
		if($sql_provinsi->num_rows() > 0) //Data Exists
		{
			$provinsi 				= $sql_provinsi->result_array();
			$data['id_provinsi']	= $provinsi[0]['id']; 
		}
		
		//==== Get Data: Kabupaten ====
		$data['id_kabupaten']	= '';
        $sql_kabupaten			= $this->location_model->select_kabupaten_by_name($this->session->userdata('sess_user_kabupaten'));
		if($sql_kabupaten->num_rows() > 0) //Data Exists
		{
			$kabupaten 				= $sql_kabupaten->result_array();
			$data['id_kabupaten']	= $kabupaten[0]['id'];
		}
		
		//==== Get Session Userdata ====
    	$data['s_user_id'] 			= $this->session->userdata('sess_user_id');
		$data['s_user_id_satker'] 	= $this->session->userdata('sess_user_id_satker');
		$data['s_user_nip'] 		= $this->session->userdata('sess_user_nip');
		$data['s_user_first_name'] 	= $this->session->userdata('sess_user_first_name');
		$data['s_user_last_name'] 	= $this->session->userdata('sess_user_last_name');
		
    	$this->template->view('page/user/my-profile',$data);
     
    }
	
	
}
