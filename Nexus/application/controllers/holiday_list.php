<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Holiday_list Class 
 *
 * @author Ketan Sangani
 * @package CI_holiday_list
 * @subpackage Controller
 *
 */
class Holiday_list extends CI_Controller {
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
		$this->load->model('holiday_list_model');
	}
	
	/**
     * index
     * 
     * Displays Holiday List Of This Year
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index(){	
		$arrData['tab']=$this->uri->segment(1);
		$arrData['mumbai_holiday']=$this->holiday_list_model->get_mumbai_holidays();
		$arrData['cochin_holiday']=$this->holiday_list_model->get_cochin_holidays();
		$arrData['middle']='holiday_list';
		$this->load->view('template',$arrData);
	}
	
}

/* End of file holiday_list.php */
/* Location: ./application/controllers/holiday_list.php */