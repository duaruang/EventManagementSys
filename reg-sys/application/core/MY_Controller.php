<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed.');

class MY_Controller extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->output->set_header("Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT"); 
        $this->output->set_header("Expires: " . gmdate( "D, j M Y H:i:s", time() ) . " GMT"); 
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate"); 
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", FALSE); 
        $this->output->set_header("Pragma: no-cache"); 
     
		date_default_timezone_set("Asia/Jakarta");
		
		//Load Menubar: Main System
		$data_global					= array();
		$data_global['load_menubar'] 	= $this->menu_model->select_menubar();
		$this->load->vars($data_global);
		
		//Load Audit Trail
        $head['load_trail']     =  $this->user_model->select_audit_trail_individual();
        $this->load->view('include/right-sidebar', $head, TRUE);
    }
	
	public function is_logged()
    {
        $url = "http://182.23.52.249/Dummy/SSO_WebService/login.php?source=".base_url()."check_user&app_code=EVENT";
        if ($this->session->userdata('logged_in') == FALSE) redirect($url);
    }
    
    public function insert_activities_user($activities,$itemid)
    {
        //==== Check Data ====
        $data = array(
                        'id_user'       => $this->session->userdata('sess_user_id'),
                        'description'   => $activities,
                        'item_id'       => $itemid,
                        'date'          => date('Y-m-d H:i:s'),
                        'ip_address'    => $this->input->ip_address()
                    );
                    
        $this->user_model->insert_activities_user($data);
    }
}