<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Policies Class 
 *
 * @author Ashok jadhav
 * @package CI_policies
 * @subpackage Controller
 *
 */
class Policies extends CI_Controller {
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
		$this->load->model('policies_model');
		
		
	}
	/**
     * index
     * 
     * Display whole policies
     * @author Ashok Jadhav
	 * @access public
     * @param $category
     * @return void
     * 
     */
	public function index($category='')
	{	
		
		$config = array();
        $config["base_url"] = base_url() . "policies/index/";
        $config["total_rows"] =count($this->policies_model->record_count());
        $config["per_page"] =count($this->policies_model->record_count()) ;
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['policiesDetails']=$this->policies_model->get_policies_details(($page-1)*$config["per_page"],$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='policies';
		$this->load->view('template',$arrData);
		
	}
}

/* End of file policies.php */
/* Location: ./application/controllers/policies.php */