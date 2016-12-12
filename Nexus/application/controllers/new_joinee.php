<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * New_joinee Class 
 *
 * @author Ashok jadhav
 * @package CI_new_joinee
 * @subpackage Controller
 *
 */
class New_joinee extends CI_Controller {
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
		$this->load->model('new_joinee_model');
		$this->load->helper('text');
	}
	/**
     * index
     * 
     * Dispaly 
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index()
	{	$config = array();
        $config["base_url"] = base_url() . "new_joinee/index/";
        $config["total_rows"] = count($this->new_joinee_model->record_countnew());
        $config["per_page"] =20; //count($this->new_joinee_model->record_countall());
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
 
        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['new_joinees']=$this->new_joinee_model->get_new_joinee_details();
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='new_joinee';
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
		$arrData['descript'] = $this->new_joinee_model->readempDesc($id);
		$word = reset($arrData['descript'][0]);
		echo json_encode($word);
		
	}
}

/* End of file new_joinee.php */
/* Location: ./application/controllers/new_joinee.php */