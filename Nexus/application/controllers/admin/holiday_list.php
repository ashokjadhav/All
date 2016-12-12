<?php
/**
 * holiday_list Class 
 *
 * @author Ketan Sangani
 * @package CI_holiday_list
 * @subpackage Controller
 *
 */
class holiday_list extends CI_Controller {
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
    $this->load->model('admin/holiday_list_model');
	}

/**
 * index
 *
 * This help to display holiday_list Details
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
        $multiDelete = $this->holiday_list_model->multi_delete_holiday_list($this->input->post('delete'));
        if ($multiDelete)
          $this->session->set_flashdata('success', 'Holiday Details Deleted Successfully !!');
        else
          $this->session->set_flashdata('error', 'Failed to Delete Holiday Details !!');
        redirect('admin/holiday_list');
      }
      $arrData['holiday_listDetails'] = $this->holiday_list_model->get_holiday_list_details();
      $arrData['middle'] = 'admin/holiday_list/holiday_list';
      $this->load->view('admin/template', $arrData);
    }
  
/**
 * add
 *
 * This help to add holiday_list Details
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
        $arrData["city"] = $this->input->post('city');
        $arrData["holiday_date"] = $this->input->post('date');
        $arrData["desc"] = $this->input->post('desc');
        $arrData["created_date"] = $date;
        $arrData["modified_date"] = $date;
        $insertedFlag = $this->holiday_list_model->save_holiday_listdetails($arrData);
        if ($insertedFlag) {
          $this->session->set_flashdata('success', 'Holiday Details Added Successfully !!');
          redirect('admin/holiday_list');
        }
        else{
          $this->session->set_flashdata('error', 'Failed to Add Holiday Details!!');
          redirect('admin/holiday_list/add');
        }
      }
    }
    else{
      $arrData['error']='';
    }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/holiday_list/add';
    $this->load->view('admin/template', $arrData);
  }

/**
 * edit
 *
 * This help to edit holiday_list Details
 * 
 * @author  Ketan Sangani
 * @access  public
 * @param integer $id
 * @return  void
 */
 
  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    
    $arrData['holiday_listDetailsArr'] = "";
    if ($_POST) {
    $holiday_list_details = $this->holiday_list_model->get_holiday_list_details($iuserId);
    if ($this->input->post('submit')) {
      $date = date("Y-m-d H:i:s");
      $UpdateData["city"] = $this->input->post('city');
      $UpdateData["holiday_date"] = $this->input->post('date');
      
      $UpdateData["desc"] = $this->input->post('desc');
      $UpdateData["modified_date"] = $date;
      $updateFlag = $this->holiday_list_model->update_holiday_list($iuserId, $UpdateData);
      if ($updateFlag) {
              $this->session->set_flashdata('success', 'Holiday Details Updated Successfully !!');
              redirect('admin/holiday_list');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Holiday Details!!');
              redirect('admin/holiday_list/edit/' . $iuserId);
            }
        }
    }
    else {
    $holiday_list_details = $this->holiday_list_model->get_holiday_list_details($iuserId);
    $arrData['holiday_listDetailsArr'] = $holiday_list_details;
  }
  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/holiday_list/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete holiday_list Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->holiday_list_model->delete_holiday_list($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Holiday Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Holiday Details!!');
    redirect('admin/holiday_list');
  }
   /**
   * set status
   *
   * This help to publish holidays Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->holiday_list_model->set_holiday($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish holidays Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->holiday_list_model->unset_holiday($icategoryId);
   
  }
}
