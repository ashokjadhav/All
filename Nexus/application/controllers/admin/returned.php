<?php
/**
 * Returned Class
 *
 * @author Ashok Jadhav
 * @package CI_Returned
 * @subpackage Controller
 *
 */
class Returned extends CI_Controller {

  /**
  * __construct
  *
  * Calls parent constructor
  * @author Manish Dubey
  * @access public
  * @return void
  */
  function __construct()
  {
    parent::__construct();
   /* if($this->session->lending_managementdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }*/
    $this->load->model('admin/return_model');
	$this->load->model('admin/lending_management_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

 /**
     * index
     *
     * This help to display returned resources Details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param   $table
     * @return  void
     */
  public function index($table=null){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);

  if ($this->input->post('delete')) {
      $multiDelete = $this->return_model->multi_delete_returned($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'resource_Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete lending_managements !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/returned');
    }
    if(empty($table))
		{
			$table = 'Book';
		}
    $arrData['returnedDetails'] = $this->return_model->get_returned_details($newsfeedId = 0,$table);
	$arrData['categoryDetails'] = $this->lending_management_model->get_category_details();
	$arrData['table']=$table;
   $arrData['middle'] = 'admin/library/lending_management/return';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete returned resource Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $ilending_managementId
   * @return  void
   */
  public function delete($ilending_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->lending_management_model->delete_lending_management($ilending_managementId);
    if ($delete)
      $this->session->set_flashdata('success', 'lending_management Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete lending_management Details!!');
      redirect('admin/lending_management');
  }



}