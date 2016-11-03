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
        $data['script']     	= $this->load->view('page/realisasi/include/index-script', NULL, TRUE);
        $data['load_event']		= $this->event_model->select_event();
        //Load page
		$this->template->view('page/event/index',$data);

	}

	public function propose_realisasi()
	{
		$this->is_logged();
		$head['title'] 			= 'Realisasi - Event Management System' ;
		$head['css']			=  $this->load->view('page/realisasi/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/realisasi/include/add-script', NULL, TRUE);
        $data['load_event']		= $this->event_model->select_event();
        //Load page
		$this->template->view('page/event/index',$data);

	}
}