<?php
/**
 * Ticket_cancelled Class
 *
 * @author Ashok Jadhav
 * @package CI_Ticket_cancelled
 * @subpackage Controller
 *
 */
class Ticket_cancelled extends CI_Controller {

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
    $this->load->model('admin/traveldesk_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/

  }

  /**
     * index
     *
     * This help to display Details of cancelled travel tickets
     *
     * @author  Ashok Jadhav
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
      $multiDelete = $this->traveldesk_model->multi_delete_ticketscancelled($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Tickets Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Tickets !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/ticket_cancelled');
    }
	if(empty($table))
		{
			$table = 'AIR';
		}

		$arrData['table'] = $table;


    $arrData['cancelled_managementDetails'] = $this->traveldesk_model->get_cancelledtickets_management_details($newsfeedId=0,$table);
	//var_dump($arrData['requests_managementDetails']);exit;
   $arrData['middle'] = 'admin/travel_desk/travel_requests/cancelled';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete Details of cancelled travel tickets
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */
  public function delete($table,$iresource_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->traveldesk_model->delete_cancelledtravelrequest($iresource_managementId);
    if ($delete)
      $this->session->set_flashdata('success', 'Cancelled Travel Request Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Cancelled Travel Request Details!!');
      redirect('admin/ticket_cancelled/index/'.$table);
  }


}