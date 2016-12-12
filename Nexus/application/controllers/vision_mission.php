<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Vision_mission Class 
 *
 * @author Ketan Sangani
 * @package CI_vision_mission
 * @subpackage Controller
 *
 */
class Vision_mission extends CI_Controller {
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
		$this->load->model('admin/vision_mission_model');
	}
	/**
     * index
     * 
     * Display Vission Mission 
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index(){	
		$arrData['tab']=$this->uri->segment(1);
		$arrData['video'] = $this->vision_mission_model->get_single_videos_details();
		$arrData['middle']='vision-and-mission';
		$this->load->view('template',$arrData);
		
		
	}
}

/* End of file vission_mission.php */
/* Location: ./application/controllers/vission_mission.php */