<?php
/**
 * Approve_authority Class
 *
 * @author Ketan Sangani
 * @package CI_Approve_authority
 * @subpackage Controller
 *
 */
class Approve_authority extends CI_Controller {

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
      $this->load->model('admin/employee_model');
    }

/**
 * index
 *
 * This help to display Authority For approving travel tickets Details
 *
 * @author Ketan Sangani
 * @access  public
 * @param none
 * @return  void
 */
    public function index(){
      if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
      }
      $arrData['tab']=$this->uri->segment(2);
      if ($this->input->post('delete')) {
		    $multiDelete = $this->traveldesk_model->multi_delete_authority($this->input->post('delete'));
  			if ($multiDelete)
          $this->session->set_flashdata('success', 'Approving Authorities Deleted Successfully !!');
  			else
  				$this->session->set_flashdata('error', 'Failed to Delete Approving Authorities !!');
		    redirect('admin/approve_authority');
		  }
      $arrData['authorityDetails'] = $this->traveldesk_model->get_authority_details();
      $arrData['middle'] = 'admin/travel_desk/approving_authority/list';
  		$this->load->view('admin/template', $arrData);
	}

  /**
	 * add
	 *
	 * This help to add Authority For approving travel tickets Details
	 *
	 * @author Ketan Sangani
	 * @access  public
	 * @param none
	 * @return  void
	 */
    public function add() {
      if(!check_priviledges()){
          $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
          redirect('admin/dashboard');
      }
      if ($_POST) {
		    $this->form_validation->set_rules('empid', 'Approving Authority', 'required|is_unique[travel_authorities.user_id]');
        if ($this->form_validation->run() == FALSE) {
            $arrData['error']= "Already Exist!!  ".validation_errors();
        }else{
          if ($this->input->post('submit')) {
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $arrData["user_id"] = $this->input->post('empid');
            $name = $this->employee_model->get_employeename($this->input->post('empid'));
		        $arrData["created_date"] = $date;
		        $arrData["modified_date"] = $date;
            $insertedFlag = $this->traveldesk_model->save_authoritydetails($arrData);
				    if ($insertedFlag) {
              $this->session->set_flashdata('success', 'Approving Authority Details Added Successfully !!');
				      redirect('admin/approve_authority');
				    }
    				else{
    				  $this->session->set_flashdata('error', 'Failed to Add Approving Authority Details!!');
    				  redirect('admin/approve_authority/add');
    				}
				  }
        }
      }
  		else{
  		  $arrData['error']='';
		  }
		  $arrData['tab']=$this->uri->segment(2);
		  $arrData['middle'] = 'admin/travel_desk/approving_authority/add';
		  $this->load->view('admin/template', $arrData);
    }

  /**
   * delete
   *
   * This help to delete Authority For approving travel tickets Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
    public function delete($icategoryId) {
        if(!check_priviledges()){
    		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');
        }
		$delete = $this->traveldesk_model->delete_authority($icategoryId);
		if ($delete)
		  $this->session->set_flashdata('success', 'Approving Authority Details Deleted Successfully !!');
		else
		  $this->session->set_flashdata('error', 'Failed to Delete Approving Authority Details!!');
		  redirect('admin/approve_authority');
    }

  /**
   * set status
   *
   * This help to publish Authority Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

    public function set_status($icategoryId) {
        $delete = $this->traveldesk_model->set_authority($icategoryId);
    }

   /**
   * unset status
   *
   * This help to unpublish Authority Details
   *
   * @author  Ketan Sangani
   * @access  public
    * @param $icategoryId
   * @return  void
   */
    public function unset_status($icategoryId) {
        $delete = $this->traveldesk_model->unset_authority($icategoryId);
    }
}
/* End of file approve_authority.php */
/* Location: ./application/controllers/admin/approve_authority.php */