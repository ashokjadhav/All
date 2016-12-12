<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Notifications Class 
 *
 * @author Ashok jadhav
 * @package CI_notifications
 * @subpackage Controller
 *
 */
class Notification extends CI_Controller {
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
		$this->load->helper('text');
		$this->load->model('noticeboard_model');
		
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
		$arrData['notices']=$this->noticeboard_model->get_allnoticeboard_details();
		
		$arrData['middle']='notification';
		$this->load->view('template',$arrData);
		
		
	}

	/**
     * readmore
     * 
     * Get remaining content of notice
     * @author Ashok Jadhav
	 * @access public
     * @param $id
     * @return void
     * 
     */
	public function readmore($id){	
		$arrData['descript'] = $this->noticeboard_model->readmorenotice($id);
		$word = reset($arrData['descript'][0]);
		echo json_encode($word);
		
	}


	
}

/* End of file notifications.php */
/* Location: ./application/controllers/notifications.php */