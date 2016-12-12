<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * About_us Class 
 *
 * @author Ashok Jadhav
 * @package CI_about_us
 * @subpackage Controller
 *
 */
class About_us extends CI_Controller {
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

		$this->load->model('admin/history_milestones_model');
		
	}
	/**
     * index
     * 
     * displays index page of about_us
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	$arrData['tab']=$this->uri->segment(1);
        $arrData['hist_milestone'] = $this->history_milestones_model->allMilestones();
		$arrData['middle']='about_us';
		$this->load->view('template',$arrData);
		
		
	}
}

/* End of file about_us.php */
/* Location: ./application/controllers/about_us.php */