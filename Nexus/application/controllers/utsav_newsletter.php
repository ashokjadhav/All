<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utsav_newsletter extends CI_Controller {
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
		$this->load->model('admin/utsav_model');

	}

	/**
     * index
     *
     * Display list of Utsav Newsletter
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		
		$arrData['tab']=$this->uri->segment(3);
		$arrData['AllUtsav'] = $this->utsav_model->getAllUtsav();
		$arrData['middle']='utsav';
		$this->load->view('template',$arrData);


	}

	/**
     * download
     *
     * Download newsletter
     * @author Ashok Jadhav
	 * @access public
     * @param $id
     * @return void
     *
     */
	public function download($id) {
		//load the download helper

		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$arrData=$this->utsav_model->get_form_details($id);
		$data = file_get_contents("./utsav/".$arrData[0]['form']);

		//Read the file's contents
		$name = $arrData[0]['form'];

		//use this function to force the session/browser to download the file uploaded by the user
		force_download($name, $data);
	}
}

/* End of file utsav_newsletter.php */
/* Location: ./application/controllers/utsav_newsletter.php */