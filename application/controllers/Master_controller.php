<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_controller extends MY_Controller {

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
	public function cabang()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'Cabang - Event Management System' ;
		$head['css']			=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/master/include/index-script', NULL, TRUE);
        $data['load_cabang']	= $this->master_model->select_cabang();
        //Load page
		$this->template->view('page/master/cabang',$data);
	}

	public function divisi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Divisi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/divisi',$data);
	}

	public function trainer()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Trainer - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/trainer',$data);
	}

	public function tipe_pelatihan()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Tipe Pelatihan - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/tipe_pelatihan',$data);
	}

	public function klasifikasi_materi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Klasifikasi Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/klasifikasi_materi',$data);
	}

	public function materi()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/materi',$data);
	}

	public function kategori_event()
	{
	    //$this->is_logged();
        //Set Head Content
		$head['title'] = 'Materi - Event Management System' ;
		$head['css']	=  $this->load->view('page/master/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/master/include/index-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/master/kategori_event',$data);
	}
    
   
}
