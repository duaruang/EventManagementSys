<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserGroup_controller extends MY_Controller {

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
	
    //Function: table user group
	public function index()
	{
        //Set Head Content
		$head['title'] 		= 'User Group Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user_group/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] 	= $this->load->view('page/user_group/include/index-script', NULL, TRUE);
        $data['load_usergroup']	= $this->user_group_model->select_usergroup();
        
		$this->template->view('page/user_group/index',$data);
	}

	public function add()
	{
        //Set Head Content
		$head['title'] 		= 'User Group Administration - Event Management System V.1.0' ;
		$head['css']		=  $this->load->view('page/user_group/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] 	= $this->load->view('page/user_group/include/add-script', NULL, TRUE);
        $data['load_usergroup']	= $this->user_group_model->select_usergroup();
        
		$this->template->view('page/user_group/add',$data);
	}
}