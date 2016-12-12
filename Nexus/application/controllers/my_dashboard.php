<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * My_dashboard Class
 *
 * @author Ketan Sangani
 * @package CI_my_dashboard
 * @subpackage Controller
 *
 */
class My_dashboard extends CI_Controller {
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
		$this->load->model('my_dashboard_model');
    }



	/**
     * index
     *
     * Display My dashboard
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index()
	{
		$arrData['tab']=$this->uri->segment(1);
		$arrData['medalsDetails']=$this->my_dashboard_model->get_allmedals_details();
		$arrData['assignmentsDetails']=$this->my_dashboard_model->get_allassignments_details();
		$arrData['kraDetails']=$this->my_dashboard_model->get_allkras_details();
		$arrData['kpiDetails']=$this->my_dashboard_model->get_allkpis_details();
		$arrData['programsDetails']=$this->my_dashboard_model->get_alltraining_details();
		$arrData['elearning_time']=$this->my_dashboard_model->get_elearningtime_details();
		$arrData['quiz_scores']=$this->my_dashboard_model->get_quizscores_details();
		$arrData['travel_authority'] = $this->my_dashboard_model->check_travelauthorityornot();
		$arrData['middle']='my_dashboard';
		$this->load->view('template',$arrData);
	}

}

/* End of file my_dashboard.php */
/* Location: ./application/controllers/my_dashboard.php */