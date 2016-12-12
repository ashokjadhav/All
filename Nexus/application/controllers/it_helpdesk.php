<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * It_helpdesk Class
 *
 * @author Ashok jadhav
 * @package CI_It_helpdesk
 * @subpackage Controller
 *
 */

class It_helpdesk extends CI_Controller {
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
		$this->load->model('it_help_desk_model');
		$this->load->model('admin/company_location_model');

	}

	/**
     * index
     *
     * Displays
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index($id=null)
	{	$config = array();
        $config["base_url"] = base_url() . "it_helpdesk/index/";
        $config["total_rows"] =count($this->it_help_desk_model->record_count());
        $config["per_page"] = count($this->it_help_desk_model->record_count());
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['company_location_details']=$this->company_location_model->get_company_location_details();
		$arrData['ithelpdetails']=$this->it_help_desk_model->get_it_details($id,$config["per_page"],($page-1)*$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='it_helpdesk';
		$this->load->view('template',$arrData);


	}
}

/* End of file it_helpdesk.php */
/* Location: ./application/controllers/it_helpdesk.php */