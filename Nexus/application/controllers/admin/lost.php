<?php
/**
 * Lost Class
 *
 * @author Ashok Jadhav
 * @package CI_Lost
 * @subpackage Controller
 *
 */

class Lost extends CI_Controller {

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
    $this->load->model('admin/lost_model');
	$this->load->model('admin/lending_management_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display lost library resources Details
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
      $multiDelete = $this->lost_model->multi_delete_lost_management($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Losted lending_management Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Losted lending_management Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/lost');
    }
    if(empty($table))
		{
			$table = 'Book';
		}
    $arrData['lostDetails'] = $this->lost_model->get_losted_details($newsfeedId = 0,$table);
	$arrData['categoryDetails'] = $this->lending_management_model->get_category_details();
	$arrData['table']=$table;
   $arrData['middle'] = 'admin/library/lending_management/lost';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete lost library resource Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($ilending_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->lending_management_model->delete_lending_management($ilending_managementId);
    if ($delete)
      $this->session->set_flashdata('success', 'Losted lending_management Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete  Losted lending_management Details!!');
      redirect('admin/lending_management');
  }



}