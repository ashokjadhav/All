<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Birthday Class 
 *
 * @author Ashok jadhav
 * @package Controller
 * @subpackage none
 *
 */

class Birthday extends CI_Controller {
	/**
     * construct
     * 
     * constructor method
     * @author Ashok jadhav
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
		$this->load->model('birthday_model');
		
	}
	
	/**
     * index
     * 
     * Displays users as per birthdate
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url() . "birthday/index/";
        $config["total_rows"] =count($this->birthday_model->record_count());
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['birthdays']=$this->birthday_model->get_allbirthday_details(($page-1)*$config["per_page"],$config["per_page"]);
		if($page==1){
			$arrData['todaybirthdays']=$this->birthday_model->get_todaybirthday_details();
		}
        $arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='birthday';
		$this->load->view('template',$arrData);
	}
}

/* End of file birthday.php */
/* Location: ./application/controllers/birthday.php */