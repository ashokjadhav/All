<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Employee_directory Class 
 *
 * @author Ashok jadhav
 * @package CI_Employee_directory
 * @subpackage Controller
 *
 */

class Employee_directory extends CI_Controller {
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
	function __construct(){
		// Initialization of class
		parent::__construct();
		if($this->session->userdata('site_login') == FALSE) {
			$this->session->set_flashdata('error', 'Please Login First!!');
			redirect('site_login');
			break;
		}
		$this->load->model('new_joinee_model');
		$this->load->model('admin/company_location_model');
		
	}
	/**
     * index
     * 
     * Displays total Employees List(Mumbai/Kerala)
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index($param=null)
	{   
		if($param==''){
			$Q = $this->db->query("SELECT id FROM company_loc ORDER BY location_name LIMIT 1");
			$result = $Q->result();
			$param =$result[0]->id;
		}
		$config = array();
		$config["base_url"] = base_url() . "employee_directory/index/".$param."/";
        $config["total_rows"] = count($this->new_joinee_model->record_count($param));
        $config["per_page"] = 20;
        $config["uri_segment"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
 
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$arrData['company_location_details']=$this->company_location_model->get_company_location_details();
		$arrData['office']=
		$this->new_joinee_model->office_details($param,$config["per_page"],($page-1)*$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='employee_directory';
		$this->load->view('template',$arrData);
	}
}

/* End of file Employee_directory.php */
/* Location: ./application/controllers/Employee_directory.php */