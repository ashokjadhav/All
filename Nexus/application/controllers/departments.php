<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Departments Class
 *
 * @author Ketan Sangani
 * @package CI_departments
 * @subpackage Controller
 *
 */

class Departments extends CI_Controller {
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
		$this->load->model('department_model');

	}

	/**
     * index
     *
     * displays company listing
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index()
	{
		$config = array();
        $config["base_url"] = base_url() . "departments/index/";
        $config["total_rows"] =count($this->department_model->record_count());
        $config["per_page"] = count($this->department_model->record_count());
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['group_companies']=$this->department_model->get_company_details(($page-1)*$config["per_page"],$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['page']='index';
		$arrData['middle']='departments1';
		$this->load->view('template',$arrData);
	}

	/**
     * details
     *
     * displays Companies information with address and Contact details
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function details($id){
		$arrData['page']='details';
		$arrData['company'] = $this->department_model->get_all_details($id);
		$arrData['employees'] = $this->department_model->get_employees_details($id);
		$arrData['middle']='departments1';
		$this->load->view('template',$arrData);
	}
}

/* End of file departments.php */
/* Location: ./application/controllers/departments.php */