<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Job_openings Class 
 *
 * @author Ashok jadhav
 * @package CI_job_openings
 * @subpackage Controller
 *
 */
class Job_openings extends CI_Controller {
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
		$this->load->model('jobopenings_model');
		
	}
	
	/**
     * index
     * 
     * Displays current Job openings
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index(){	
		$arrData['tab']=$this->uri->segment(3);
		$arrData['jobopenings']=$this->jobopenings_model->get_jobopenings_details();
		$arrData['middle']='job_openings';
		$this->load->view('template',$arrData);
	}
}

/* End of file job_openings.php */
/* Location: ./application/controllers/job_openings.php */