<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Quicklinks Class 
 *
 * @author Ketan Sangani
 * @package CI_quicklinks
 * @subpackage Controller
 *
 */
class Quicklinks extends CI_Controller {
	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Ketan Sangani
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
     * Display Quicklinks page
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='quicklinks';
		$this->load->view('template',$arrData);
		
		
	}
}

/* End of file quicklinks.php */
/* Location: ./application/controllers/quicklinks.php */