<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Iconnect Class
 *
 * @author Ketan Sangani
 * @package CI_Iconnect
 * @subpackage Controller
 *
 */
class Iconnect extends CI_Controller {
	/**
     * construct
     *
     * constructor method
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	 //Global variable

	function __construct(){
		// Initialization of class
		parent::__construct();
		if($this->session->userdata('site_login') == FALSE) {
      		$this->session->set_flashdata('error', 'Please Login First!!');
      		redirect('site_login');
      		break;
		}
		$this->load->model('iconnect_model');
		$this->load->model('new_joinee_model');
	}
	
	/**
     * index
     *
     * Display List Of  Users with status(Online/Offline)
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$arrData['listOfUsers']	= $this->new_joinee_model->getUsers();
		$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='iconnect';
		$this->load->view('template',$arrData);
	}
}

/* End of file Iconnect.php */
/* Location: ./application/controllers/Iconnect.php */