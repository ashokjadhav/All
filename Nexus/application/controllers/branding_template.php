<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Ask_help Class 
 *
 * @author Ashok Jadhav
 * @package Controller
 * @subpackage none
 *
 */
class Branding_template extends CI_Controller {
	/**
     * construct
     * 
     * constructor method
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	function __construct()
	{
	// Initialization of class
		parent::__construct();
		if($this->session->userdata('site_login') == FALSE) {
      		$this->session->set_flashdata('error', 'Please Login First!!');
      		redirect('site_login');
      		break;
		}
		$this->load->model('branding_template_model');
	}

	/**
     * index
     * 
     * displays index page of Branding Template
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	$arrData['tab']=$this->uri->segment(1);
	    $arrData['brandings']=$this->branding_template_model->get_branding_details();
		$arrData['middle']='branding_template';
		$this->load->view('template',$arrData);
		
		
	}

	/**
     * download
     * 
     * Downloads the branding images on local machine
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function download($id) {
		//load the download helper
		
		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$arrData=$this->branding_template_model->get_branding_details($id);
		$data = file_get_contents("./files/".$arrData[0]['img']);
		
		//Read the file's contents
		$name = $arrData[0]['img'];

		//use this function to force the session/browser to download the file uploaded by the user 
		force_download($name, $data);
	}
}

/* End of file ask_help.php */
/* Location: ./application/controllers/ask_help.php */