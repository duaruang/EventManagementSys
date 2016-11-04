<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi_controller extends MY_Controller {

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
		$head['title'] 			= 'List Realisasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/realisasi/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     		= $this->load->view('page/realisasi/include/index-script', NULL, TRUE);
        $data['load_realisasi']		= $this->realisasi_model->select_realisasi();
        //Load page
		$this->template->view('page/realisasi/index',$data);

	}

	public function propose()
	{
		$this->is_logged();
		$head['title'] 				= 'Realisasi - Event Management System' ;
		$head['css']				=  $this->load->view('page/realisasi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     		= $this->load->view('page/realisasi/include/add-script', NULL, TRUE);
        $data['load_realisasi']		= $this->realisasi_model->select_realisasi();
        //Load page
		$this->template->view('page/realisasi/propose',$data);

	}

	public function edit()
	{
		//$this->is_logged();
		$id 					= $this->uri->segment(3);
		$head['title'] 			= 'Realisasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/realisasi/include/edit-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['load_event']				= $this->event_model->select_detail_event($id);
        $ss['load_events']				= $this->event_model->select_detail_event($id);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_kategori_tempat_dropdown();
        $data['load_kategori_event']	= $this->kategori_event_model->select_kategori_event_dropdown();
        $data['load_tipe_pelatihan'] 	= $this->tipe_pelatihan_model->select_tipe_pelatihan_dropdown();
        $data['load_tipe_exam'] 		= $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_parent'] 			= $this->kategori_rab_model->select_parent_category();
        $data['load_exam'] 				= $this->get_exam();
        $data['load_program_anggaran']	= $this->program_anggaran_model->select_program_anggaran_dropdown();
        $data['load_bu'] 				= $this->bisnis_unit_model->select_bisnis_unit_dropdown();

        $data['load_peserta'] 			= $this->event_model->select_peserta($id);
        $data['load_pic'] 				= $this->event_model->select_pic($id);
        $data['load_trainer'] 			= $this->event_model->select_trainer($id);
        //$data['load_rab'] 				= $this->event_model->select_rab($id);
        $data['load_materi'] 			= $this->event_model->select_materi($id);
        $data['load_rundown'] 			= $this->event_model->select_rundown($id);

        $data['script']     			= $this->load->view('page/realisasi/include/edit-script', $ss, TRUE);
        //Load page
		$this->template->view('page/realisasi/edit',$data);

	}

	public function make_pdf($id)
	{
		//==== Get Data ====
		$sql_query 		= $this->event_model->select_event_submitted_test($id);
		$count_trainer 	= $this->event_model->select_data_trainer($id)->num_rows();
		$count_pic 		= $this->event_model->select_data_pic($id)->num_rows();
		$sql_query = $this->event_model->select_event_submitted_test($id);
		$data 			= $sql_query->result_array();

		//init data
		$nomor_memo 	= $data[0]['nomor_memo'];
		$kepada			= 'Divisi Pusat Pendidikan dan Pelatihan';
		$tanggal 		= $data[0]['crdate_event'];
		$perihal 		= 'Usulan '.$data[0]['nama_event'];
		$nama_event		= $data[0]['nama_event'];
		$topik_event	= $data[0]['topik_event'];
		$sasaran 		= $data[0]['target_sasaran'];
		$kategori_event	= $data[0]['kategori_event'];
		$kategori_tempat= $data[0]['kategori_tempat'];
		$nama_tempat	= $data[0]['nama_tempat'];
		$start_tanggal_p= $data[0]['mulai_tanggal_pelaksanaan'];
		$jumlah_peserta	= $data[0]['jumlah_peserta'];
		$jumlah_pengajar= $count_trainer;
		$jumlah_panitia = $count_pic;
		$jumlah_rab		= 'Rp. '.number_format($data[0]['total_rab'],0,'.','.');
		$uang_muka		= 'Rp. '.number_format($data[0]['uang_muka'],0,'.','.');
		$nama_pembuat	= /*$this->session->userdata('sess_user_nama');*/'Yulianto Suropati';
		$posisi_pembuat = /*$this->session->userdata('sess_user_posisinama');*/'Pimpinan Cabang Purwokerto';
		//==== Set Path ====
		//$filename = 'test';
	    
		$filename = 'event'.$nomor_memo.date("Ymd_His").'.pdf';
		$pdfFilePath = FCPATH."/assets/attachment/".$filename;
		//==== Set Data ====
		//$data['page_title'] = 'Hello world'; // pass data to the view
		$data_rab['id_event']	= $id;
		$data['nomor_memo']		= $nomor_memo;
		$data['kepada']			= $kepada;
		$data['perihal']		= $perihal;
		$data['tanggal_dibuat']	= $tanggal;
		$data['nama_event']		= $nama_event;
		$data['topik_event']	= $topik_event;
		$data['sasaran']		= $sasaran;
		$data['kategori_event']	= $kategori_event;
		$data['kategori_tmp']	= $kategori_tempat;
		$data['nama_tempat']	= $nama_tempat;
		$data['start_tanggal_p']= $start_tanggal_p;
		$data['jumlah_peserta']	= $jumlah_peserta;
		$data['jumlah_pengajar']= $jumlah_pengajar;
		$data['jumlah_panitia']	= $jumlah_panitia;
		$data['jumlah_rab']		= $jumlah_rab;
		$data['nama_pembuat']	= $nama_pembuat;
		$data['posisi_pembuat']	= $posisi_pembuat;

		$data['jumlah_rab']		= $jumlah_rab;
		$data['uang_muka']		= $uang_muka;
		
		//load list peserta
		$atu['load_list_peserta']	= $this->event_model->get_list_peserta($id);

		$data_rab['load_parent']		= $this->event_model->select_rab_parent_category($id);
		$data_listpic['load_listpic']	= $this->event_model->select_data_pic($id);
		$data_trainer['load_trainer']	= $this->event_model->select_data_trainer($id);

		$html 			 	= $this->load->view('memo-template', $data, true); // render the view into HTML
		$load_listpeserta 	= $this->load->view('memo-lampiranlistpeserta', $atu, true); // render the view into HTML 
		$load_rab		 	= $this->load->view('memo-rab', $data_rab, true); // render the view into HTML
		$load_pic		 	= $this->load->view('memo-listpic', $data_listpic, true); // render the view into HTML
		$load_trainer		= $this->load->view('memo-listtrainer', $data_trainer, true); // render the view into HTML
		//load RAB

		$this->load->library('m_pdf');
		$param = '"","A4","","",0,0,100,0,6,3,"L"';
		$pdf = $this->m_pdf->load($param);
		$pdf->setAutoTopMargin = 'stretch'; // Set pdf top margin to stretch to avoid content overlapping
		$pdf->setAutoBottomMargin = 'stretch'; // Set pdf bottom margin to stretch to avoid content overlapping
		$pdf->setHTMLHeader('<img style="width: 120px;" src="'.base_url().'assets/images/logo-pnm.png">');
		$pdf->defaultfooterline=0;
		$pdf->SetFooter('
		<div class="signatur-footer" style="margin-top:70px;float: right;width: 35%;font-family: "Roboto", sans-serif;">
			<table cellspacing="0" width="100%" style="border:0.5px solid #000;text-align: center;font-size: 12px;">
				<tr>
					<td style="height: 50px;width: 25%; border: 1px solid #000;"></td>
					<td style="height: 50px;width: 25%; border: 1px solid #000;"></td>
					<td style="height: 50px;width: 25%; border: 1px solid #000;"></td>
					<td style="height: 50px;width: 25%; border: 1px solid #000;"></td>
				</tr>
				<tr>
					<td style="width: 25%;height: 20px; border: 1px solid #000;">AS</td>
					<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
					<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
					<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
				</tr>
			</table>
		</div>'); 
		$pdf->WriteHTML($html); // write the HTML into the PDF
		if($jumlah_peserta!=0){
			$pdf->AddPage();
			$pdf->WriteHTML($load_listpeserta);
		}
		if($jumlah_rab!=''){
			$pdf->AddPage();
			$pdf->WriteHTML($load_rab);
		}
		if($jumlah_panitia!=0){
			$pdf->AddPage();
			$pdf->WriteHTML($load_pic);
		}

		if($jumlah_pengajar!=0){
			$pdf->AddPage();
			$pdf->WriteHTML($load_trainer);
		}
		$pdf->Output($pdfFilePath, 'I');
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

	public function get_trainer_internal()
	{
		$this->is_logged();
		$data = $this->trainer_model->select_trainer_active();

		$oleh = array(
					'draw' 				=> 1,
					'recordsTotal' 		=> $data->num_rows(),
					'recordsFiltered' 	=> $data->num_rows(),
					'data'				=> $data->result()
			);
		echo json_encode($oleh);

	}

	public function get_materi()
	{
		$materi		= $this->materi_model->select_materi_active();
		//sent data to datatables
		
		foreach($materi->result_array() as $data)
		{
			json_encode($data);
			$ass[] =  array(
											'data' =>  $data['id'],
											'value' => $data['nama_materi']
						);
		}
		$oleh = array(
					'query' 			=> 'Unit',
					'suggestions'		=>  $ass
			);

		echo json_encode($oleh);
	}

	public function get_trainer()
	{
		$trainerdata		= $this->trainer_model->select_trainer_active();
		//sent data to datatables
		
		foreach($trainerdata->result_array() as $data)
		{
			json_encode($data);
			$ass[] =  array(
											'data' =>  $data['id'],
											'value' => $data['nama_pemateri']
						);
		}
		$oleh = array(
					'query' 			=> 'Unit',
					'suggestions'		=>  $ass
			);

		echo json_encode($oleh);
	}

	public function process_edit()
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
		$status_event ="";

		//==== Get Data ====
		$id_event					= $this->input->post('id_event');
		$inputNomorMemo				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNomorMemo'))));
		$inputNamaEvent				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNamaEvent'))));
		$inputTopikEvent			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTopikEvent'))));
		$inputJumlahPeserta			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputJumlahPeserta'))));
		$inputStartTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan'))));
		$inputAkhirTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan'))));
		$inputTempatPelaksanaan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTempatPelaksanaan'))));
		$inputProgramAnggaran		= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputProgramAnggaran'))));
		$inputNamaTempat			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNamaTempat'))));
		$latitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_latitude'))));
		$inputIdSdm					= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdSdm')));
		$longitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_longitude'))));
		$inputSasaranTarget			= $this->security->xss_clean(strip_image_tags($this->input->post('inputSasaranTarget')));
		$inputKategoriEvent			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputKategoriEvent'))));
		$inputTipePelatihan			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTipePelatihan'))));
		$inputTipeExam				= $this->security->xss_clean(strip_image_tags($this->input->post('inputTipeExam')));
		$inputDenganExam			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputDenganExam'))));
		$inputIdExam				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputIdExam'))));
		$inputGrandTotal			= trim($this->security->xss_clean(strip_image_tags($this->input->post('grand_total'))));
		$inputnamaPemateri			= $this->security->xss_clean(strip_image_tags($this->input->post('namaPemateri')));
		$inputNamaPic				= $this->security->xss_clean(strip_image_tags($this->input->post('nama_pic')));
		$id_user					= $this->session->userdata('sess_user_id');

		$comma_separated = implode(";", $inputSasaranTarget);

		if ($this->input->post('submit')) {
		    $status_event = 'submitted';
		}
		if ($this->input->post('draft')) {
		    $status_event = 'draft';
		}
		
		$is=0;
		if($inputTipeExam !== '')
		{
			$temp_tipe_exam='';
			$count_tipeexam = count($inputTipeExam);
			if($count_tipeexam == 1)
			{
				 $array_tipeexam = $inputTipeExam[0].'|';
			}
			else
			{
				 $array_tipeexam = $inputTipeExam[0].'|'.$inputTipeExam[1];
			}
		}
		else
		{
			$array_tipeexam= NULL;
		}

		//check exam
		if($inputIdExam != '')
		{
			$this->event_model->delete_event_exam($id_event);

			$inputidjadwalexam			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputidjadwalexam'))));
			$judul_exam					= trim($this->security->xss_clean(strip_image_tags($this->input->post('judul_exam'))));
			$deskripsiExam				= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
			$data_exam = array(
								'id_event'				=> $id_event,
								'id_exam'				=> $inputIdExam,
								'id_jadwal_exam'		=> $inputidjadwalexam,
								'tipe_exam'				=> $array_tipeexam,
								'judul_exam'			=> $judul_exam,
								'kategori_exam'			=> $deskripsiExam,
								'is_active'				=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_exam_event($data_exam);
		}

		//check pic
		if($inputNamaPic != '')
		{
			$idPic					= $this->security->xss_clean(strip_image_tags($this->input->post('id_karyawan')));
			$this->event_model->delete_event_pic($id_event);
			$temp =count($inputNamaPic);
			for($i=0; $i<$temp;$i++){
  				$data_pic = array(
  								'id_event'				=> $id_event,
								'id_karyawan'			=> $idPic[$i],
								'nama_pic'				=> $inputNamaPic[$i],
								'is_active'				=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_pic_event($data_pic);
  			}
		}

		//check trainer
		if($inputnamaPemateri != '')
		{
			$inputPerusahaan		= $this->security->xss_clean(strip_image_tags($this->input->post('inputPerusahaan')));
			$inputMateri			= $this->security->xss_clean(strip_image_tags($this->input->post('inputMateri')));

			$this->event_model->delete_event_trainer($id_event);
			$temp =count($inputIdTrainer);
			for($i=0; $i<$temp;$i++){
  				$data_trainer = array(	
  								'id_event'				=> $id_event,
								'kategori_trainer'		=> $inputPerusahaan[$i],
								'nama_trainer'			=> $inputnamaPemateri[$i],
								'materi'				=> $inputMateri[$i],
								'is_active'				=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_trainer_event($data_trainer);
  			}
		}

		//check rundown
		if ($_FILES['rundown_input']) {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/attachments/rundown';
			$config['allowed_types'] 	= 'xls|xlsx';
			$config['max_size']    		= '2000';
			$config['overwrite'] 		= TRUE;

			$doc_u 		= $_FILES['rundown_input']['name'];
			$fileName 	= $id_event.'_'.date('Ymd').'at'.date('His').'_'.$doc_u;
			$doc_user	= $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('rundown_input')) {

				$this->event_model->delete_event_rundown($id_event);
				$this->upload->data();
				
				//Insert to table event files
				$data_files = array(
								'id_event'				=> $id_event,
								'nama_file'				=> $fileName,
								'tipe_file'				=> $this->upload->file_type,
								'is_active' 			=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
							);
				$this->event_model->insert_rundown_event_files($data_files);
				
			} else {

				$output = array(
					'result'  	=> 'UP',
					'msg'		=>  $this->upload->display_errors().' nama->'.$fileName
				);
			}
			
		}

		//check Materi
		if ($_FILES['materi_input']) {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/attachments/materi';
			$config['allowed_types'] 	= 'docx|jpg|jpeg|png|pdf';
			$config['max_size']    		= '2000';
			$config['overwrite'] 		= TRUE;

			$doc_u 		= $_FILES['materi_input']['name'];
			$fileName 	= $id_event.'_'.date('Ymd').'at'.date('His').'_'.$doc_u;
			$doc_user	= $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('materi_input')) {

				$this->event_model->delete_event_materi($id_event);
				$this->upload->data();
				
				//Insert to table event files
				$data_files = array(
									'id_event'				=> $id_event,
									'nama_file'				=> $fileName,
									'tipe_file'				=> $this->upload->file_type,
									'is_active' 			=> 'active',
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
							);
				$this->event_model->insert_materi_event_files($data_files);
				
			} else {

				$output = array(
					'result'  	=> 'UP',
					'msg'		=>  $this->upload->display_errors().' nama->'.$fileName
				);
			}
			
		}

		$total_rab=null;
		$uang_muka=null;

		//check rab
		if($inputGrandTotal !== 0)
		{
			$this->event_model->delete_event_rab($id_event);
			$total_rab			= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('grand_total'))));
			$uang_muka			= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('downpayment'))));

			$rab_query			= $this->kategori_rab_model->select_parent_category();
			if($rab_query->num_rows() > 0){
				foreach($rab_query->result() as $data){

					$load_child = $this->kategori_rab_model->select_child_category($data->id);
                    $child_exist = 0; 
                    if($load_child->num_rows() > 0)
                    {
                        $child_exist = 1;
                    }

					$id_rab				= $data->id;
					$total 				= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('totalcost_'.$data->id))));

					$data_insert	= array(
											'id_event'				=> $id_event,
											'id_rab'				=> $id_rab,
											'total'					=> $total,
											'is_active' 			=> 'active',
											'created_by' 			=> $id_user,
											'created_date' 			=> date('Y-m-d H:i:s')
					);

						//check jika value kosong, id rab tersebut tidak perlu dimasukan ke event_rab
						if($total == 0)
						{
							
						}
						else{
							$this->event_model->insert_rab_event($data_insert);
						}


					if($child_exist==1)
                    {
                        $no=1;
                        foreach($load_child->result() as $c)
                        {

						$id_rab				= $c->id;
						$id_rab_parent		= $c->id_parent;
						$jumlah				= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('jumlah_'.$c->id))));
						$qty				= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('frekwensi_'.$c->id))));
						$unit_cost			= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('unit_cost_'.$c->id))));
						$total 				= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('total_cost_'.$c->id))));


						$data_insert	= array(
											'id_event'				=> $id_event,
											'id_rab'				=> $id_rab,
											'id_rab_parent'			=> $id_rab_parent,
											'jumlah'				=> $jumlah,
											'qty'					=> $qty,
											'unit_cost'				=> $unit_cost,
											'total'					=> $total,
											'is_active' 			=> 'active',
											'created_by' 			=> $id_user,
											'created_date' 			=> date('Y-m-d H:i:s')
						);
							//check jika value kosong, id rab tersebut tidak perlu dimasukan ke event_rab
							if($total == 0)
							{
								
							}
							else{
								$this->event_model->insert_rab_event($data_insert);
							}
						}
					}
				}
			}
		}

		//check peserta
		if($inputIdSdm !== 0)
		{
			$this->event_model->delete_event_list_peserta($id_event);

			$inputIdSdm					= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdSdm')));
			$inputNikPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNikPeserta')));
			$inputNamaPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNamaPeserta')));
			$inputPosisiPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputPosisiPeserta')));
			$inputUnitKerjaPeserta		= $this->security->xss_clean(strip_image_tags($this->input->post('inputUnitKerjaPeserta')));

			$temp =count($inputIdSdm);
			for($i=0; $i<$temp;$i++){
  				$data_array = array(
  								'id_event'			=> $id_event,
								'idsdm'				=> $inputIdSdm[$i],
								'nik'				=> $inputNikPeserta[$i],
								'nama'				=> $inputNamaPeserta[$i],
								'posisi'			=> $inputPosisiPeserta[$i],
								'unit_kerja'		=> $inputUnitKerjaPeserta[$i],
								'created_by' 		=> $id_user,
								'created_date' 		=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_peserta_event($data_array);
  			}
  		}

		//==== Check Data ====

		//==== Insert Data ====
			$data_insert_event	= array(
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
									'id_program_anggaran'				=> $inputProgramAnggaran,
									'target_sasaran'					=> $comma_separated,
									'id_kategori_event'					=> $inputKategoriEvent,
									'id_tipe_pelatihan'					=> $inputTipePelatihan,
									'dengan_exam'						=> $inputDenganExam,
									'jumlah_peserta'					=> $inputJumlahPeserta,
									'uang_muka'							=> $uang_muka,
									'total_rab'							=> $total_rab,
									'status_event' 						=> $status_event,
									'is_active' 						=> 'active',
									'modified_by' 						=> $id_user,
									'modified_date' 					=> date('Y-m-d H:i:s')
								);

			$this->event_model->update_event($data_insert_event,$id_event);

			
            //insert log
            $output = array(
				'result'  	=> 'OK',
				'msg'		=> 'event ok'
			);
            $activities ='Edit Event';
			$itemid		= $inputNamaEvent;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		//redirect('event');
		echo json_encode($output);
	}

	public function get_all_list_pesertas()
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

}