<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Library Class
 *
 * @author Ashok jadhav
 * @package CI_library
 * @subpackage Controller
 *
 */
class Library extends CI_Controller {
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
		$this->load->model('library_model');
	}


	/**
     * index
     *
     * Display List Of Libraray Materials
     * @author Ashok Jadhav
	 * @access public
     * @param $category
     * @return void
     *
     */
	public function index($category=null){
		$post_search=$this->input->post('search');
		if($post_search!=''){
			$ses_user = array("search"=>'');
			$ses_user = array("search"=>$post_search);
			$this->session->set_userdata($ses_user);
			$search=$this->session->userdata('search');
		}
		else{
			$search='';
		}
		$userid=$this->session->userdata('site_userid');
		$arrData['tab']=$this->uri->segment(1);
		$arrData['categories']=$this->library_model->get_category_details();
		$c=false;
	    foreach($arrData['categories'] as $a=>$b){
			if($b['name']==$this->uri->segment(3))
				$c=true;
		}
		if($c){
			 $arrData['categoryitems']= $this->library_model->get_categoryitems($this->uri->segment(3));
			 
		}
		else{
			$arrData['categoryitems']='';
		}
		foreach($arrData['categories'] as $key=>$items){
			$arrData['categories'][$key]['subcat']= $this->library_model->get_subcategory($items['name']);
			$subcat=$arrData['categories'][$key]['subcat'];
			if($search!=''){
				$arrData['categories'][$key]['cat']=$this->library_model->get_items($category,$items['name'],$subcat,$search);
			}else{
				$arrData['categories'][$key]['cat']=$this->library_model->get_items($category,$items['name'],$subcat);
			}
			foreach($arrData['categories'][$key]['cat'] as $k=>$v){
				$arrData['status'] = $this->library_model->get_status($v['id'],$items['name'],$userid);
			}

		 }
		 
		$arrData['middle']='library';
		$this->load->view('template',$arrData);
	}

	/**
     * hirenow
     *
     * This function help to hire or book the items from library
     * @author Ketan Sangani
	 * @access public
     * @param $iresourceid,$category,$userid
     * @return void
     *
     */
	public function hirenow($iresourceid,$category,$userid){
		$date = date("Y-m-d H:i:s");
		$arrData['category']=$category;
		$arrData['resource_id']=$iresourceid;
		$arrData['user_id']= $userid;
		$arrData['borrow_status']= 'request';
		$arrData['dos']= '';
		$arrData['due_date']= '';
		$arrData["created_date"] = $date;
        $arrData["modified_date"] = $date;
		$data['borrow'] = $this->library_model->get_status($iresourceid,$category,$userid);
		//var_dump($data['borrow']);exit;
		if($data['borrow']==''){
			$inflag = $this->library_model->request_status($iresourceid,$category);
			//var_dump($inflag);exit;
			$insertFlag = $this->library_model->hire($arrData);
			if($insertFlag || $inflag){
				$this->session->set_flashdata('success', 'Your Request for library resource goes to librarian..!!');
              redirect('library','refresh');

			}
		}
		redirect('library','refresh');
	}

	/**
     * Search
     *
     * This Help to search items from library
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function search(){
		$post_search=$this->input->post('search');
		if($post_search!=''){
			$ses_user = array("search"=>'');
			$ses_user = array("search"=>$post_search);
			$this->session->set_userdata($ses_user);
		}
		$search=$this->session->userdata('search');
		$arrData['categories']=$this->library_model->get_category_details();
		foreach($arrData['categories'] as  $key=>$items){
			$table = $items['name'];

			$config = array();
			$config["base_url"] = base_url() . "library/search/".$search.'/';
			$config["total_rows"] =count($this->library_model->record_count($items['name'],$search));
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
			$arrData['searchresult']=$this->library_model->get_all_items_details($items['name'],$search,($page-1)*$config["per_page"],$config["per_page"]);
			$arrData['total']=$this->library_model->record_count($items['name'],$search);
			$arrData["links"] = $this->pagination->create_links();

		}
		$arrData['tab']=$this->uri->segment(1);
		$arrData['middle']='search_result';
		$this->load->view('template',$arrData);


	}


}

/* End of file library.php */
/* Location: ./application/controllers/library.php */
?>