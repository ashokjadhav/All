<?php 
/**
 * Settings Class 
 *
 * @author Ashok Jadhav
 * @package CI_Settings
 * @subpackage Controller
 *
 */
 

class Settings extends CI_Controller {

	/**
     * construct
     * 
     * constructor method (checks login status)
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('admin/settings_model');
		/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

	/**
   * index
   *
   * This help to display Password Change Panel
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
	public function index(){
	if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
	$arrData['tab']=$this->uri->segment(2);
	$arrData['middle'] = 'admin/change_psw';
    $this->load->view('admin/template', $arrData);
		
	}
 
  /**
     * psw_change
     *
     * This help to change the admin password
     * 
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
	function psw_change()
	{	
		if($_POST){
		$id=$this->input->post('id');
		$old_psw=md5($this->input->post('old_psw'));
		$pwd=$this->input->post('psw');
		$cn_psw=$this->input->post('cn_psw');
		if($pwd!=$cn_psw){
		$this->session->set_flashdata('error','New password and Confirmed password does not match,Please try again !!!');
		redirect('admin/settings');
		}else{
		$cn_password=md5($cn_psw);
		$insertedflag=$this->settings_model->set_password($id,$old_psw,$cn_password);
		if($insertedflag){
		$this->session->set_flashdata('success','Password Updated Successfully || Please Login');
		redirect('admin/login');
		//set success and redirect to login
		}else{
		$this->session->set_flashdata('error','You have entered wrong old password !!!');
		redirect('admin/settings');
		//
		}

		}
	}
	else{}
		
		
	}

	
	
	
}