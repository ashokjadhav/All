<?php
/**
 * My_medals Class
 *
 * @author Ashok Jadhav
 * @package CI_My_medals
 * @subpackage Controller
 *
 */
class My_medals extends CI_Controller {

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
    $this->load->model('admin/medals_model');
    $this->load->model('admin/employee_model');

  }

  /**
     * index
     *
     * This help to display Medals Details for each employees
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
      $multiDelete = $this->medals_model->multi_delete_medals($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Medals Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Medals !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/my_medals');
    }

    $arrData['medalsDetails'] = $this->medals_model->get_medals_details();
   $arrData['middle'] = 'admin/postings/medals/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Medals Details
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
			$arrData["from_date"] = $this->input->post('fromdate');
			 $arrData["to_date"] = $this->input->post('todate');

           $arrData["dop"] = $this->input->post('dop');
			$arrData["medalfor"] = $this->input->post('medalfor');
            $arrData["gold"] = $this->input->post('gold');
			 if($arrData["gold"]>5){
		  $arrData["gold"] = 5;
		  }

			$arrData["silver"] = $this->input->post('silver');
			if($arrData["silver"]>5){
		  $arrData["silver"] = 5;
		  }


			$arrData["bronze"] = $this->input->post('bronze');
			if($arrData["bronze"]>5){
		  $arrData["bronze"] = 5;
		  }

			//$arrData["period"] = $this->input->post('period');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
           $usermedalsexist=$this->medals_model->get_medals_details_user($this->input->post('empid'));
           //var_dump($usermedalsexist);exit;
		   if($usermedalsexist){
		   $insertflag=$this->medals_model->update_medals_details($this->input->post('name'),$arrData);
		   if ($insertflag) {

              $this->session->set_flashdata('success', 'Medal Details Updated Successfully !!');
              redirect('admin/my_medals');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Update Details!!');
              redirect('admin/my_medals/add');
            }


		   }

		   else{
            $insertedFlag = $this->medals_model->save_medaldetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Medal Details Added Successfully !!');
              redirect('admin/my_medals');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Medal Details!!');
              redirect('admin/my_medals/add');
            }
          }

}
    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/medals/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit Medals Details
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

    $arrData['medalDetailsArr'] = "";
    if ($_POST) {

      $medal_details = $this->medals_model->get_medals_details($iuserId);



 if ($this->input->post('submit')) {

          $date = date("Y-m-d H:i:s");
          $UpdateData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
          //$UpdateData["name"] = $this->input->post('name');
		  $UpdateData["from_date"] = $this->input->post('fromdate');
			 $UpdateData["to_date"] = $this->input->post('todate');
          $UpdateData["dop"] = $this->input->post('dop');
		  $UpdateData["medalfor"] = $this->input->post('medalfor');
            $UpdateData["gold"] = $this->input->post('gold');
			 if($UpdateData["gold"]>5){
		  $UpdateData["gold"] = 5;
		  }

			$UpdateData["silver"] = $this->input->post('silver');
			if($UpdateData["silver"]>5){
		  $UpdateData["silver"] = 5;
		  }
			$UpdateData["bronze"] = $this->input->post('bronze');
			if($UpdateData["bronze"]>5){
		  $UpdateData["bronze"] = 5;
		  }
		   //$UpdateData["period"] =	$this->input->post('period');
          $UpdateData["modified_date"] = $date;


            $updateFlag = $this->medals_model->update_medals($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Medal Details Updated Successfully !!');
              redirect('admin/my_medals');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Medal Details!!');
              redirect('admin/my_medals/edit/' . $iuserId);
            }

        }

    }
    else {
      $medal_details = $this->medals_model->get_medals_details($iuserId);
      $arrData['medalsDetailsArr'] = $medal_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/medals/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Medals Details
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
    $delete = $this->medals_model->delete_medal($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Medal Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Medal Details!!');
      redirect('admin/my_medals');
  }


  /**
   * set status
   *
   * This help to publish Medals Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->medals_model->set_medal($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Medals Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->medals_model->unset_medal($icategoryId);

  }
}