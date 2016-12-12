<?php
/**
 * Ticket_approved Class
 *
 * @author Ketan Sangani
 * @package CI_Ticket_approved
 * @subpackage Controller
 *
 */
class Ticket_approved extends CI_Controller {

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
    $this->load->model('admin/traveldesk_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/


  }

  /**
     * index
     *
     * This help to display Approved travel tickets Details
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
    if(empty($table))
		{
			$table = 'AIR';
		}
  if ($this->input->post('delete')) {
      $multiDelete = $this->traveldesk_model->multi_delete_ticketsapproved($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Approved Tickets Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Approved Tickets !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/ticket_approved');
    }


		$arrData['table'] = $table;


    $arrData['approvedtickets_managementDetails'] = $this->traveldesk_model->get_approvedtickets_management_details($newsfeedId=0,$table);
	//var_dump($arrData['requests_managementDetails']);exit;
   $arrData['middle'] = 'admin/travel_desk/travel_requests/approved';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete Approved travel tickets Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */
  public function delete($table,$iresource_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->traveldesk_model->delete_approvedtravelrequest($iresource_managementId);
    if ($delete)
      $this->session->set_flashdata('success', 'Approved Travel Request Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Approved Travel Request Details!!');
      redirect('admin/ticket_approved/index/'.$table);
  }


}