<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_controller extends MY_Controller {

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
		$this->is_logged();
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/event/include/index-script', NULL, TRUE);
        $data['load_event']		= $this->event_model->select_event();
        //Load page
		$this->template->view('page/event/index',$data);

	}
	public function propose()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 	= 'Propose Event - Event Management System' ;
		$head['css']	=  $this->load->view('page/event/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/add-script', NULL, TRUE);
        $data['load_kategori_tempat'] 	= $this->kategori_tempat_model->select_kategori_tempat_active();
        $data['load_kategori_event'] 	= $this->kategori_event_model->select_kategori_event_active();
        $data['load_tipe_exam'] 		= $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_tipe_pelatihan'] 	= $this->tipe_pelatihan_model->select_tipe_pelatihan_active();
        $data['load_parent'] 			= $this->kategori_rab_model->select_parent_category();
        $data['load_exam'] 				= $this->get_exam();
        //Load page
		$this->template->view('page/event/propose',$data);
	}

	public function get_exam()
	{
		//$this->is_logged();
		$username = 'event';
		$password = 'event';
	     
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/WebService/Exam/list_exam.php');
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

	public function get_list_peserta($id_jadwal_exam)
	{
		$this->is_logged();
		$username 		= 'event';
		$password 		= 'event';
	     
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/WebService/Exam/list_peserta_exam.php?id_jadwal_exam='.$id_jadwal_exam);
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
		echo json_encode($result->exam[0]->data);
		exit;
	}

	public function get_all_list_peserta()
	{
		$this->is_logged();
		$username 		= 'event';
		$password 		= 'event';
	     
	    // Set up and execute the curl process
	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
	    //curl_setopt($curl_handle, CURLOPT_URL, 'http://182.23.52.249/Dummy/WebService/SSO_Mobile/get_all_karyawan.php');
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

	public function process_add()
	{
		$this->is_logged();
		//No data -> redirected to Dashboard
		if(count($_POST) == 0){
			redirect('pengajuan-event');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$inputNomorMemo				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNomorMemo'))));
		$inputNamaEvent				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNamaEvent'))));
		$inputTopikEvent			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTopikEvent'))));
		$inputJumlahPeserta			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputJumlahPeserta'))));
		$inputStartTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan'))));
		$inputAkhirTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan'))));
		$inputTempatPelaksanaan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTempatPelaksanaan'))));
		$inputNamaTempat			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNamaTempat'))));
		$latitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_latitude'))));
		$longitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_longitude'))));
		$inputSasaranTarget			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputSasaranTarget'))));
		$inputKategoriEvent			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputKategoriEvent'))));
		$inputTipePelatihan			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTipePelatihan'))));
		$inputTipeExam				= $this->security->xss_clean(strip_image_tags($this->input->post('inputTipeExam')));
		$inputDenganExam			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputDenganExam'))));
		$inputIdExam				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputIdExam'))));
		$inputidjadwalexam			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputidjadwalexam'))));
		$id_user					= $this->session->userdata('sess_user_id');
		
		$randdate = strtotime(date('Y-m-d'));
		$randalnum = random_string('alnum', 10);
		$id_event = strtoupper($randalnum.$randdate);
		$is=0;
		$temp_tipe_exam='';
		$count_tipeexam = count($inputTipeExam);
		if($count_tipeexam == 1)
		{
			 $array_tipeexam = $inputTipeExam[0];
		}
		else
		{
			 $array_tipeexam = $inputTipeExam[0].'|'.$inputTipeExam[1];
		}
		
		//==== Check Data ====
		$sql_cab= $this->event_model->check_event($id_event);

		if($sql_cab->num_rows() == 0) {

			//==== Insert Data ====
			$data_insert_event	= array(
									'id_event'							=> $id_event,
									'nomor_memo'						=> $inputNomorMemo,
									'nama_event'						=> $inputNamaEvent,
									'topik_event'						=> $inputTopikEvent,
									'lokasi_kerja'						=> '',
									'mulai_tanggal_pelaksanaan'			=> $inputStartTglPelaksanaan,
									'selesai_tanggal_pelaksanaan'		=> $inputAkhirTglPelaksanaan,
									'id_kategori_tempat_pelaksanaan'	=> $inputTempatPelaksanaan,
									'nama_tempat'						=> $inputNamaTempat,
									'latitude'							=> $latitude,
									'longitude'							=> $longitude,
									'target_sasaran'					=> $inputSasaranTarget,
									'id_kategori_event'					=> $inputKategoriEvent,
									'id_tipe_exam'						=> $array_tipeexam,
									'id_tipe_pelatihan'					=> $inputTipePelatihan,
									'dengan_exam'						=> $inputDenganExam,
									'jumlah_peserta'					=> $inputJumlahPeserta,
									'id_exam'							=> $inputIdExam,
									'id_jadwal_exam'					=> $inputidjadwalexam,
									'status_event' 						=> 'submitted',
									'is_active' 						=> 'active',
									'created_by' 						=> $id_user,
									'created_date' 						=> date('Y-m-d H:i:s')
								);

			$this->event_model->insert_event($data_insert_event);

			
			$inputIdSdm					= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdSdm')));
			$inputNamaPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNamaPeserta')));
			$inputPosisiPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputPosisiPeserta')));

			$temp =count($inputIdSdm);
			for($i=0; $i<$temp;$i++){
  				$data_array = array(
								'id_event'			=> $id_event,
								'idsdm'				=> $inputIdSdm[$i],
								'nik'				=> $inputIdSdm[$i],
								'nama'				=> $inputNamaPeserta[$i],
								'posisi'			=> $inputPosisiPeserta[$i],
								'created_by' 		=> $id_user,
								'created_date' 		=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_peserta_event($data_array);
  			}

			
            //insert log
            $output = array(
				'result'  	=> 'OK',
				'msg'		=> $temp
			);
            $activities ='Tambah Event';
			$itemid		= $inputNamaEvent;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama Event sudah ada, gunakan nama event yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama event sudah ada, gunakan nama event yang lain.');
		}
		
		redirect('event');
	}
    
   
}
