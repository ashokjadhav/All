<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Locations Class 
 *
 * @author Ashok jadhav
 * @package CI_locations
 * @subpackage Controller
 *
 */
class Locations extends CI_Controller {
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
		$this->load->model('location_model');
		
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
	public function index()
	{	$config = array();
        $config["base_url"] = base_url() . "locations/index/";
        $config["total_rows"] =count($this->location_model->record_count());
        $config["per_page"] = count($this->location_model->record_count());
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		
		$arrData['locations']=$this->location_model->get_alllocation_details(($page-1)*$config["per_page"],$config["per_page"]);
		
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		
		$arrData['middle']='locations';
		$this->load->view('template',$arrData);
		
		
	}
	public function search($key=null)
	{	
		$arrData['searchLocation']=$this->location_model->getSearchLoc($key);
		if(count($arrData['searchLocation']) > 0){
			$arrData['status'] = 1;
		}
		else{
			$arrData['status'] = 0;
		}	
		echo json_encode($arrData);
		
		
		
	}


}

/* End of file locations.php */
/* Location: ./application/controllers/locations.php */