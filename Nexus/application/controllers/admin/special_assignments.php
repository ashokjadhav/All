<?php
/**
 * Special_assignments Class
 *
 * @author Ketan Sangani
 * @package CI_Special_assignments
 * @subpackage Controller
 *
 */
class Special_assignments extends CI_Controller {

/**
     * construct
     *
     * constructor method (checks login status)
     * @author Ketan Sangani
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
    $this->load->model('admin/special_assignments_model');
    $this->load->model('admin/employee_model');

	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Special_assignments Details
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
      $multiDelete = $this->special_assignments_model->multi_delete_assignments($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Assignments Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Assignments !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/special_assignments');
    }

    $arrData['assignmentsDetails'] = $this->special_assignments_model->get_assignments_details();
   $arrData['middle'] = 'admin/postings/special_assignments/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Special_assignment Details
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
            $arrData["subject"] = $this->input->post('subject');
			$arrData["details"] = $this->input->post('details');
            $arrData["deadline"] = $this->input->post('deadline');
			$arrData["comments"] = $this->input->post('specialcomments');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->special_assignments_model->save_assignmentdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Assignmet Details Added Successfully !!');
              redirect('admin/special_assignments');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Assignment Details!!');
              redirect('admin/special_assignments/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/special_assignments/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit Special_assignments Details
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
		$arrData['specialassignmentsDetailsArr'] = "";
		if ($_POST) {

		  $assignments_details = $this->special_assignments_model->get_assignments_details($iuserId);
	 if ($this->input->post('submit')) {

			  $date = date("Y-m-d H:i:s");
			   //$UpdateData["name"] = $this->input->post('name');
      $UpdateData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
			  $UpdateData["subject"] = $this->input->post('subject');
			  $UpdateData["details"] = $this->input->post('details');
				$UpdateData["deadline"]  = $this->input->post('deadline');
			   $UpdateData["comments"] =	$this->input->post('specialcomments');
			  $UpdateData["modified_date"] = $date;


				$updateFlag = $this->special_assignments_model->update_assignments($iuserId, $UpdateData);

				if ($updateFlag) {
				  $this->session->set_flashdata('success', 'Assignment Details Updated Successfully !!');
				  redirect('admin/special_assignments');
				}
				else{
				  $this->session->set_flashdata('error', 'Failed to Update Assignment Details!!');
				  redirect('admin/special_assignments/edit/' . $iuserId);
				}

			}

		}
		else {
		  $assignments_details = $this->special_assignments_model->get_assignments_details($iuserId);
		  $arrData['specialassignmentsDetailsArr'] = $assignments_details;

		}
		 $arrData['tab']=$this->uri->segment(2);
		$arrData['middle'] = 'admin/postings/special_assignments/edit';
		$this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Special_assignments Details
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
    $delete = $this->special_assignments_model->delete_assignment($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Assignment Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Assignment Details!!');
      redirect('admin/special_assignments');
  }


  /**
   * set status
   *
   * This help to publish Special_assignments Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->special_assignments_model->set_assignments($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Special_assignments Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->special_assignments_model->unset_assignments($icategoryId);

  }
}