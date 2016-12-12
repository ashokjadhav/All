<?php
/**
 * It_help_desk Class
 *
 * @author Ketan Sangani
 * @package CI_It_help_desk
 * @subpackage Controller
 *
 */
class It_help_desk extends CI_Controller {

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
    $this->load->model('admin/it_help_desk_model');
	 $this->load->model('admin/employee_model');
   $this->load->model('admin/company_location_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display it_help_desk Details
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
      $multiDelete = $this->it_help_desk_model->multi_delete_hr($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'IT Help Desk Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete IT Help Desk Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/it_help_desk');
    }

    $arrData['ithelpdeskDetails'] = $this->it_help_desk_model->get_it_details();
   $arrData['middle'] = 'admin/it_help_desk/list_it_help_desk';
    $this->load->view('admin/template', $arrData);
  }

 /**
     * add
     *
     * This help to add it_help_desk Details
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
		$this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[it_help_desk.user_id]');
		if ($this->form_validation->run() == FALSE) {

			$arrData['error']= "Already Exist!!  ".validation_errors();
      }else{

      if ($this->input->post('submit')) {


		   $date = date("Y-m-d H:i:s");

            $inserted_rightsFlag = true;
			$arrData["user_id"] = $this->input->post('empid');
			$name = $this->employee_model->get_employeename($this->input->post('empid'));
            //$arrData["name"] = $this->input->post('name');
			//$arrData["designation"] = $this->input->post('designation');
            //$arrData["extension"] = $this->input->post('extension');
			$arrData["contactfor"] = $this->input->post('contactfor');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->it_help_desk_model->save_itdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'IT Help Desk Detail Added Successfully !!');
              redirect('admin/it_help_desk');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add IT Help Desk Detail Details!!');
              redirect('admin/it_help_desk/add');
            }
          }}


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
    $arrData['middle'] = 'admin/it_help_desk/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit it_help_desk Details
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

    $arrData['ithelpDetailsArr'] = "";
    if ($_POST) {

      $it_help_desk_details = $this->it_help_desk_model->get_it_details($iuserId);
	  $arrData['ithelpDetailsArr'] = $it_help_desk_details;
			if($arrData['ithelpDetailsArr'][0]['user_id']!=$this->input->post('empid')){
				$this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[it_help_desk.user_id]');
				if ($this->form_validation->run() == FALSE) {
					$arrData['error']= "Already Exist!!  ".validation_errors();
				}
			}
			else{
 if ($this->input->post('submit')) {

          $date = date("Y-m-d H:i:s");
           $UpdateData["user_id"] = $this->input->post('empid');
		  $name = $this->employee_model->get_employeename($this->input->post('empid'));
		  //$UpdateData["designation"] = $this->input->post('designation');
			//$UpdateData["extension"]  = $this->input->post('extn');
		   $UpdateData["contactfor"] =	$this->input->post('contactfor');
          $UpdateData["modified_date"] = $date;


            $updateFlag = $this->it_help_desk_model->update_it($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'IT Help Desk Detail Updated Successfully !!');
              redirect('admin/it_help_desk');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update IT Help Desk Detail Details!!');
              redirect('admin/it_help_desk/edit/' . $iuserId);
            }

        }}

    }
    else {
      $it_help_desk_details = $this->it_help_desk_model->get_it_details($iuserId);
      $arrData['ithelpDetailsArr'] = $it_help_desk_details;
	   $arrData['error']='';


    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
    $arrData['middle'] = 'admin/it_help_desk/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete it_help_desk Details
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
    $delete = $this->it_help_desk_model->delete_it($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'IT Help Desk Detail Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete IT Help Desk Detail Details!!');
      redirect('admin/it_help_desk');
  }
   /**
   * set status
   *
   * This help to publish it person Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->it_help_desk_model->set_it($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish job openings Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->it_help_desk_model->unset_it($icategoryId);

  }
}