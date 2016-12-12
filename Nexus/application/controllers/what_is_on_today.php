<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * What_is_on_today Class 
 *
 * @author Ashok jadhav
 * @package CI_what_is_on_today
 * @subpackage Controller
 *
 */
class What_is_on_today extends CI_Controller {
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
		$this->load->model('what_is_on_today_model');
		
	}
	/**
     * index
     * 
     * Display Events Details
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	$arrData['tab']=$this->uri->segment(1);
		$arrData['allevents']=$this->what_is_on_today_model->get_all_details();
		$arrData['middle']='what-is-on-today';
		$this->load->view('template',$arrData);
		
		
	}
}

/* End of file what_is_on_today.php */
/* Location: ./application/controllers/what_is_on_today.php */