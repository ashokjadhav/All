<?php
/**
 * lending_management Class
 *
 * @author Ashok Jadhav
 * @package CI_lending_management
 * @subpackage Controller
 *
 */
class lending_management extends CI_Controller {
/**
     * construct
     *
     * constructor method (checks login status)
     * @author Ashok Jadhav
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
    $this->load->model('admin/lending_management_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display lending_management Details
     *
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */
  public function index($table=null){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);

  if ($this->input->post('delete')) {
      $multiDelete = $this->lending_management_model->multi_delete_lending_management($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'resource_Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete lending_managements !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/lending_management');
    }
    if(empty($table))
		{
			$table = 'Book';
		}
    $arrData['lending_managementDetails'] = $this->lending_management_model->get_lending_management_details($newsfeedId = 0,$table);
	//var_dump($arrData['lending_managementDetails']);
	//exit;
	$arrData['categoryDetails'] = $this->lending_management_model->get_category_details();
	$arrData['table']=$table;
   $arrData['middle'] = 'admin/library/lending_management/list';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete lending_management Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($ilending_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $resource_id = $this->lending_management_model->get_resourceid($ilending_managementId);

     $delete = $this->lending_management_model->delete_lending_management($ilending_managementId);

    if ($delete>0){
      $checkanyrequest = $this->lending_management_model->checkanyrequestornot($resource_id[0]['category'],$resource_id[0]['resource_id']);
    //var_dump($checkanyrequest);exit;
      $this->session->set_flashdata('success','Request Details Deleted Successfully !!');
	  redirect('admin/lending_management');
	}  else{
      $this->session->set_flashdata('error', 'Can"t Delete!! Resource has been already borrowed to that employee');
      redirect('admin/lending_management');
	}
  }
/**
   * edit
   *
   * This help to borrow resource to user
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */

public function edit($id) {
	if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
 if ($_POST) {

	if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
	  $category = $this->input->post('category');
	  $user_id = $this->input->post('user_id');
	  $resource_id = $this->input->post('resource_id');
      $UpdateData["dos"] = $this->input->post('dos');
      $UpdateData["due_date"] = $this->input->post('due_date');
	  $UpdateData["borrow_status"] = 'pending';
	  $UpdateData["modified_date"] = $date;
	  //var_dump($UpadateData);
	  //exit;


       $updateFlag = $this->lending_management_model->update_lending_management($id,$category,$user_id,$resource_id,$UpdateData);

            if ($updateFlag) {

              $this->session->set_flashdata('success', 'resource_management Details Updated Successfully !!');
              redirect('admin/lending_management/index/'.$category);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update resource_management Details!!');
              //redirect('admin/resource_management/edit/' . $iresource_managementId.'/'.$table);
            }



    }


  }

}
}