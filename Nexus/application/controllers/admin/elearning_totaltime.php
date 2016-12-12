<?php
/**
 * Elearning_totaltime Class
 *
 * @author Ashok Jadhav
 * @package CI_Elearning_totaltime
 * @subpackage Controller
 *
 */
class Elearning_totaltime extends CI_Controller {
/**
     * construct
     *
     * constructor method (checks login status)
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/quiz_model');
	$this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Elearning totaltime Details for every employees
     *
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */
  public function index($table=null){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
	if ($this->input->post('delete')) {
		$multiDelete = $this->quiz_model->multi_delete_timesdetails($this->input->post('delete'));
		if ($multiDelete)
			$this->session->set_flashdata('success', 'Elearning Spent Times Details Deleted Successfully !!');
		else
			$this->session->set_flashdata('error', 'Failed to Delete Elearning Spent Times Details !!');
			  // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
			  // To avoid this we are redirecting it.
		redirect('admin/elearning_totaltime/index/'.$table);
    }
    //$table = urldecode($table);
    $arrData['timesdetails'] = $this->quiz_model->get_time_details($newsfeedId = 0,$table);
	$arrData['employeeslist'] = $this->quiz_model->get_allemployees();
	$arrData['elearning_time'] = $this->quiz_model->get_elearningtime_details($table);
	$arrData['table'] = $table;
	$arrData['middle'] = 'admin/elearning/quiz_scores/elearning_time';
    $this->load->view('admin/template',$arrData);
  }
   /**
   * set status
   *
   * This help to publish Elearning totaltime Details on Employees' Dashboard
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId,$table) {
    $delete = $this->quiz_model->set_elearningtime($icategoryId);
	$arrData['elearning_time'] = $this->quiz_model->get_elearningtime_details($table);
	echo json_encode($arrData['elearning_time']);
  }

   /**
   * unset status
   *
   * This help to unpublish Elearning totaltime Details From Employees' Dashboard
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId,$table) {
    $delete = $this->quiz_model->unset_elearningtime($icategoryId);
	$arrData['elearning_time'] = $this->quiz_model->get_elearningtime_details($table);
	echo json_encode($arrData['elearning_time']);
  }

}