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
        $data['load_kategori_tempat'] = $this->kategori_tempat_model->select_kategori_tempat_active();
        $data['load_kategori_event'] = $this->kategori_event_model->select_kategori_event_active();
        $data['load_tipe_exam'] = $this->tipe_exam_model->select_tipe_exam_active();
        $data['load_exam'] = $this->get_exam();
        //Load page
		$this->template->view('page/event/propose',$data);
	}

	public function get_exam()
	{

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
    
   
}
