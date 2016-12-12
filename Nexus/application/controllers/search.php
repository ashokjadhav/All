<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Search Class
 *
 * @author Ashok jadhav
 * @package CI_Search
 * @subpackage Controller
 *
 */
class Search extends CI_Controller {
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
		$this->load->model('search_model');

	}
	/**
     * index
     *
     * Display Search Results
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$post_search=$this->input->post('search');
		if($post_search!=''){
			$ses_user = array("search"=>'');
			$ses_user = array("search"=>$post_search);
			$this->session->set_userdata($ses_user);
		}
		$search=$this->session->userdata('search');
		$config = array();
        $config["base_url"] = base_url() . "search/index/".$search.'/';
        $config["total_rows"] =count($this->search_model->record_count($search));
		$config["per_page"] = 10;
        $config["uri_segment"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$arrData['searchresult']=$this->search_model->get_all_new_joinee_details($search,($page-1)*$config["per_page"],$config["per_page"]);
		$arrData['total']=$this->search_model->record_count($search);
		$arrData['key'] = $search;
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='search_result';
		$this->load->view('template',$arrData);


	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */