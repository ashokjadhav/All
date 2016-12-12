<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hr_help_desk extends CI_Controller {
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
		$this->load->model('hr_help_desk_model');
		$this->load->model('admin/company_location_model');
	}


	/**
     * index
     * 
     * displays links to group companies
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index($id=null){
		$config = array();
        $config["base_url"] = base_url() . "hr_help_desk/index/";
        $config["total_rows"] =count($this->hr_help_desk_model->record_count());
        $config["per_page"] = count($this->hr_help_desk_model->record_count());
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
	    $arrData['hr_help_details']=$this->hr_help_desk_model->get_hr_details($id,$config["per_page"],($page-1)*$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='hr_help_desk';
		$this->load->view('template',$arrData);
	}
}

/* End of file Hr_help_desk.php */
/* Location: ./application/controllers/Hr_help_desk.php */