<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Utilities Class 
 *
 * @author Ashok jadhav
 * @package CI_utilities
 * @subpackage Controller
 *
 */
class Utilities extends CI_Controller {
	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Ashok Jadhav
	 * @access	public
	 * @return	void
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
		
		
	}
	/**
     * index
     * 
     * Display
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	
		$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='utilities';
		$this->load->view('template',$arrData);
		
	}
	
}

/* End of file utilities.php */
/* Location: ./application/controllers/utilities.php */