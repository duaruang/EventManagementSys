<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends MY_Controller {

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
	    //Check user is logged or not
	    $this->is_logged();
		
        //Set Head Content
		$head['title'] 			= 'List Feedback - Event Management System' ;
		$head['css']			=  $this->load->view('page/feedback/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']    		= $this->load->view('page/feedback/include/index-script', NULL, TRUE);
		
		//Set Data
        $data['load_feedback']	= $this->feedback_model->select_feedback();
		
        //Load page
		$this->template->view('page/feedback/index',$data);
	}

	public function send()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
        //Set Head Content
		$head['title'] 			= 'Kirim Feedback - Event Management System' ;
		$head['css']			= $this->load->view('page/feedback/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
		//Set Data
        $data['load_event']		= $this->feedback_model->select_event();
		
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/feedback/include/add-script', NULL, TRUE);
        
        //Load page
		$this->template->view('page/feedback/send',$data);
	}
	
	public function load_participant()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		$id_event = $this->security->xss_clean(strip_image_tags($this->input->post('idevent')));
		$load_participant = $this->feedback_model->select_peserta_registrasi($id_event);
		
		$rows = array();
		foreach($load_participant->result() as $r){
			$rows[] = $r;
		}
		
		echo json_encode($rows);
		exit;
	}

	public function process_send()
	{
		//No data -> redirected to page sending feedback
		if(count($_POST) == 0){
			redirect('kirim-feedback', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$idevent		= $this->security->xss_clean(strip_image_tags($this->input->post('event')));
		$url			= $this->security->xss_clean(strip_image_tags($this->input->post('url')));
		$participant	= $this->security->xss_clean(strip_image_tags($this->input->post('my_multi_select1')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Get Data Event
		$event = $this->feedback_model->select_event_id($idevent);
		$nama_event = '';
		if($event->num_rows() > 0)
		{
			$ev = $event->result_array();
			$nama_event = $ev[0]['nama_event'];
		}
		
		//Insert Data to table feedback
		$data_f		= array(
							'id_event'				=> $idevent,
							'url_feedback'			=> $url,
							'is_active' 			=> 'active',
							'created_by' 			=> '',//$id_user,
							'created_date' 			=> date('Y-m-d H:i:s')
						);
		$id_feedback = $this->feedback_model->insert_feedback($data_f);
		
		//Get Data Email Template
		$template = $this->feedback_model->select_email_template('temp_feedback');
		
		//Get Data Email Settings
		$email_address 	= $this->feedback_model->select_settings('email_from_address')->result_array();
		$email_desc 	= $this->feedback_model->select_settings('email_from_description')->result_array();
			
		foreach($participant as $idsdm)
		{
			//Get participant detail data 
			$sql_ptp = $this->feedback_model->select_participant($idevent,$idsdm);
			if($sql_ptp->num_rows() > 0)
			{
				$ptp = $sql_ptp->result_array();
				
				if(!empty($ptp[0]['email'])){
					//Get Recipient Email Address
					$to  = $ptp[0]['email'];
					$status = '';
					
					if($template->num_rows()>0)
					{
						$temp = $template->result_array();
						
						//Send Email Feedback to Participant
						$this->load->library('email', array('mailtype'=>'html'));      
						$this->email->clear();

						//Set Data Email
						$body	 	= $temp[0]['email_body'];
						$fullname	= $ptp[0]['nama'];
						$arr_from	= array('{event}', '{fullname}', '{url}');
						$arr_to		= array($nama_event, $fullname, $url);
						$email_body	= str_replace($arr_from,$arr_to,$body);
						$data['email_body'] = $email_body;
						$data['title'] 		= $temp[0]['judul'];
						
						$this->email->from($email_address[0]['konten'],$email_desc[0]['konten']);
						$this->email->to($to);      
						$this->email->subject($temp[0]['email_subject']);
						$message= $this->load->view('email/feedback_template',$data,TRUE);
						$this->email->message($message);            
						$success = $this->email->send();
						
						if($success) $status = 'success';
						else $status = 'failed';
						
						//Insert Data to Feedback Detail
						$data_p		= array(
										'id_feedback'			=> $id_feedback,
										'idsdm'					=> $idsdm,
										'nip' 					=> $ptp[0]['nip'],
										'nama' 					=> $ptp[0]['nama'],
										'email' 				=> $ptp[0]['email'],
										'status' 				=> $status,
										'sent_datetime' 		=> date('Y-m-d H:i:s')
									);
						$this->feedback_model->insert_feedback_detail($data_p);
					}
				}
			}
		}
		
		//Insert Log
		$activities = 'Kirim Feedback Event';
		$itemid		= $nama_event;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Email telah berhasil dikirim.');
		
		echo json_encode($output);
		exit;
	}

	public function view()
	{
	    //Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id_feedback = $this->uri->segment(3);
		
        //Set Head Content
		$head['title'] 			= 'View List Feedback - Event Management System' ;
		$head['css']			=  $this->load->view('page/feedback/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/feedback/include/add-script', NULL, TRUE);
        
		//Set Data 	
		$load_feedback			= $this->feedback_model->select_feedback_detail($id_feedback);
		$data['load_feedback']	= $load_feedback;
		
        //Load page
		if($load_feedback->num_rows() > 0) $this->template->view('page/feedback/view',$data);
		else show_404();
	}

	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();
		
		//Get Data
		$id_feedback = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idfeedback'))); 
		$event_name	 = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-eventname'))); 
		$id_user	 = $this->session->userdata('sess_user_id');
		
		if($id_feedback != '') {
			//Update Data table Kategori RAB -> is_active = deleted, delete parent
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->feedback_model->update_feedback($id_feedback,$data);
			
			//insert log
			$activities = 'Hapus feedback Event';
			$itemid		= $event_name;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('list-feedback');
	}
}