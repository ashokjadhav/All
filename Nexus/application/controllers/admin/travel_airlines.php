<?php
/**
 * Travel_airlines Class
 *
 * @author Ketan Sangani
 * @package CI_Travel_airlines
 * @subpackage Controller
 *
 */
class Travel_airlines extends CI_Controller {

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
     * This help to display Travel airlines Details
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
      $multiDelete = $this->traveldesk_model->multi_delete_airlines($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Airlines Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Airlines !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/travel_airlines');
    }

    $arrData['airlinesDetails'] = $this->traveldesk_model->get_airlines_details();
   $arrData['middle'] = 'admin/travel_desk/airlines/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Travel airlines Details
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
	  $arrData["type"] = $this->input->post('type');
	  $arrData["url"] = $this->input->post('url');

      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->traveldesk_model->save_airlinesdetails($arrData);
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Airline Details Added Successfully !!');
              redirect('admin/travel_airlines');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Airline Details!!');
              redirect('admin/travel_airlines/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/travel_desk/airlines/add';
    $this->load->view('admin/template', $arrData);
  }
/**
     * edit
     *
     * This help to edit Travel airlines Details
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

    $arrData['airlinesDetailsArr'] = "";
    if ($_POST) {

      $category_details = $this->traveldesk_model->get_airlines_details($icategoryId);


 if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $UpdateData["name"] = $this->input->post('name');
	  $UpdateData["type"] = $this->input->post('type');
	  $UpdateData["url"] = $this->input->post('url');


      $date = date("Y-m-d H:i:s");
      $UpdateData["modified_date"] = $date;
     }


            $updateFlag = $this->traveldesk_model->update_airline($icategoryId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Airline Details Updated Successfully !!');
              redirect('admin/travel_airlines');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Airline Details!!');
              redirect('admin/travel_airlines/edit/' . $icategoryId);
            }



    }
    else {
      $airline_details = $this->traveldesk_model->get_airlines_details($icategoryId);
      $arrData['airlinesDetailsArr'] = $airline_details;

    }
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/travel_desk/airlines/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Travel airlines Details
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
    $delete = $this->traveldesk_model->delete_airline($icategoryId);
    if ($delete)
      $this->session->set_flashdata('success', 'Airline Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Airline Details!!');
      redirect('admin/travel_airlines');
  }
  /**
   * set status
   *
   * This help to publish Travel airlines Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->traveldesk_model->set_airline($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Travel airlines Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->traveldesk_model->unset_airline($icategoryId);

  }
}