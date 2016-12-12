<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Faqs Class 
 *
 * @author Ashok jadhav
 * @package CI_Faqs
 * @subpackage Controller
 *
 */

class Faqs extends CI_Controller {
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
	function __construct()
	{
        // Initialization of class
        parent::__construct();
        if($this->session->userdata('site_login') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
            redirect('site_login');
            break;
		}
		$this->load->model('faqs_model');
	}
    
	/**
     * index
     * 
     * Display HR FAQs
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	public function index(){
		$arrData['faqs']=$this->faqs_model->faqs_details();
        $arrData['tab']=$this->uri->segment(2);
		$arrData['middle']='faqs';
		$this->load->view('template',$arrData);
	}
}

/* End of file Faqs.php */
/* Location: ./application/controllers/Faqs.php */



