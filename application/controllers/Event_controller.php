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
		//$this->is_logged();
		$head['title'] 			= 'List Event - Event Management System' ;
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
	
	public function edit()
	{
		//$this->is_logged();
		$id 					= $this->uri->segment(3);
		$head['title'] 			= 'Edit Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/edit-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/edit-script', NULL, TRUE);
        $data['load_event']				= $this->event_model->select_detail_event($id);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_kategori_tempat_dropdown();
        $data['load_kategori_event']	= $this->kategori_event_model->select_kategori_event_dropdown();
        $data['load_tipe_pelatihan'] 	= $this->tipe_pelatihan_model->select_tipe_pelatihan_dropdown();
        $data['load_tipe_exam'] 		= $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_parent'] 			= $this->kategori_rab_model->select_parent_category();
        $data['load_exam'] 				= $this->get_exam();

        $data['load_peserta'] 			= $this->event_model->select_peserta($id);
        $data['load_pic'] 				= $this->event_model->select_pic($id);
        $data['load_trainer'] 			= $this->event_model->select_trainer($id);
        //$data['load_rab'] 				= $this->event_model->select_rab($id);
        $data['load_materi'] 			= $this->event_model->select_materi($id);
        $data['load_rundown'] 			= $this->event_model->select_rundown($id);
        //Load page
		$this->template->view('page/event/edit',$data);

	}

	public function edit_tanggal()
	{
		//$this->is_logged();
		$id 					= $this->uri->segment(3);
		$head['title'] 			= 'Edit Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/edit-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/edit-tanggal-script', NULL, TRUE);
        $data['load_event']				= $this->event_model->select_detail_event($id);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_kategori_tempat_dropdown();
        $data['load_kategori_event']	= $this->kategori_event_model->select_kategori_event_dropdown();
        $data['load_tipe_pelatihan'] 	= $this->tipe_pelatihan_model->select_tipe_pelatihan_dropdown();
        $data['load_tipe_exam'] 		= $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_parent'] 			= $this->kategori_rab_model->select_parent_category();
        $data['load_exam'] 				= $this->get_exam();

        $data['load_peserta'] 			= $this->event_model->select_peserta($id);
        $data['load_pic'] 				= $this->event_model->select_pic($id);
        $data['load_trainer'] 			= $this->event_model->select_trainer($id);
        //$data['load_rab'] 				= $this->event_model->select_rab($id);
        $data['load_materi'] 			= $this->event_model->select_materi($id);
        $data['load_rundown'] 			= $this->event_model->select_rundown($id);

        $data['load_tanggal'] 			= $this->event_model->select_tanggal_ubah($id);
        //Load page
		$this->template->view('page/event/edit-tanggal',$data);

	}

	public function view()
	{
		//$this->is_logged();
		$id 					= $this->uri->segment(3);
		$head['title'] 			= 'View Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/edit-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/edit-script', NULL, TRUE);
        $data['load_event']				= $this->event_model->select_detail_event($id);
        $data['load_kategori_tempat']	= $this->kategori_tempat_model->select_kategori_tempat_dropdown();
        $data['load_kategori_event']	= $this->kategori_event_model->select_kategori_event_dropdown();
        $data['load_tipe_pelatihan'] 	= $this->tipe_pelatihan_model->select_tipe_pelatihan_dropdown();
        $data['load_tipe_exam'] 		= $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_parent'] 			= $this->kategori_rab_model->select_parent_category();
        $data['load_exam'] 				= $this->get_exam();

        $data['load_peserta'] 			= $this->event_model->select_peserta($id);
        $data['load_pic'] 				= $this->event_model->select_pic($id);
        $data['load_trainer'] 			= $this->event_model->select_trainer($id);
        //$data['load_rab'] 				= $this->event_model->select_rab($id);
        $data['load_materi'] 			= $this->event_model->select_materi($id);
        $data['load_rundown'] 			= $this->event_model->select_rundown($id);
        $data['load_tanggal'] 			= $this->event_model->select_tanggal_ubah($id);
        //Load page
		$this->template->view('page/event/view',$data);

	}

	public function process_edit_tanggal()
	{
		$this->is_logged();
		//No data -> redirected to Dashboard
		if(count($_POST) == 0){
			redirect('pengajuan-event');
		}
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		$id_event					= $this->input->post('id_event');
		$nama_event					= trim($this->security->xss_clean(strip_image_tags($this->input->post('nama_event'))));
		$inputStartTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputStartTglPelaksanaan'))));
		$inputAkhirTglPelaksanaan	= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputAkhirTglPelaksanaan'))));
		$oldStartTglPelaksanaan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('old_start_date'))));
		$oldAkhirTglPelaksanaan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('old_end_date'))));
		$id_user					= $this->session->userdata('sess_user_id');

		$data_insert_event	= array(
									'mulai_tanggal_pelaksanaan'			=> $inputStartTglPelaksanaan,
									'selesai_tanggal_pelaksanaan'		=> $inputAkhirTglPelaksanaan,
									'modified_by' 						=> $id_user,
									'modified_date' 					=> date('Y-m-d H:i:s')
								);
		$this->event_model->update_event($data_insert_event,$id_event);

		$data_insert_date	= array(
									'id_event'							=> $id_event,
									'start_date'						=> $oldStartTglPelaksanaan,
									'end_date'							=> $oldAkhirTglPelaksanaan,
									'change_start_date'					=> $inputStartTglPelaksanaan,
									'change_end_date'					=> $inputAkhirTglPelaksanaan,
									'is_active' 						=> 'active',
									'created_by' 						=> $id_user,
									'created_date' 						=> date('Y-m-d H:i:s')
								);
		$this->event_model->insert_event_changedate($data_insert_date);


		$output = array(
			'result'  	=> 'OK',
			'msg'		=>  'ok'
		);
		$activities = 'Change date event';
		$itemid		= $nama_event;
		$this->insert_activities_user($activities,$itemid);

		echo json_encode($output);
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
		$inputNamaTempat			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputNamaTempat'))));
		$latitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_latitude'))));
		$longitude					= trim($this->security->xss_clean(strip_image_tags($this->input->post('ev_longitude'))));
		$inputSasaranTarget			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputSasaranTarget'))));
		$inputKategoriEvent			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputKategoriEvent'))));
		$inputTipePelatihan			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputTipePelatihan'))));
		$inputTipeExam				= $this->security->xss_clean(strip_image_tags($this->input->post('inputTipeExam')));
		$inputDenganExam			= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputDenganExam'))));
		$inputIdExam				= trim($this->security->xss_clean(strip_image_tags($this->input->post('inputIdExam'))));
		$inputGrandTotal			= trim($this->security->xss_clean(strip_image_tags($this->input->post('grand_total'))));
		$inputIdTrainer				= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdTrainer')));
		$inputNamaPic				= $this->security->xss_clean(strip_image_tags($this->input->post('nama_pic')));
		$id_user					= $this->session->userdata('sess_user_id');
		
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
		if($inputIdTrainer != '')
		{
			$inputPerusahaan		= $this->security->xss_clean(strip_image_tags($this->input->post('inputPerusahaan')));
			$this->event_model->delete_event_trainer($id_event);
			$temp =count($inputIdTrainer);
			for($i=0; $i<$temp;$i++){
  				$data_trainer = array(	
  								'id_event'				=> $id_event,
								'kategori_trainer'		=> $inputPerusahaan[$i],
								'id_kategori_trainer'	=> $inputIdTrainer[$i],
								'is_active'				=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_trainer_event($data_trainer);
  			}
		}

		//check rundown
		if (isset($_FILES['rundown_input']['name']) != '') {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			$this->event_model->delete_event_rundown($id_event);
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
		if (isset($_FILES['materi_input']['name']) != '') {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			$this->event_model->delete_event_materi($id_event);
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
									'target_sasaran'					=> $inputSasaranTarget,
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

			
			$this->event_model->delete_event_list_peserta($id_event);

			$inputIdSdm					= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdSdm')));
			$inputNikPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNikPeserta')));
			$inputNamaPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNamaPeserta')));
			$inputPosisiPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputPosisiPeserta')));

			$temp =count($inputIdSdm);
			for($i=0; $i<$temp;$i++){
  				$data_array = array(
  								'id_event'			=> $id_event,
								'idsdm'				=> $inputIdSdm[$i],
								'nik'				=> $inputNikPeserta[$i],
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

	
	
	public function list_approval_atasan()
	{
		//$this->is_logged();
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/event/include/index-script', NULL, TRUE);
        //$data['load_event']		= $this->event_model->select_event_submitted();
		$data['load_event']		= $this->event_model->select_event_status('submitted');
		
        //Load page
		$this->template->view('page/event/index-atasan',$data);
	}

	public function approval_atasan()
	{
	    //$this->is_logged();
        //Set Head Content
        $id 			= $this->uri->segment(3);
		$head['title'] 	= 'Approval Event - Event Management System' ;
		$head['css']	=  $this->load->view('page/event/include/app-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/app-script', NULL, TRUE);
        $data['load_list_peserta'] 		= $this->event_model->get_list_peserta($id);
        //data['load_exam'] 				= $this->get_exam();
        //Load page
		$this->template->view('page/event/approval-atasan',$data);
	}
	
	public function proccess_approval_atasan()
	{
		//No data -> redirected to page list approval atasan
		if(count($_POST) == 0){
			redirect('pengajuan-event', 'list-approval-atasan');
		}
		else{
		//Default value is OK. If validations fail result will change to NG.
		
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$id_event 			= $this->security->xss_clean(strip_image_tags($this->input->post('idevent')));
		$id_event_approval	= $id_event.'ap-'.'1';
		$catatan			= $this->security->xss_clean(strip_image_tags($this->input->post('catatan')));
		$persetujuan		= $this->security->xss_clean(strip_image_tags($this->input->post('persetujuan')));
		if($persetujuan=='approved') $e_status = 'approved_atasan';
		else $e_status = 'rejected_atasan';
		$id_user			= $this->session->userdata('sess_user_id');

		//Insert Data to table event
		$data_approval	= array(
								'id_approval'			=> $id_event_approval,
								'id_event'				=> $id_event,
								'tingkat_approval'		=> 'atasan',
								'rab_disetujui'			=> NULL,
								'persetujuan'			=> $persetujuan,
								'catatan'				=> $catatan,
								'is_active' 			=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
							);
		$this->event_model->insert_approval_event($data_approval);
        
		//Update table master event
		$update_status	= array(
								'status_event'			=> $e_status,
								'modified_date'			=> date('Y-m-d H:i:s'),
								'modified_by'			=> $id_user
								);
		$this->event_model->update_status_event($update_status,$id_event);
		
		//Get Memo
		$id 		= $id_event;
		$test 		= $this->event_model->select_event_submitted_test($id);
		if($test->num_rows() > 0){
			$data 			= $test->result_array();

			//init data
			$nomor_memo 	= $data[0]['nomor_memo'];
			$nama_event		= $data[0]['nama_event'];

			//Insert Log
			$activities = 'Proses Approval Event '.$nama_event.' dengan no.memo';
			$itemid		= $nomor_memo;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		}
		echo json_encode($output);
		exit;
		}
	}

	public function list_approval_pusat()
	{
		//$this->is_logged();
		$head['title'] 			= 'Tipe Exam - Event Management System' ;
		$head['css']			=  $this->load->view('page/event/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/event/include/index-script', NULL, TRUE);
		$data['load_event']		= $this->event_model->select_event_status('approved_atasan');
		
        //Load page
		$this->template->view('page/event/index-pusat',$data);
	}

	public function approval_pusat()
	{
	    //$this->is_logged();
        //Set Head Content
        $id 			= $this->uri->segment(3);
		$head['title'] 	= 'Approval Event - Event Management System' ;
		$head['css']	=  $this->load->view('page/event/include/app-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     			= $this->load->view('page/event/include/app-script', NULL, TRUE);
        $data['load_list_peserta'] 		= $this->event_model->get_list_peserta($id);
        $data['load_exam'] 				= $this->get_exam();
		
		//Get catatan oleh atasan 
		$sql_cat = $this->event_model->select_event_approval_tingkat($id, 'atasan');
		if($sql_cat->num_rows() > 0){
			$cat = $sql_cat->result_array();
			$data['catatan_atasan'] = $cat[0]['catatan'];
		}
		else
		{
			$data['catatan_atasan'] = '';
		}
		
        //Load page
		$this->template->view('page/event/approval-pusat',$data);
	}

	public function proccess_approval_pusat()
	{
		//No data -> redirected to page adding trainer eksternal
		if(count($_POST) == 0){
			redirect('pengajuan-event', 'list-approval-pusat');
		}
		else{
		//Default value is OK. If validations fail result will change to NG.
		
		
		//Get Data
		$id_event 			= $this->security->xss_clean(strip_image_tags($this->input->post('idevent')));
		$id_event_approval	= $id_event.'ap-'.'2';
		$rab_disetujui		= replace_currency($this->security->xss_clean(strip_image_tags($this->input->post('inputRAB'))));
		$catatan			= $this->security->xss_clean(strip_image_tags($this->input->post('catatan')));
		$persetujuan		= $this->security->xss_clean(strip_image_tags($this->input->post('persetujuan')));
		if($persetujuan=='approved') $e_status = 'approved_pusat';
		else $e_status = 'rejected_pusat';
		$id_user			= $this->session->userdata('sess_user_id');

		$output = array(
			'result'  	=> 'OK',
			'msg'		=> $_FILES['userfile']['name']
		);
		//Insert Data to table event
		$data_approval	= array(
								'id_approval'			=> $id_event_approval,
								'id_event'				=> $id_event,
								'tingkat_approval'		=> 'pusat',
								'rab_disetujui'			=> $rab_disetujui,
								'persetujuan'			=> $e_status,
								'catatan'				=> $catatan,
								'is_active' 			=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
							);
		$this->event_model->insert_approval_event($data_approval);
           
		//Insert Data Document if exists to table event filesize
		if (isset($_FILES['userfile']) != '') {
			//$file_ary = rearray_files($_FILES['files']);
			//$i = 0;
			//==== Upload Photo ====
			$config['upload_path'] 		= './assets/attachments/memo';
			$config['allowed_types'] 	= 'pdf|gif|jpg|jpeg|png';
			$config['max_size']    		= '2000';
			$config['overwrite'] 		= TRUE;

			$doc_u 		= str_replace(' ', '', $_FILES['userfile']['name']);
			$fileName 	= $id_event_approval.'_'.date('Ymd').'at'.date('His').'_'.$doc_u;
			$doc_user	= $fileName;

			$config['file_name'] = $fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload()) {
				$this->upload->data();
				
				//Insert to table event files
				$data_files = array(
								'id_event_approval'		=> $id_event_approval,
								'nama_file'				=> $this->upload->file_name,
								'jenis_file'			=> $this->upload->file_type,
								'is_active' 			=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
							);
				$this->event_model->insert_approval_event_files($data_files);
				
				$success = true;
			} else {
				$this->upload->display_error();
				$success = false;
			}
			
		}

		$update_status	= array(
								'status_event'			=> $e_status,
								'modified_date'			=> date('Y-m-d H:i:s'),
								'modified_by'			=> $id_user
								);
		$this->event_model->update_status_event($update_status,$id_event);
		$id 		= $id_event;
		$test 		= $this->event_model->select_event_submitted_test($id);
		if($test->num_rows() > 0){
			$data 			= $test->result_array();

			//init data
			$nomor_memo 	= $data[0]['nomor_memo'];
			$nama_event		= $data[0]['nama_event'];

			//Insert Log
			$activities = 'Proses Approval Event '.$nama_event.' dengan no.memo';
			$itemid		= $nomor_memo;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		}
		echo json_encode($output);
		exit;
		}
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
		$perihal 		= 'Usulan '.$data[0]['nama_event'].' '.$data[0]['target_sasaran'];
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

		$html 			 	= $this->load->view('memo-template', $data, true); // render the view into HTML
		$load_listpeserta 	= $this->load->view('memo-lampiranlistpeserta', $atu, true); // render the view into HTML 
		$load_rab		 	= $this->load->view('memo-rab', $data_rab, true); // render the view into HTML
		$load_pic		 	= $this->load->view('memo-listpic', $data_listpic, true); // render the view into HTML

		//load RAB

		$this->load->library('m_pdf');
		$param = '"","A4","","",0,0,100,0,6,3,"L"';
		$pdf = $this->m_pdf->load($param);
		$pdf->setAutoTopMargin = 'stretch'; // Set pdf top margin to stretch to avoid content overlapping
		$pdf->setAutoBottomMargin = 'stretch'; // Set pdf bottom margin to stretch to avoid content overlapping
		$pdf->setHTMLHeader('<img style="width: 120px;" src="'.base_url().'assets/images/logo-pnm.png">');
		$pdf->SetFooter($perihal.'|{PAGENO}|'.$nomor_memo); // Add a footer for good measure 😉
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$pdf->AddPage();
		$pdf->WriteHTML($load_listpeserta);
		$pdf->AddPage();
		$pdf->WriteHTML($load_rab);
		$pdf->AddPage();
		$pdf->WriteHTML($load_pic);
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
		$status_event ="";

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
		$inputGrandTotal			= trim($this->security->xss_clean(strip_image_tags($this->input->post('grand_total'))));
		$inputIdTrainer				= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdTrainer')));
		$inputNamaPic				= $this->security->xss_clean(strip_image_tags($this->input->post('nama_pic')));
		$id_user					= $this->session->userdata('sess_user_id');
		
		if ($this->input->post('submit')) {
		    $status_event = 'submitted';
		}
		if ($this->input->post('draft')) {
		    $status_event = 'draft';
		}
		
		
		$randdate = strtotime(date('Y-m-d'));
		$randalnum = random_string('alnum', 10);
		$id_event = strtoupper($randalnum.$randdate);
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
		if($inputIdTrainer != '')
		{
			$inputPerusahaan		= $this->security->xss_clean(strip_image_tags($this->input->post('inputPerusahaan')));

			$temp =count($inputIdTrainer);
			for($i=0; $i<$temp;$i++){
  				$data_trainer = array(
								'id_event'				=> $id_event,
								'kategori_trainer'		=> $inputPerusahaan[$i],
								'id_kategori_trainer'	=> $inputIdTrainer[$i],
								'is_active'				=> 'active',
								'created_by' 			=> $id_user,
								'created_date' 			=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_trainer_event($data_trainer);
  			}
		}

		//check rundown
		if (isset($_FILES['rundown_input']['name']) != '') {
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
		if (isset($_FILES['materi_input']['name']) != '') {
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
											'id_event'							=> $id_event,
											'id_rab'							=> $id_rab,
											'total'								=> $total,
											'is_active' 						=> 'active',
											'created_by' 						=> $id_user,
											'created_date' 						=> date('Y-m-d H:i:s')
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
											'id_event'							=> $id_event,
											'id_rab'							=> $id_rab,
											'id_rab_parent'						=> $id_rab_parent,
											'jumlah'							=> $jumlah,
											'qty'								=> $qty,
											'unit_cost'							=> $unit_cost,
											'total'								=> $total,
											'is_active' 						=> 'active',
											'created_by' 						=> $id_user,
											'created_date' 						=> date('Y-m-d H:i:s')
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
									'id_tipe_pelatihan'					=> $inputTipePelatihan,
									'dengan_exam'						=> $inputDenganExam,
									'jumlah_peserta'					=> $inputJumlahPeserta,
									'uang_muka'							=> $uang_muka,
									'total_rab'							=> $total_rab,
									'status_event' 						=> $status_event,
									'is_active' 						=> 'active',
									'created_by' 						=> $id_user,
									'created_date' 						=> date('Y-m-d H:i:s')
								);

			$this->event_model->insert_event($data_insert_event);

			
			$inputIdSdm					= $this->security->xss_clean(strip_image_tags($this->input->post('inputIdSdm')));
			$inputNikPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNikPeserta')));
			$inputNamaPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputNamaPeserta')));
			$inputPosisiPeserta			= $this->security->xss_clean(strip_image_tags($this->input->post('inputPosisiPeserta')));

			$temp =count($inputIdSdm);
			for($i=0; $i<$temp;$i++){
  				$data_array = array(
								'id_event'			=> $id_event,
								'idsdm'				=> $inputIdSdm[$i],
								'nik'				=> $inputNikPeserta[$i],
								'nama'				=> $inputNamaPeserta[$i],
								'posisi'			=> $inputPosisiPeserta[$i],
								'is_active'			=> 'active',
								'created_by' 		=> $id_user,
								'created_date' 		=> date('Y-m-d H:i:s')
					);

  				$this->event_model->insert_peserta_event($data_array);
  			}

			
            //insert log
            $output = array(
				'result'  	=> 'OK',
				'msg'		=> 'event ok'
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
		//redirect('event');
		echo json_encode($output);
	}


	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();

		//==== Get Data ====
		$id_event			= $this->input->post('f-id-event');
		$nama_event			= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-event')));
		$id_user			= $this->session->userdata('sess_user_id'); 
		if($id_event != '') {
			//==== Delete Data ====
			$data_delete = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->event_model->delete_event($data_delete,$id_event);

			//insert log
            $activities ='Menghapus event';
			$itemid		= $nama_event;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('event');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('event');
		}
	}
    
   
}
