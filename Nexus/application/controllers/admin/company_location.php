<?php
/**
 * location Class
 *
 * @author Ashok Jadhav
 * @package CI_company_location
 * @subpackage Controller
 *
 */
class company_location extends CI_Controller {

  /**
  * __construct
  *
  * Calls parent constructor
  * @author Ashok Jadhav
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
    $this->load->model('admin/company_location_model');
    /*if(!check_priviledges()){
    $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display company location Details
     *
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */
  public function index(){
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');}
        $arrData['tab']=$this->uri->segment(2);
        if ($this->input->post('delete')) {
            $multiDelete = $this->company_location_model->multi_delete_company_location($this->input->post('delete'));
        if ($multiDelete)
            $this->session->set_flashdata('success', 'Company Locations Details Deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to Delete Company Locations Details !!');
            // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
            // To avoid this we are redirecting it.
            redirect('admin/company_location');
        }

        $arrData['locationDetails'] = $this->company_location_model->get_company_location_details();
        $arrData['middle'] = 'admin/Company_Location/list';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * add
     *
     * This help to add company_location Details
     *
     * @author  Ashok Jadhav
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
                $arrData["location_name"] = ucfirst(strtolower($this->input->post('location_name')));
                $arrData["created_date"] = $date;
                $arrData["modified_date"] = $date;
                $insertedFlag = $this->company_location_model->save_company_locationdetails($arrData);
                if ($insertedFlag) {
                  $this->session->set_flashdata('success', 'Company Location Details Added Successfully !!');
                  redirect('admin/location_master');
                }
                else{
                  
                  $error = $this->db->_error_message();
                  $this->session->set_flashdata('error',str_replace('_',' ', $error));
                  redirect('admin/location_master/add');
                }
            }
        }
        else{
            $arrData['error']='';
        }
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/Company_Location/add';
        $this->load->view('admin/template', $arrData);
    }
/**
   * edit
   *
   * This help to edit location Details
   *
   * @author  Ashok jadhav
   * @access  public
   * @param integer $id
   * @return  void
   */

  public function edit($iuserId) {
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');}
        $arrData['locDetailsArr'] = "";
    if ($_POST) {
      $location_details = $this->company_location_model->get_company_location_details($iuserId);
      if ($this->input->post('submit')) {
        $date = date("Y-m-d H:i:s");
        $UpdateData["location_name"] = ucfirst(strtolower($this->input->post('location_name')));
        $UpdateData["modified_date"] = $date;
        $updateFlag = $this->company_location_model->update_company_location($iuserId, $UpdateData);
        if ($updateFlag) {
          $this->session->set_flashdata('success', 'Company Location Details Updated Successfully !!');
          redirect('admin/company_location');
        }
        else{
          $this->session->set_flashdata('error', 'Failed to Update Location Details!!');
          redirect('admin/company_location/edit/' . $iuserId);
        }
      }
    }
    else {
      $location_details = $this->company_location_model->get_company_location_details($iuserId);
      $arrData['locDetailsArr'] = $location_details;
    }
    $arrData['tab']=$this->uri->segment(2);
    //$arrData['company_location_details']=$this->company_location_model->get_company_location_details();
    $arrData['middle'] = 'admin/Company_Location/edit';
    $this->load->view('admin/template', $arrData);
  }

  /**
   * delete
   *
   * This help to delete location Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
    if(!check_priviledges()){
      $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
      redirect('admin/dashboard');}
    $delete = $this->company_location_model->delete_company_location($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Company Location Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete  Company Location Details!!');
    redirect('admin/company_location');
  }

/**
   * set status
   *
   * This help to publish company location Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->company_location_model->set_company_location($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish company_location Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->company_location_model->unset_company_location($icategoryId);

  }
}
