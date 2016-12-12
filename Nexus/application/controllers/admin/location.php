<?php
/**
 * location Class
 *
 * @author Ashok Jadhav
 * @package CI_location
 * @subpackage Controller
 *
 */
class location extends CI_Controller {

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
    $this->load->model('admin/location_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display location Details
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
      $multiDelete = $this->location_model->multi_delete_location($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Location Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Location Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/location');
    }

    $arrData['locationDetails'] = $this->location_model->get_location_details();
   $arrData['middle'] = 'admin/location/location';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add location Details
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
            $arrData["name"] = $this->input->post('name');
			$arrData["contact"] = $this->input->post('contact');
			$arrData["city"] = $this->input->post('city');
			$arrData["address"] = $this->input->post('address');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->location_model->save_locationdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Location Details Added Successfully !!');
              redirect('admin/location');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Location Details!!');
              redirect('admin/location/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/location/add';
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

    $arrData['locationDetailsArr'] = "";
    if ($_POST) {
		$location_details = $this->location_model->get_location_details($iuserId);
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$UpdateData["name"] = $this->input->post('name');
			$UpdateData["contact"] = $this->input->post('contact');
			$UpdateData["city"] = $this->input->post('city');
			$UpdateData["address"] = $this->input->post('address');
			$UpdateData["modified_date"] = $date;
			$updateFlag = $this->location_model->update_location($iuserId, $UpdateData);
			if ($updateFlag) {
              $this->session->set_flashdata('success', 'Location Details Updated Successfully !!');
              redirect('admin/location');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Location Details!!');
              redirect('admin/location/edit/' . $iuserId);
            }
        }
    }
    else {
		$location_details = $this->location_model->get_location_details($iuserId);
		$arrData['locationDetailsArr'] = $location_details;
	}
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/location/edit';
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
    $delete = $this->location_model->delete_location($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Location Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Location Details!!');
    redirect('admin/location');
  }
/**
   * set status
   *
   * This help to publish location Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->location_model->set_location($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish location Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->location_model->unset_location($icategoryId);

  }
}
/* End of file birthday.php */
/* Location: ./application/controllers/birthday.php */