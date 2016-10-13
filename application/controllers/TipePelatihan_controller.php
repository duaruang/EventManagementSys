<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipePelatihan_controller extends MY_Controller {

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
        //Set Head Content
		$head['title'] 			= 'Tipe Pelatihan - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_pelatihan/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        
        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_pelatihan/include/index-script', NULL, TRUE);
        $data['load_tipe_pelatihan']		= $this->tipe_pelatihan_model->select_tipe_pelatihan();
        //Load page
		$this->template->view('page/tipe_pelatihan/index',$data);
	}

	public function add()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'tipe pelatihan - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_pelatihan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_pelatihan/include/add-script', NULL, TRUE);
        //Load page
		$this->template->view('page/tipe_pelatihan/add',$data);
	}

	public function edit()
	{
		//$this->is_logged();
        //Set Head Content
		$head['title'] 			= 'tipe pelatihan - Event Management System' ;
		$head['css']			=  $this->load->view('page/tipe_pelatihan/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
        $id = $this->uri->segment(3);

        //Set Spesific Javascript page
        $data['script']     	= $this->load->view('page/tipe_pelatihan/include/add-script', NULL, TRUE);
        $data['load_tipe_pelatihan']	= $this->tipe_pelatihan_model->select_id_tipe_pelatihan($id);
        //Load page
		$this->template->view('page/tipe_pelatihan/edit',$data);
	}

	public function process_add()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$tipe_pelatihan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('tipe_pelatihan'))));
		$inisial_pelatihan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('inisial_pelatihan'))));
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$status_tipepelatihan		= $this->security->xss_clean(strip_image_tags($this->input->post('status_tipepelatihan')));
		$id_user			= $this->session->userdata('sess_user_nik');
		
		//==== Check Data ====
		$sql_cab= $this->tipe_pelatihan_model->check_tipe_pelatihan($tipe_pelatihan);
		
		if($sql_cab->num_rows() == 0) {
			//==== Insert Data ====
			$data_insert	= array(
									'tipe_pelatihan'		=> $tipe_pelatihan,
									'inisial_pelatihan'		=> $inisial_pelatihan,
									'deskripsi'				=> $deskripsi,
									'is_active' 			=> $status_tipepelatihan,
									'created_by' 			=> $id_user,
									'created_date' 			=> date('Y-m-d H:i:s')
								);

			$this->tipe_pelatihan_model->insert_tipe_pelatihan($data_insert);
            
            //insert log
            $activities ='Tambah Tipe Pelatihan';
			$itemid		= $tipe_pelatihan;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		} 
		else //already exists
		{  
			$output = array(
				'result'  	=> 'NG',
				'msg'		=> 'Nama tipe pelatihan sudah ada, gunakan nama tipe pelatihan yang lain.'
			);
			
			//Set session flashdata
			//$this->session->set_flashdata('message_error', 'Nama tipe pelatihan sudah ada, gunakan nama tipe pelatihan yang lain.');
		}
		
		echo json_encode($output);
		exit;
	}

	public function process_edit()
	{
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		//==== Get Data ====
		$tipe_pelatihan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('tipe_pelatihan'))));
		$inisial_pelatihan		= trim($this->security->xss_clean(strip_image_tags($this->input->post('inisial_pelatihan'))));
		$deskripsi		= trim($this->security->xss_clean(strip_image_tags($this->input->post('deskripsi'))));
		$status_tipepelatihan		= $this->security->xss_clean(strip_image_tags($this->input->post('status_tipepelatihan')));
		$id_user			= $this->session->userdata('sess_user_nik');
		$id					= trim($this->security->xss_clean(strip_image_tags($this->input->post('idtipepelatihan'))));
		
		
			//==== Insert Data ====
			$data_insert	= array(
									'tipe_pelatihan'		=> $tipe_pelatihan,
									'inisial_pelatihan'		=> $inisial_pelatihan,
									'deskripsi'				=> $deskripsi,
									'is_active' 			=> $status_tipepelatihan,
									'modified_by' 			=> $id_user,
									'modified_date' 		=> date('Y-m-d H:i:s')
								);

			$this->tipe_pelatihan_model->update_tipe_pelatihan($data_insert,$id);
            
            //insert log
            $activities ='Edit tipe pelatihan';
			$itemid		= $tipe_pelatihan;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		
		echo json_encode($output);
		exit;
	}

	public function process_delete()
	{
		//Check user is logged or not
	    $this->is_logged();

		//==== Get Data ====
		$id		= $this->input->post('f-id-tipepelatihan');
		$nama_tipe_pelatihan		= $this->security->xss_clean(strip_image_tags($this->input->post('f-nama-tipepelatihan')));
		$id_user			= $this->session->userdata('sess_user_nik'); 
		if($id != '') {
			//==== Delete Data ====
			$data_insert = array(
						'is_active' 			=> 'deleted',
						'modified_by' 			=> $id_user,
						'modified_date' 		=> date('Y-m-d H:i:s')			
					);	
			$this->tipe_pelatihan_model->delete_tipe_pelatihan($data_insert,$id);

			//insert log
            $activities ='Menghapus tipe_pelatihan';
			$itemid		= $nama_tipe_pelatihan;
			$this->insert_activities_user($activities,$itemid);

			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
			redirect('tipe-pelatihan');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'errorrrr');
			redirect('tipe-pelatihan');
		}
	}
}