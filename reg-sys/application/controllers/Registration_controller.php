<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_controller extends MY_Controller {

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
		
        /*
		//Set Head Content
		$head['title'] 			= 'Proses Registrasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/trainer/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/trainer/include/index-script', NULL, TRUE);
        $data['load_trainer']	= $this->trainer_model->select_trainer();
        //Load page
		$this->template->view('page/trainer/index',$data);
		*/
	}

	public function create()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Registrasi Event - Event Management System' ;
		$head['css']			=  $this->load->view('page/registration/include/create-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/registration/include/create-script', NULL, TRUE);
        $data['load_event']		= $this->registration_model->select_event();
        
        //Load page
		$this->template->view('page/registration/create',$data);
	}

	public function load_data()
	{
	    //Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  			=> 'OK',
			'msg'				=> '',
			'topik_event'		=> '',
			'no_memo'			=> '',
			'tanggal_start'		=> '',
			'tanggal_end'		=> '',
			'kategori_tempat'	=> '',
			'latitude'			=> '',
			'longitude'			=> '',
			'nama_tempat'		=> '',
			'target'			=> '',
			'kategori_event'	=> ''
		);
		
		//==== Get Data ====
		$id_event		= $this->security->xss_clean(strip_image_tags($this->input->post('idevent')));
		//$id_user		= $this->session->userdata('sess_user_id');
		
		//==== Load Data ====
		$sql_event = $this->registration_model->select_event_id($id_event);
		
		if($sql_event->num_rows() > 0) {
			$ev = $sql_event->result_array();
			
			$output = array(
				'result'  			=> 'OK',
				'msg'				=> '',
				'topik_event'		=> $ev[0]['topik_event'],
				'no_memo'			=> $ev[0]['nomor_memo'],
				'tanggal_start'		=> tgl_eng($ev[0]['mulai_tanggal_pelaksanaan']),
				'tanggal_end'		=> tgl_eng($ev[0]['selesai_tanggal_pelaksanaan']),
				'kategori_tempat'	=> $ev[0]['kategori_tempat'],
				'latitude'			=> $ev[0]['latitude'],
				'longitude'			=> $ev[0]['longitude'],
				'nama_tempat'		=> $ev[0]['nama_tempat'],
				'target'			=> $ev[0]['target_sasaran'],
				'kategori_event'	=> $ev[0]['kategori_event']
			);
		} 
		else 
		{  
			$output = array(
				'result'  			=> 'NG',
				'msg'				=> 'Terjadi kesalahan, mohon ulangi kembali.',
				'topik_event'		=> '',
				'no_memo'			=> '',
				'tanggal_start'		=> '',
				'tanggal_end'		=> '',
				'kategori_tempat'	=> '',
				'latitude'			=> '',
				'longitude'			=> '',
				'nama_tempat'		=> '',
				'target'			=> '',
				'kategori_event'	=> ''
			);
		}
		
		echo json_encode($output);
		exit;
	}
	
	public function registration_page()
	{
	    //$this->is_logged();
		
		//Get Data
		$id_event	= $this->uri->segment(2);
		
        //Set Head Content
		$head['title'] 		= 'Registrasi Event - Event Management System' ;
		$head['css']		=  $this->load->view('page/registration/include/page-css', NULL, TRUE);
		$event_name			= '';
		$sql_event			= $this->registration_model->select_event_id($id_event);
		if($sql_event->num_rows() > 0)
		{
			$ev = $sql_event->result_array();
			$event_name = $ev[0]['nama_event'];
		}
		$head['nama_event'] = $event_name;
		$this->load->view('include/header-registration-page', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/registration/include/page-script', NULL, TRUE);
        
        //Load page
		$this->load->view('page/registration/registration-page',$data);
		//$this->template->view('page/registration/create',$data);
	}
}