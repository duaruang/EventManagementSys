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
	public function propose()
	{
	    $this->is_logged();
        //Set Head Content
		$head['title'] = 'Propose Event - Event Management System' ;
		$head['css']	=  $this->load->view('page/event/include/propose-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     = $this->load->view('page/event/include/propose-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/event/propose',$data);
	}
    
   
}
