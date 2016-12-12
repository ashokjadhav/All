<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Elearning_quiz Class
 *
 * @author Ashok Jadhav
 * @package CI_Elearning_quiz
 * @subpackage Controller
 *
 */
class Elearning_quiz extends CI_Controller {
	/**
     * construct
     *
     * constructor method
     * @author Ashok Jadhav
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

		$this->load->model('elearning_model');

	}
	/**
     * index
     *
     * displays index page of Elearning_quiz
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$arrData['tab']=$this->uri->segment(1);
		if($_POST){
			if($this->input->post('submit')){
				$quiz_subcategory = urldecode($this->input->post('subcategory'));
				$arrData['questions'] = $this->elearning_model->get_questions($quiz_subcategory);
				$arrData['category']= $this->input->post('category');
				$arrData['subcategory']= $quiz_subcategory;
				$arrData['middle']='elearning_quiz';
				$this->load->view('template',$arrData);
			}
		}
		else{
			$arrData['categorydetails']=$this->elearning_model->get_category_details();
		    $arrData['middle']='elearning';
		    $this->load->view('template',$arrData);
		}
	}
}

/* End of file Elearning_quiz.php */
/* Location: ./application/controllers/Elearning_quiz.php */