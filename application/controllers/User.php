<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

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
	
	//Function: Sign in to the application
	public function signin()
	{
        //Set Head Content
		$head['title'] = 'Selamat datang di aplikasi e-proposal' ;
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/script/script-signin', NULL, TRUE);
        
		$this->load->view('page/user/signin',$data);
	}
	
	//Function: Process of signing in 
	public function process_signin()
	{
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'OK',
			'page'			=> ''
		);

		//==== Get Data ====
		$username	= $this->security->xss_clean(strip_image_tags($this->input->post('form-username')));
		$password 	= do_hash($this->security->xss_clean(strip_image_tags($this->input->post('form-password'))));
		$page		= $this->security->xss_clean(strip_image_tags($this->session->userdata('sess_user_page')));
		
		//==== Check Data ====
		$sql_user = $this->user_model->select_user($username,$password);
		
		if($sql_user->num_rows() > 0)
		{
			$user 		= $sql_user->result_array();
			$flag_us	= '';
			
			//Check User Group and Status 
			if($user[0]['id_user_group'] == 1) //Administrator, no is_active validations
			{
				$flag_us = 'Y';
			}
			elseif($user[0]['id_user_group'] != '0' and $user[0]['is_active'] == 1) //Not Administrator, is_active should be '1' (active)
			{
				$flag_us = 'Y';
			}
			else //Ex: User group not assigned yet
			{
				$flag_us = 'N';
			}
				 
			if($flag_us == 'Y') //Sign in 
			{
				//Set session userdata
				$session_array = array(
									'logged_in'					=> TRUE,
									'sess_user_id'              => $user[0]['iduser'],
									'sess_user_id_user_group'	=> $user[0]['id_user_group'],
									'sess_user_id_satker'       => $user[0]['id_satuan_kerja'],
									'sess_user_provinsi'       	=> $user[0]['provinsi'],
									'sess_user_kabupaten'       => $user[0]['kabupaten'],
									'sess_user_nip'       		=> $user[0]['nip'],
									'sess_user_first_name'  	=> ucwords($user[0]['nama_depan']),
									'sess_user_last_name'  		=> ucwords($user[0]['nama_belakang']),
									'sess_user_after_login'		=> '1' 
								 );                
				$this->session->set_userdata($session_array);
				
				//Set output value
				$output = array(
					'result'  		=> 'OK',
					'page'			=> $page
				);
				
				//Unset session userdata
				$this->session->set_userdata('sess_user_page','');
				$this->session->unset_userdata('sess_user_page');
				
				//Set session flashdata
				$this->session->set_flashdata('message_success', 'Anda berhasil masuk sebagai '.ucwords($user[0]['nama_depan'].'.'));
				
				//Log user activities
				$activities = 'Sign in';
				$this->insert_activities_user($activities);
			}
			else
			{
				//Set Output Value
				$output = array(
					'result'  		=> 'NG',
					'page'			=> ''
				);
			
				//Set session flashdata
				$this->session->set_flashdata('message_error', 'Sign in tidak berhasil, mohon hubungi Administrator.');
			}
		}
		else
		{
			//Set Output Value
			$output = array(
				'result'  		=> 'NG',
				'page'			=> ''
			);
			
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Username atau password salah!');
		}
		
		echo json_encode($output);
		exit;
	}
    
    public function forgot_password()
	{
        //Set Head Content
		$head['title'] = 'Selamat datang di aplikasi e-proposal' ;
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/script/script-signin', NULL, TRUE);
		
		$this->load->view('page/user/forgot-password',$data);
	}
	
	//Function: Process of forget-password
    public function process_forgot_password()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'OK'
		);

		//==== Get Data ====
		$email	= $this->security->xss_clean(strip_image_tags($this->input->post('form-email')));
		
		//==== Check Data ====
		$sql_user = $this->user_model->select_user_email($email);
		
		if($sql_user->num_rows() > 0) {
			//==== Set Data ====
			/*$randoms    = random_string('alnum', 4);
			$mdd        = do_hash($randoms,'md5');*/
			$mdd	= do_hash($email);
			$url	= base_url().'user/reset/'.$mdd;
			
			//Get Constant data from constants.php
			$email_sender 	= EmailSender;
			$email_address	= EmailAddress;
			
			//==== Send Email ===
			$this->load->library('email');  
	        $this->email->clear();              
            $this->email->from($email_address, $email_sender); 
			$this->email->to($email);	
            $this->email->subject('Password Anda telah berhasil di reset');
            $data['url_reset']	= $url;
			$message			= $this->load->view('email/forgot-password',$data,TRUE);         
            $this->email->message($message);  
			
			if ( !$this->email->send() )
            {
				//$log_action = 'Sistem gagal mengirim email ke '.$email.'.';
                //$this->log_record($log_action);
            }
			else
			{ 
				//$log_action = 'Sistem berhasil mengirim email ke '.$email.'.';
                //$this->log_record($log_action);
				
				//==== Set Data ====
				$random_password 		= random_string('alnum', 8);
				$random_password_enc 	= do_hash($random_password);
				
				//==== Update Data ====
				$data_update	= array(
										'password'			=> $random_password_enc,
										'reset_password' 	=> $random_password,
										'forgot_pass_code' 	=> $mdd,
										'forgot_pass_date' 	=> date('Y-m-d H:i:s')
									);
				$this->user_model->update_forgot_password($data_update,$email);
            }
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Mohon cek email Anda, sistem telah mengirimkan link untuk mengubah password Anda.');
		} 
		else 
		{  
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Email tidak ditemukan, mohon ulangi kembali.');
		}
		
		echo json_encode($output);
		exit;
	}
	
	//Function: Process of reset
    public function reset()
    {
        $random_code = $this->uri->segment(3);
		
		//Checking data 
		$sql = $this->user_model->select_user_reset($random_code);
		
		//If data exists
		if($sql->num_rows() > 0 )
		{
			//Set Head Content
			$head['title'] = 'Selamat datang di aplikasi e-proposal' ;
			$this->load->view('include/head', $head, TRUE);
			
			//Set Spesific Javascript page
			$data['script'] 	= $this->load->view('page/user/script/script-signin', NULL, TRUE);
			
			//==== Set Data ====
			$user 				= $sql->result_array();
			$data['id_user']	= $user[0]['id'];
			
			$this->load->view('page/user/reset-password',$data);
		}
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Link tidak ditemukan, harap coba kembali.');
			
			redirect('sign-in');
		}
    }
	
	//Function: Process of reset-password
    public function process_reset_password()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'OK'
		);

		//==== Get Data ====
		$id_user 		= $this->security->xss_clean(strip_image_tags($this->input->post('form-hidden-id-user')));
		$password 		= $this->security->xss_clean(strip_image_tags($this->input->post('form-password')));
		$en_password	= do_hash($password);
		
		//==== Update Data ====
		$data_update	= array(
								'password'			=> $en_password,
								'reset_password' 	=> '',
								'forgot_pass_code' 	=> '',
								'forgot_pass_date' 	=> ''
							);
		$this->user_model->update_user($data_update,$id_user);
			
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Password telah berhasil diubah.');
		
		echo json_encode($output);
		exit;
	}
	
	//Function: Process of signing out
    public function process_signout()
    {
        $this->is_logged();
		
        //Log user activities
        $activities = 'Sign out';
        $this->insert_activities_user($activities);
        
		//Set session userdata
		$session_array = array(
							'logged_in'					=> '',
							'sess_user_id'              => '',
							'sess_user_id_user_group'	=> '',
							'sess_user_id_satker'       => '',
							'sess_user_provinsi'       	=> '',
							'sess_user_kabupaten'       => '',
							'sess_user_nip'        		=> '',
							'sess_user_first_name'  	=> '',
							'sess_user_last_name'  		=> '',
							'sess_user_after_login'		=> ''
						 );        
						 
		$this->session->set_userdata($session_array);
		
		//Unset session userdata and destroy all session userdata
        $this->session->unset_userdata($session_array);
        //$this->session->sess_destroy();
        
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Anda telah berhasil sign out!');
        redirect('sign-in');
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
	
	//Function: Process of editing My Profile
    public function process_edit_my_profile()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}
		
		
		//Default value is OK. If validations fail result will change to NG.
		$result = 'OK';
		$output = array(
			'result'  		=> $result,
			'msg'			=> ''
		);

		//==== Get Data ====
		$firstname 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-firstname')));
		$lastname 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-lastname')));
		$username	 	= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-username')));
		$nip	 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-nip')));
		$email	 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-email')));
		$phone	 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-phone')));
		$province 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-province')));
		$sql_province	= $this->location_model->select_provinsi_by_id($province);
		if($sql_province->num_rows() > 0)
		{
			$p = $sql_province->result_array();
			$n_province = $p[0]['nama_provinsi'];
		}
		else
		{
			$result = 'NG';
		}
		$city 			= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-city')));
		$sql_city		= $this->location_model->select_kabupaten_by_id($city);
		if($sql_city->num_rows() > 0)
		{
			$c = $sql_city->result_array();
			$n_city = $c[0]['nama_kota'];
		}
		else
		{
			$result = 'NG';
		}
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-status')));
		$id_user		= $this->session->userdata('sess_user_id');
		$u_email		= $this->security->xss_clean(strip_image_tags($this->input->post('f-hidden-email-user')));
		$u_username		= $this->security->xss_clean(strip_image_tags($this->input->post('f-hidden-username')));
		$photo 			= $_FILES['f-ep-photo'];
		$def_photo 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-ep-hidden-photo')));
		
		//==== Check Username Existing ====
		$sql_username = $this->user_model->select_username($username);
		if($sql_username->num_rows() > 0 and $u_username != $username)
		{
			$output = array(
						'result'  		=> 'US_EX',
						'msg'			=> 'Username sudah terdaftar, mohon masukkan username lainnya.'
					);
			
			echo json_encode($output);
			exit;
		}
		
		//==== Check Email Existing ====
		$sql_email = $this->user_model->select_user_email($email);
		if($sql_email->num_rows() > 0 and $u_email != $email)
		{
			$output = array(
						'result'  		=> 'EM_EX',
						'msg'			=> 'Email sudah terdaftar, mohon masukkan email lainnya.'
					);
			
			echo json_encode($output);
			exit;
		}
		
		//==== Update Data ====
		if($result == 'OK')
		{
			// file paths to store
			$paths= [];

			// get file names
			$filename = $photo['name'];
			
			if($filename == '')
			{
				if($def_photo == '')
				{
					$data_update	= array(
											'nama_depan' 		=> ucwords($firstname),
											'nama_belakang' 	=> ucwords($lastname),
											'username' 			=> $username,
											'nip' 				=> $nip,
											'email' 			=> $email,
											'nomor_telepon'		=> $phone,
											'provinsi' 			=> $n_province,
											'kabupaten' 		=> $n_city,
											'is_active' 		=> $status,
											'modified_by'		=> $id_user,
											'modified_date'		=> date("Y-m-d H:i:s")
										);
				}
				else
				{
					$data_update	= array(
											'nama_depan' 		=> ucwords($firstname),
											'nama_belakang' 	=> ucwords($lastname),
											'username' 			=> $username,
											'nip' 				=> $nip,
											'email' 			=> $email,
											'nomor_telepon'		=> $phone,
											'provinsi' 			=> $n_province,
											'kabupaten' 		=> $n_city,
											'foto_profil'		=> $def_photo,
											'is_active' 		=> $status,
											'modified_by'		=> $id_user,
											'modified_date'		=> date("Y-m-d H:i:s")
										);
				}
				$this->user_model->update_user($data_update,$id_user);
					
				//Set session flashdata
				//$this->session->set_flashdata('message_success', 'Profil telah berhasil diubah.');
				
				//Set session userdata
				$session_array = array(
									'sess_user_id_satker'       => '',
									'sess_user_nip'        		=> $nip,
									'sess_user_provinsi'       	=> $n_province,
									'sess_user_kabupaten'       => $n_city,
									'sess_user_first_name'  	=> $firstname,
									'sess_user_last_name'  		=> $lastname
								 );        
								 
				$this->session->set_userdata($session_array);
				
				$output = array(
					'result'  		=> 'OK',
					'msg'			=> 'Profil telah berhasil diubah.',
					'prov'			=> $n_province,
					'city'			=> $n_city
				);
				
				//Log user activities
				$activities = 'Mengubah data pada Profil Saya';
				$this->insert_activities_user($activities);
			}
			else
			{
				//Get new filename
				$ext = end((explode(".", $filename)));
				$new_filename	= 'profil-'.$id_user;
				
				//==== Upload Photo ====
				$config['upload_path'] 		= './assets/images/profile';
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']    		= '2000';
				$config['file_name'] 		= $new_filename;
				$config['overwrite'] 		= TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				
				if(!$this->upload->do_upload('f-ep-photo')){
					$success = false;
					//break;
				} else {
					$data = $this->upload->data();
					$success = true;
				}
				//==== End of Upload Photo ====
				
				// check and process based on successful status 
				if ($success == true) {
					
					$data_update	= array(
											'nama_depan' 		=> ucwords($firstname),
											'nama_belakang' 	=> ucwords($lastname),
											'username' 			=> $username,
											'nip' 				=> $nip,
											'email' 			=> $email,
											'nomor_telepon'		=> $phone,
											'provinsi' 			=> $n_province,
											'kabupaten' 		=> $n_city,
											'foto_profil'		=> $new_filename.'.'.$ext,
											'is_active' 		=> $status,
											'modified_by'		=> $id_user,
											'modified_date'		=> date("Y-m-d H:i:s")
										);
					$this->user_model->update_user($data_update,$id_user);
						
					//Set session flashdata
					//$this->session->set_flashdata('message_success', 'Profil telah berhasil diubah.');
					
					//Set session userdata
					$session_array = array(
										'sess_user_id_satker'       => '',
										'sess_user_nip'        		=> $nip,
										'sess_user_provinsi'       	=> $n_province,
										'sess_user_kabupaten'       => $n_city,
										'sess_user_first_name'  	=> $firstname,
										'sess_user_last_name'  		=> $lastname
									 );        
									 
					$this->session->set_userdata($session_array);
					
					$output = array(
						'result'  		=> 'OK',
						'msg'			=> 'Profil telah berhasil diubah.'
					);
				
					//Log user activities
					$activities = 'Mengubah data pada Profil Saya';
					$this->insert_activities_user($activities);
					
				} else {
					$output = array(
						'result'  		=> 'NG',
						'msg'			=> 'Terjadi kesalahan, mohon ulangi kembali.'
					);
					
					// delete any uploaded files
					foreach ($paths as $file) {
						unlink($file);
					}
				} 
			}
		}
		else
		{
			$output = array(
				'result'  		=> 'NG',
				'msg'			=> 'Terjadi kesalahan, mohon ulangi kembali.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		echo json_encode($output);
		exit;
	}
	
	//Function: Process of changing password
    public function process_change_password()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}
		
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'OK',
			'msg'			=> 'Password telah berhasil diubah.'
		);
		
		//==== Get Data ====
		$password 		= $this->security->xss_clean(strip_image_tags($this->input->post('f-cp-password')));
		$en_password	= do_hash($password);
		$id_user		= $this->session->userdata('sess_user_id');
		
		//==== Update Data ====
		$data_update	= array(
								'password'			=> $en_password,
								'modified_by'		=> $id_user,
								'modified_date'		=> date("Y-m-d H:i:s")
							);
		$sql = $this->user_model->update_cp_user($data_update,$id_user);
			
		//Set session flashdata
		//$this->session->set_flashdata('message_success', 'Password telah berhasil diubah.');
		
		if($sql === FALSE)
		{
			$output = array(
				'result'  		=> 'NG',
				'msg'			=> 'Terjadi kesalahan, mohon ulangi kembali.'
			);
		}
		else
		{
			//Log user activities
			$activities = 'Mengubah password pada Profil Saya';
			$this->insert_activities_user($activities);
		}
		
		echo json_encode($output);
		exit;
	}
	
	//Function: Process of editing kop surat
    public function process_edit_kop()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('dashboard', 'location');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//==== Get Data ====
		//$flag			= $this->security->xss_clean(strip_image_tags($this->input->post('flag-kop'))); 
		$current_kop	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden-current-rab'))); 
		$file 			= $_FILES['f-ek-kop'];
		// file paths to store
		$paths			= [];
		// get file names
		$filename 		= $file['name'];
		$id_user		= $this->session->userdata('sess_user_id');
		
		
		if($current_kop == '' and $filename == '') //User remove current file or there's no data from beginning
		{ 
			//==== Update Data ====
			$data_update	= array(
									'kop_surat'			=> '',
									'modified_by' 		=> $id_user,
									'modified_date' 	=> date('Y-m-d H:i:s')
								);
								
			$sql = $this->user_model->update_user($data_update,$id_user);
		
			if($sql == true)
			{
				$output = array(
					'result'  	=> 'OK',
					'msg'		=> 'Data telah berhasil disimpan.'
				); 
				
				//Log user activities
				$activities = 'Mengubah kop data proposal';
				$this->insert_activities_user($activities);
			} 
			else
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> 'Terjadi kesalahan, mohon ulangi kembali.'
				);
			}
		}
		elseif($current_kop != '' and $filename == '' ) //User doesn't change previous data while data existing (save without changing the file)
		{ 
			//==== Update Data ====
			$data_update	= array(
									'modified_by' 		=> $id_user,
									'modified_date' 	=> date('Y-m-d H:i:s')
								);
			
			$sql = $this->user_model->update_user($data_update,$id_user);
		
			if($sql == true)
			{
				$output = array(
					'result'  	=> 'OK',
					'msg'		=> 'Data telah berhasil disimpan.'
				); 
				
				//Log user activities
				$activities = 'Mengubah kop data proposal';
				$this->insert_activities_user($activities);
			} 
			else
			{
				$output = array(
					'result'  	=> 'NG',
					'msg'		=> 'Terjadi kesalahan, mohon ulangi kembali.'
				);
			}
		}
		else //Upload file
		{ 
			//Get new filename
			$ext = end((explode(".", $filename)));
			$new_filename	= 'kop_'.$id_user;
			
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/images/pdf-header';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']    		= '5120';
			$config['file_name'] 		= $new_filename;
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			
			if(!$this->upload->do_upload('f-ek-kop')){
				$success = 0; 
				//break;
			} else {
				$data = $this->upload->data();
				$success = 1;
			}
			//==== End of Upload Photo ====
		
			// check and process based on successful status 
			if ($success == 1) {
				
				//==== Update Data ====
				$data_update	= array(
										'kop_surat'			=> $new_filename.'.'.$ext,
										'modified_by' 		=> $id_user,
										'modified_date' 	=> date('Y-m-d H:i:s')
									);
					
				
				
				$sql = $this->user_model->update_user($data_update,$id_user);
		
				if($sql == true)
				{
					$output = array(
						'result'  	=> 'OK',
						'msg'		=> 'Data telah berhasil disimpan.'
					);
					
					//Log user activities
					$activities = 'Mengubah kop data proposal';
					$this->insert_activities_user($activities);
				}
				else
				{
					$output = array(
						'result'  	=> 'NG',
						'msg'		=> 'Terjadi kesalahan, mohon ulangi kembali.'
					);
				}
				
			} else {
				$output = array(
						'result'  	=> 'NG',
						'msg'		=> 'Terjadi kesalahan, mohon ulangi kembali.'
					);
				
				// delete any uploaded files
				foreach ($paths as $file) {
					unlink($file);
				}
			} 
		}
		
		
		echo json_encode($output);
		exit;
	}
    
    public function register()
    {
        $head['title'] = 'Selamat datang di aplikasi e-proposal' ;
    	$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/script/script-register', NULL, TRUE);
    	$data['load_kab']	= $this->location_model->select_all_kabupaten();
        
    	$this->load->view('page/user/register',$data);
    }
    
    public function process_register()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('user', 'register');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'OK'
		);

		//==== Get Data ====
		$namaDepan	   = $this->security->xss_clean(strip_image_tags($this->input->post('nama_depan')));
        $namaBelakang  = $this->security->xss_clean(strip_image_tags($this->input->post('nama_belakang')));
        $nip	       = $this->security->xss_clean(strip_image_tags($this->input->post('nip')));
        $kab	       = $this->security->xss_clean(strip_image_tags($this->input->post('kab')));
        $email	       = $this->security->xss_clean(strip_image_tags($this->input->post('email')));
        $password	   = do_hash($this->security->xss_clean(strip_image_tags($this->input->post('password'))));
		
		//==== Check Data ====
        $data = array(
                        'id_lokasi'     => $kab,
                        'nama_depan'    => $namaDepan,
                        'nama_belakang' => $namaBelakang,
                        'nip'           => $nip,
                        'email'         => $email,
                        'password'      => $password,
                        'status'        => 'new',
                        'created_date'  => date('Y-m-d H:i:s'),
                        'ip_address'    => $this->input->ip_address()
                    );
        $this->user_model->insert_register($data);
		

		//==== Send Email ===
		$this->load->library('email');  
        $this->email->clear();              
        $this->email->from('no-reply@testing.com'); 
		$this->email->to($email);	
        $this->email->subject('Terimakasih Telah Melakukan Registrasi pada eproposal');
		$message			= 'Registrasi anda berhasil. Kami akan melakukan verifikasi terlebih dahulu sebelum akun anda aktif';        
        $this->email->message($message);  
		$this->email->send();	
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Registrasi anda berhasil. kami akan melakukan verifikasi data terlebih dahulu sebelum akun anda AKTIF');
		
		
		echo json_encode($output);
		exit;
	}
    
    //Function: Process of reset
    public function need_activate()
    {
        $head['title'] = 'Selamat datang di aplikasi e-proposal' ;
    	$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script'] = $this->load->view('page/user/script/script-needactivation', NULL, TRUE);
    	$data['load_user']	= $this->user_model->select_user_disabled();
        
    	$this->template->view('page/user/need_activate',$data);
    }
    
    //Function: Process save edit status table live
     public function process_save_edit_status()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('user', 'need_activate');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'ok'
		);

		//==== Get Data ====
        $id_user        = $this->security->xss_clean(strip_image_tags($this->input->post('pk')));
        $name           = $this->security->xss_clean(strip_image_tags($this->input->post('name')));
		$status 		= $this->security->xss_clean(strip_image_tags($this->input->post('value')));
		
		//==== Update Data ====
		$data_update	= array(
								'status'			=> $status
							);
		$this->user_model->update_user($data_update,$id_user);
			
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Password telah berhasil diubah.');
		
        //Log user activities
        $activities = 'Update status '.$status.' pada user '.$name;
        $this->insert_activities_user($activities);
        
		echo json_encode($output);
		exit;
	}
    
    //Function: Process save edit status table live
    public function process_save_edit_role()
    {
		//No data -> redirected to Daftar Pegawai 
		if(count($_POST) == 0){
			redirect('user', 'need_activate');
		}

		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  		=> 'ok'
		);

		//==== Get Data ====
        $id_user        = $this->security->xss_clean(strip_image_tags($this->input->post('pk')));
        $name           = $this->security->xss_clean(strip_image_tags($this->input->post('name')));
		$role 			= $this->security->xss_clean(strip_image_tags($this->input->post('value')));
		
		//==== Update Data ====
		$data_update	= array(
								'role'			=> $role
							);
		$this->user_model->update_user($data_update,$id_user);
			
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Password telah berhasil diubah.');
		
        //Log user activities
        $activities = 'Update status '.$status.' pada user '.$name;
        $this->insert_activities_user($activities);
        
		echo json_encode($output);
		exit;
	}
}
