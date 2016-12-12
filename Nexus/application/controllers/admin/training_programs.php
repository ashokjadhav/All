<?php
/**
 * Training_programs Class
 *
 * @author Ketan Sangani
 * @package CI_Training_programs
 * @subpackage Controller
 *
 */
class Training_programs extends CI_Controller {

  /**
  * __construct
  *
  * Calls parent constructor
  * @author Ketan Sangani
  * @access public
  * @return void
  */
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/training_programs_model');
    $this->load->model('admin/employee_model');

	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Training programs Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

	$arrData['tab']=$this->uri->segment(2);

	if ($this->input->post('delete')) {
      $multiDelete = $this->training_programs_model->multi_delete_programs($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Medals Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Medals !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/training_programs');
    }

    $arrData['programsDetails'] = $this->training_programs_model->get_programs_details();
   $arrData['middle'] = 'admin/postings/training_programs/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Training programs Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
  public function add() {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {

      if ($this->input->post('submit')) {



		   $date = date("Y-m-d H:i:s");

            $inserted_rightsFlag = true;
            $arrData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
            //$arrData["name"] = $this->input->post('name');
			$arrData["programname"] = $this->input->post('programname');
			 $arrData["importance_level"] = $this->input->post('importance');
			  $arrData["process"] = $this->input->post('process');
            $arrData["start_date"] = $this->input->post('sdate');
			$arrData["learning_areas"] = $this->input->post('learning');
            //$arrData["process"] = $this->input->post('process');
			$arrData["deadline"] = $this->input->post('deadline');
			$arrData["total_hours"] = $this->input->post('hours');
			//$arrData["period"] = $this->input->post('period');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;




            $insertedFlag = $this->training_programs_model->save_programdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Training Program Details Added Successfully !!');
              redirect('admin/training_programs');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Training Program Details!!');
              redirect('admin/training_programs/add');
            }

	  }

    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/training_programs/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit Training programs Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */

  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['programsDetailsArr'] = "";
    if ($_POST) {

      $medal_details = $this->training_programs_model->get_programs_details($iuserId);
 if ($this->input->post('submit')) {

          $date = date("Y-m-d H:i:s");
          $UpdateData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
          //$UpdateData["name"] = $this->input->post('name');
		  $UpdateData["programname"] = $this->input->post('programname');
		  $UpdateData["importance_level"] = $this->input->post('importance');
			$UpdateData["process"] = $this->input->post('process');
            $UpdateData["start_date"] = $this->input->post('sdate');
			$UpdateData["learning_areas"] = $this->input->post('learning');
            //$UpdateData["process"] = $this->input->post('process');
			$UpdateData["deadline"] = $this->input->post('deadline');
			$UpdateData["total_hours"] = $this->input->post('hours');
		   //$UpdateData["period"] =	$this->input->post('period');
          $UpdateData["modified_date"] = $date;


            $updateFlag = $this->training_programs_model->update_programs($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Training Programs Details Updated Successfully !!');
              redirect('admin/training_programs');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Training Programs Details!!');
              redirect('admin/training_programs/edit/' . $iuserId);
            }

        }

    }
    else {
      $medal_details = $this->training_programs_model->get_programs_details($iuserId);
      $arrData['programsDetailsArr'] = $medal_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/training_programs/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Training programs Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->training_programs_model->delete_program($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Training Program Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Training Program Details!!');
      redirect('admin/training_programs');
  }


  /**
   * set status
   *
   * This help to publish Training program Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->training_programs_model->set_program($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Training program Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->training_programs_model->unset_program($icategoryId);

  }
}