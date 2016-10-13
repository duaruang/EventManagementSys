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
		$head['css']		= $this->load->view('page/user_group/include/index-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
       //Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user_group/include/index-script', NULL, TRUE);
        $data['load_usergroup']	= $this->user_group_model->select_usergroup();
        
		$this->template->view('page/user_group/index',$data);
	}

	public function add()
	{
        //Set Head Content
		$head['title'] 		= 'User Group Administration - Event Management System V.1.0' ;
		$head['css']		= $this->load->view('page/user_group/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
		//Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user_group/include/add-script', NULL, TRUE);
        $data['load_usergroup']	= $this->user_group_model->select_usergroup();
        $data['load_system']	= $this->user_group_model->select_privilege_system();
        
		$this->template->view('page/user_group/add',$data);
	}

	public function process_add()
	{
        //No data -> redirected to page adding user group
		if(count($_POST) == 0){
			redirect('user-group/add', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$menu_active	= $this->security->xss_clean(strip_image_tags($this->input->post('id_menuactive')));
		$group_name		= $this->security->xss_clean(strip_image_tags($this->input->post('group_name')));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Insert: Master User Group
		$data_ug	= array(
						'definisi'		=> $group_name,
						'is_active'		=> $status,
						'created_by'	=> $id_user,
						'created_date'	=> date('Y-m-d H:i:s')
					);
		//Insert then return id_usergroup
		$id_usergroup = $this->user_group_model->insert_usergroup($data_ug);
		
		//Loop: data checkbox in active menu then insert to user group matrix
		foreach($menu_active as $ma)
		{
			//Set default data
			$data_ugm = array();
			$create	= 0;
			$read	= 0;
			$update	= 0;
			$delete	= 0;
			$login	= 0; 
			$current_menu = $this->security->xss_clean(strip_image_tags($this->input->post('checkbox_menu'.$ma)));
			
			//Get checkbox value
			if (is_array($current_menu) || is_object($current_menu)) //Check value whether empty or not, if empty->foreach won't loop the data then error
			{
				foreach($current_menu as $cm)
				{
					if($cm==1) $create = 1;
					elseif($cm==2) $read = 1;
					elseif($cm==3) $update = 1;
					elseif($cm==4) $delete = 1;
					elseif($cm==5) $login = 1;
				}
			}
			
			//Insert to user group matrix
			$data_ugm = array(
							'id_usergroup'	=> $id_usergroup,
							'id_menu'		=> $ma,
							'action_create'	=> $create,
							'action_read'	=> $read,
							'action_update'	=> $update,
							'action_delete'	=> $delete,
							'action_login'	=> $login
						);
			$this->user_group_model->insert_usergroup_matrix($data_ugm);
		}
		//EndLoop: data checkbox
		
		//Log user activities
		$activities ='Tambah User Group';
		$itemid		= $group_name;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}

	public function view()
	{
        //Get Data
		$id_usergroup = $this->uri->segment(3);
        
		//Set Head Content
		$head['title'] 		= 'View User Group Administration - Event Management System V.1.0' ;
		$head['css']		= $this->load->view('page/user_group/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
		//Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user_group/include/add-script', NULL, TRUE);
        
		//Set Content Data 
		$data['id_usergroup']	= $id_usergroup;
        $data['load_usergroup']	= $this->user_group_model->select_usergroup_id($id_usergroup);
        $data['load_system']	= $this->user_group_model->select_privilege_system();
		
		$this->template->view('page/user_group/view',$data);
	}

	public function edit()
	{
        //Get Data
		$id_usergroup = $this->uri->segment(3);
        
		//Set Head Content
		$head['title'] 		= 'User Group Administration - Event Management System V.1.0' ;
		$head['css']		= $this->load->view('page/user_group/include/add-css', NULL, TRUE);
		$this->load->view('include/head', $head, TRUE);
       
		//Set Spesific Javascript page
        $data['script'] 		= $this->load->view('page/user_group/include/add-script', NULL, TRUE);
        
		//Set Content Data 
		$data['id_usergroup']	= $id_usergroup;
        $data['load_usergroup']	= $this->user_group_model->select_usergroup_id($id_usergroup);
        $data['load_system']	= $this->user_group_model->select_privilege_system();
        
		$this->template->view('page/user_group/edit',$data);
	}

	public function process_edit()
	{
        //No data -> redirected to page adding user group
		if(count($_POST) == 0){
			redirect('user-group/edit', 'location');
		}
		//Default value is OK. If validations fail result will change to NG.
		$output = array(
			'result'  	=> 'OK',
			'msg'		=> ''
		);
		
		//Get Data
		$menu_active	= $this->security->xss_clean(strip_image_tags($this->input->post('id_menuactive')));
		$group_name		= $this->security->xss_clean(strip_image_tags($this->input->post('group_name')));
		$status			= $this->security->xss_clean(strip_image_tags($this->input->post('status')));
		$id_usergroup	= $this->security->xss_clean(strip_image_tags($this->input->post('hidden_idusergroup')));
		$id_user		= $this->session->userdata('sess_user_id');
		
		//Update: Master User Group
		$data_ug	= array(
						'definisi'		=> $group_name,
						'is_active'		=> $status,
						'modified_by'	=> $id_user,
						'modified_date'	=> date('Y-m-d H:i:s')
					);
		$this->user_group_model->update_usergroup($id_usergroup,$data_ug);
		
		//Loop: data checkbox in active menu then insert to user group matrix
		foreach($menu_active as $ma)
		{
			//Set default data
			$data_ugm = array();
			$create	= 0;
			$read	= 0;
			$update	= 0;
			$delete	= 0;
			$login	= 0; 
			$current_menu = $this->security->xss_clean(strip_image_tags($this->input->post('checkbox_menu'.$ma)));
			
			//Get checkbox value
			if (is_array($current_menu) || is_object($current_menu)) //Check value whether empty or not, if empty->foreach won't loop the data then error
			{
				foreach($current_menu as $cm)
				{
					if($cm==1) $create = 1;
					elseif($cm==2) $read = 1;
					elseif($cm==3) $update = 1;
					elseif($cm==4) $delete = 1;
					elseif($cm==5) $login = 1;
				}
			}
			
			//Check whether the data already exist in user group matrix
			$check_matrix = $this->user_group_model->select_privilege_group($id_usergroup,$ma);
			if($check_matrix->num_rows()>0) //Data exists
			{
				//Update to user group matrix
				$data_ugm = array(
								'action_create'	=> $create,
								'action_read'	=> $read,
								'action_update'	=> $update,
								'action_delete'	=> $delete,
								'action_login'	=> $login
							);
				$this->user_group_model->update_usergroup_matrix($id_usergroup,$ma,$data_ugm);
			}
			else 
			{
				//Insert new data to user group matrix
				$data_ugm = array(
								'id_usergroup'	=> $id_usergroup,
								'id_menu'		=> $ma,
								'action_create'	=> $create,
								'action_read'	=> $read,
								'action_update'	=> $update,
								'action_delete'	=> $delete,
								'action_login'	=> $login
							);
				$this->user_group_model->insert_usergroup_matrix($data_ugm);	
			}
		}
		//EndLoop: data checkbox
		
		//Log user activities
		$activities ='Edit User Group';
		$itemid		= $group_name;
		$this->insert_activities_user($activities,$itemid);
		
		//Set session flashdata
		$this->session->set_flashdata('message_success', 'Data telah berhasil disimpan.');
		
		echo json_encode($output);
		exit;
	}
	
	public function process_delete()
	{
		//Check user is logged or not
	    //$this->is_logged();
		
		//Get Data
		$id_usergroup = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-idusergroup'))); 
		$group_name   = $this->security->xss_clean(strip_image_tags($this->input->post('hidden-groupname')));
		$id_user	  = $this->session->userdata('sess_user_id');
		
		if($id_usergroup != '') {
			//Update Data is_active = disabled
			$data = array('is_active'=>'deleted','modified_by'=> $id_user,'modified_date'=> date('Y-m-d H:i:s'));
			$this->user_group_model->update_usergroup($id_usergroup,$data);
            
			//Log user activities
			$activities ='Edit User Group';
			$itemid		= $group_name;
			$this->insert_activities_user($activities,$itemid);
			
			//Set session flashdata
			$this->session->set_flashdata('message_success', 'Data telah berhasil dihapus.');
		} 
		else
		{
			//Set session flashdata
			$this->session->set_flashdata('message_error', 'Terjadi kesalahan, mohon ulangi kembali.');
		}
		
		redirect('user-group');
	}
}