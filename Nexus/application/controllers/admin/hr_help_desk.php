<?php
    /**
     * Hr_help_desk Class 
     *
     * @author Ketan Sangani
     * @package CI_Hr_help_desk
     * @subpackage Controller
     *
     */
    class Hr_help_desk extends CI_Controller {

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
      $this->load->model('admin/hr_help_desk_model');
      $this->load->model('admin/company_location_model');
    }

  /**
     * index
     *
     * This help to display hr_help_desk Details
     * 
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
    public function index(){  
      if(!check_priviledges()){
  		  $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
      }
      $arrData['tab']=$this->uri->segment(2);
      if ($this->input->post('delete')) {
        $multiDelete = $this->hr_help_desk_model->multi_delete_hr($this->input->post('delete'));
        if ($multiDelete)
          $this->session->set_flashdata('success', 'HR Deleted Successfully !!');
        else
          $this->session->set_flashdata('error', 'Failed to Delete HR !!');
        // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
        // To avoid this we are redirecting it.
        redirect('admin/hr_help_desk');
      }
      $arrData['hrhelpdeskDetails'] = $this->hr_help_desk_model->get_hr_details();
      $arrData['middle'] = 'admin/hr_help_desk/list_hr_help_desk';
      $this->load->view('admin/template', $arrData);
    }
  
  /**
     * add
     *
     * This help to add hr_help_desk Details
     * 
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
    public function add() {
      if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
      }
      if ($_POST) {
        $this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[hr_help_desk.user_id]');
        if ($this->form_validation->run() == FALSE) {
          $arrData['error']= "Already Exist!!  ".validation_errors();
        }
        else{
          if ($this->input->post('submit')) {
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $arrData["location_id"] = $this->input->post('comp_loc_id');
  		      $arrData["user_id"] = $this->input->post('empid');
  		      $arrData["contactfor"] = $this->input->post('contactfor');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
            $insertedFlag = $this->hr_help_desk_model->save_hrdetails($arrData);
  		      if ($insertedFlag) {
              $this->session->set_flashdata('success', 'HR Details Added Successfully !!');
              redirect('admin/hr_help_desk');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add HR Details!!');
              redirect('admin/hr_help_desk/add');
            }
          }
        }
      }
      else{
        $arrData['error']='';
      }
      $arrData['tab']=$this->uri->segment(2);
      $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
      $arrData['middle'] = 'admin/hr_help_desk/add';
      $this->load->view('admin/template', $arrData);
    }
/**
   * edit
   *
   * This help to edit hr_help_desk Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
   
  public function edit($iuserId) {
	  if(!check_priviledges()){
		  $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
		  redirect('admin/dashboard');
    }
	  $arrData['hrhelpDetailsArr'] = "";
		if ($_POST) {
      $arrData['error']='';
			$hr_help_desk_details = $this->hr_help_desk_model->get_hr_details($iuserId);
			$arrData['hrhelpDetailsArr'] = $hr_help_desk_details;
      if ($this->input->post('submit')) {
          if($arrData['hrhelpDetailsArr'][0]['user_id']!=$this->input->post('empid')){
            $this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[hr_help_desk.user_id]');
      			if ($this->form_validation->run() == FALSE) {
              $arrData['error']= "Already Exist!!  ".validation_errors();
      			}
		      }else{
            $date = date("Y-m-d H:i:s");
		        $UpdateData["user_id"] = $this->input->post('empid');
            $UpdateData["location_id"] = $this->input->post('comp_loc_id');
			   		$UpdateData["contactfor"] =	$this->input->post('contactfor');
				  	$UpdateData["modified_date"] = $date;
		        $updateFlag = $this->hr_help_desk_model->update_hr($iuserId, $UpdateData);
            if ($updateFlag) {
		          $this->session->set_flashdata('success', 'HR Details Updated Successfully !!');
					    redirect('admin/hr_help_desk');
	          }
					  else{
					    $this->session->set_flashdata('error', 'Failed to Update HR Details!!');
					    redirect('admin/hr_help_desk/edit/' . $iuserId);
					  }
          }
        }
      }
      else {
        $hr_help_desk_details = $this->hr_help_desk_model->get_hr_details($iuserId);
        $arrData['hrhelpDetailsArr'] = $hr_help_desk_details;
        $arrData['error']='';
      }
      $arrData['tab']=$this->uri->segment(2);
      $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
      $arrData['middle'] = 'admin/hr_help_desk/edit';
      $this->load->view('admin/template', $arrData);
    }
  /**
   * delete
   *
   * This help to delete hr_help_desk Details
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
    $delete = $this->hr_help_desk_model->delete_hr($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'HR Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete HR Details!!');
      redirect('admin/hr_help_desk');
  }
 /**
   * set status
   *
   * This help to publish hr Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->hr_help_desk_model->set_hr($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish hr Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->hr_help_desk_model->unset_hr($icategoryId);
   
  }
}