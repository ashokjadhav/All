<?php
/**
 * Travel_locations Class
 *
 * @author Ketan Sangani
 * @package CI_Travel_locations
 * @subpackage Controller
 *
 */
class guesthouse_locations extends CI_Controller {

 /**
     * construct
     *
     * constructor method (checks login status)
     * @author Priyank Jain
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
    $this->load->model('admin/traveldesk_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Travel locations Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param none
     * @return  void
     */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);

  if ($this->input->post('delete')) {
      $multiDelete = $this->traveldesk_model->multi_delete_guesthouse($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Guesthouse Locations Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Guesthouse Locations !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/guesthouse_locations');
    }

    $arrData['locationsDetails'] = $this->traveldesk_model->get_guesthouse_details();
   $arrData['middle'] = 'admin/travel_desk/guesthouse/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Travel locations Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param none
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
      $arrData["name"] = $this->input->post('name');
      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->traveldesk_model->save_guesthousedetails($arrData);
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Guesthouse Location Details Added Successfully !!');
              redirect('admin/guesthouse_locations');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Guesthouse Location Details!!');
              redirect('admin/guesthouse_locations/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/travel_desk/guesthouse/add';
    $this->load->view('admin/template', $arrData);
  }
/**
     * edit
     *
     * This help to edit Travel locations Details
     *
     * @author Ketan Sangani
     * @access  public
	 * @param $icategoryId
     * @return  void
     */
    public function edit($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['locationsDetailsArr'] = "";
    if ($_POST) {

      $category_details = $this->traveldesk_model->get_guesthouse_details($icategoryId);


  if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $UpdateData["name"] = $this->input->post('name');
      $date = date("Y-m-d H:i:s");
      $UpdateData["modified_date"] = $date;
      $updateFlag = $this->traveldesk_model->update_guesthouse($icategoryId, $UpdateData);
      if ($updateFlag) {
        $this->session->set_flashdata('success', 'Guesthouse Location Details Updated Successfully !!');
        redirect('admin/guesthouse_locations');
      }
      else{
        $this->session->set_flashdata('error', 'Failed to Update Guesthouse Location Details!!');
        redirect('admin/guesthouse_locations/edit/' . $icategoryId);
      }
    }
    }
    else {
      $location_details = $this->traveldesk_model->get_guesthouse_details($icategoryId);
      $arrData['locationsDetailsArr'] = $location_details;

    }
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/travel_desk/guesthouse/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Travel locations Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function delete($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->traveldesk_model->delete_guesthouse($icategoryId);
    if ($delete)
      $this->session->set_flashdata('success', 'Guesthouse Location Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Location Details!!');
      redirect('admin/guesthouse_locations');
  }
  /**
   * set status
   *
   * This help to publish Travel locations Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->traveldesk_model->set_guesthouse($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Travel locations Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->traveldesk_model->unset_guesthouse($icategoryId);

  }
}