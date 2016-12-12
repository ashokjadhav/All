<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hr_forms extends CI_Controller {
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
		$this->load->model('hr_forms_model');
	}

	/**
     * index
     *
     * Display list of HR Forms
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$config = array();
        $config["base_url"] = base_url() . "hr_forms/index/";
        $config["total_rows"] =count($this->hr_forms_model->record_count());
        $config["per_page"] = count($this->hr_forms_model->record_count());
        $config["uri_segment"] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] =2;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
		$arrData['hr_help_details']=$this->hr_forms_model->get_hr_details(($page-1)*$config["per_page"],$config["per_page"]);
		$arrData["links"] = $this->pagination->create_links();
		$arrData['tab']=$this->uri->segment(3);
		$arrData['middle']='hr_forms';
		$this->load->view('template',$arrData);


	}

	/**
     * download
     *
     * Download HR Forms
     * @author Ketan Sangani
	 * @access public
     * @param $id
     * @return void
     *
     */
	public function download($id) {
		//load the download helper

		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$arrData=$this->hr_forms_model->get_form_details($id);
		$data = file_get_contents("./HRforms/".$arrData[0]['form']);

		//Read the file's contents
		$name = $arrData[0]['form'];

		//use this function to force the session/browser to download the file uploaded by the user
		force_download($name, $data);
	}
}

/* End of file Hr_forms.php */
/* Location: ./application/controllers/Hr_forms.php */