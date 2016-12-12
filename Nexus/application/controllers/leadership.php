<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Leadership Class 
 *
 * @author Ashok jadhav
 * @package CI_leadership
 * @subpackage Controller
 *
 */
class Leadership extends CI_Controller {
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
		$this->load->model('leadership_model');
		
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
	public function index(){	
		$arrData['tab']=$this->uri->segment(1);
	    $arrData['leaderdetails']=$this->leadership_model->get_leaders_details();
		$arrData['middle']='leadership';
		$this->load->view('template',$arrData);
	}
}

/* End of file leadership.php */
/* Location: ./application/controllers/leadership.php */