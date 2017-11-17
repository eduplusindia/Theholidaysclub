<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Leads extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_Leads');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
		$data['content'] = $this->member_Leads->leadList();
		$this->global ['pageTitle'] = 'TheHolidaysClubs : Leads';
		$this->loadViews("leads", $this->global, $data, NULL);
    }
	public function leadEditpage($leadId)
    {
		$data['result'] = $this->member_Leads->singleLead($leadId);
		$this->global ['pageTitle'] = 'TheHolidaysClubs : Leads';
		$this->loadViews("leadEditpage", $this->global, $data, NULL);
    }
	public function editLead()
    {
	
		$title = $this->input->post('title');
        $content = $this->input->post('description');
		$id = $this->input->post('id');
	
		 $leadInfo = array('title'=>$title, 'content'=>$content);
		$result = $this->member_Leads->editLead($id, $leadInfo);
		
		if($result > 0)
		{
			$this->session->set_flashdata('success', 'New Lead created successfully'); 
			redirect('leads');
			exit;			
		}
		else
		{
			$this->session->set_flashdata('error', 'User creation failed');
			redirect('addLead');
			die;			
		}
              
        $this->session->set_flashdata('error', 'User creation failed');
		redirect('addLead');
		die;
		/* $this->global ['pageTitle'] = 'TheHolidaysClubs : AddLeads';
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'addLead' );
		$this->load->view ( 'includes/footer' ); */
    }
	public function addNewLead()
    {
	
		$title = $this->input->post('title');
        $content = $this->input->post('description');
		$leadInfo = array('title'=>$title, 'content'=>$content, 'createDate'=>date('Y-m-d H:i:s'));
             
		$this->load->model('member_Leads');
		$result = $this->member_Leads->addNewLead($leadInfo);
		
		if($result > 0)
		{
			$this->session->set_flashdata('success', 'New Lead created successfully'); 
			redirect('leads');
			exit;			
		}
		else
		{
			$this->session->set_flashdata('error', 'User creation failed');
			redirect('addLead');
			die;			
		}
              
        $this->session->set_flashdata('error', 'User creation failed');
		redirect('addLead');
		die;
		/* $this->global ['pageTitle'] = 'TheHolidaysClubs : AddLeads';
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'addLead' );
		$this->load->view ( 'includes/footer' ); */
    }
    public function addLead()
    {
		
		$this->global ['pageTitle'] = 'TheHolidaysClubs : AddLeads';
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'addLead' );
		$this->load->view ( 'includes/footer' );
    }
	
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'TheHolidaysClubs : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>