<?php
/**
 * Team_leaders Class
 *
 * @author Ketan Sangani
 * @package CI_Team_leaders
 * @subpackage Controller
 *
 */
class Team_leaders extends CI_Controller {

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
    $this->load->model('admin/team_leaders_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Team_leaders Details
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
      $tl_id = $this->team_leaders_model->get_user_id($this->input->post('delete'));

       $multiDelete = $this->team_leaders_model->multi_delete_team_leaders($this->input->post('delete'));
      if ($multiDelete){
        foreach($tl_id as $tl){
          $userid=$tl['user_id'];
          $id=$tl['id'];
         $this->db->query("UPDATE employees SET tl_id = '0' WHERE id ='$userid' ");
         $this->db->query("UPDATE employees SET tl_id = '0' WHERE tl_id ='$id'");
        }
        $this->session->set_flashdata('success', 'Team Leaders Deleted Successfully !!');
      }
    else{
        $this->session->set_flashdata('error', 'Failed to Delete Team Leaders !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/team_leaders');
    }
    }

   $arrData['tlDetails'] = $this->team_leaders_model->get_team_leaders_details();
   //var_dump($arrData['tlDetails']);exit;
   foreach($arrData['tlDetails'] as $key=>$items){
    $arrData['tlDetails'][$key]['juniors']=$this->team_leaders_model->get_juniors_details($items['id']);

   }
   $arrData['middle'] = 'admin/team_leaders/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Team_leaders Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param none
     * @return  void
     */
  public function add(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {

      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
	  //$email = $this->input->post('name');
      $arrData["name"] = $this->input->post('name');
      $arrData["user_id"] = $this->input->post('empid');
      $id = $arrData["user_id"];
      //$arrData["user_id"] = $
      $arrData["username"] = $this->input->post('username');
        $arrData["password"] = md5($this->input->post('password'));
		//$category = $this->input->post('name');
      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->team_leaders_model->save_team_leaderdetails($arrData);
            if ($insertedFlag) {
			  $this->db->query("UPDATE employees SET tl_id = '-1' WHERE id ='$id' ");
              $this->session->set_flashdata('success', 'Team Leader Details Added Successfully !!');
              redirect('admin/team_leaders');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Team Leader Details!!');
              redirect('admin/team_leaders/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/team_leaders/add';
    $this->load->view('admin/template', $arrData);
  }

  /**
   * delete
   *
   * This help to delete Team_leaders Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function delete($icategoryId,$userid) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->team_leaders_model->delete_team_leader($icategoryId);
    if ($delete){
        //$email = $this->team_leaders_model->get_wmailoftemaleader($icategoryId);
         $this->db->query("UPDATE employees SET tl_id = '0' WHERE id ='$userid' ");
         $this->db->query("UPDATE employees SET tl_id = '0' WHERE tl_id ='$icategoryId'");

      $this->session->set_flashdata('success', 'Team Leader Details Deleted Successfully !!');
      redirect('admin/team_leaders');
    }
    else{
      $this->session->set_flashdata('error', 'Failed to Delete Team Leader Details!!');
      redirect('admin/team_leaders');
    }
  }
   /**
   * set status
   *
   * This help to publish Team_leaders Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->team_leaders_model->set_team_leader($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Team_leaders Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->team_leaders_model->unset_team_leader($icategoryId);

  }
/**
     * add
     *
     * This help to add juniors to teamleaders Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param none
     * @return  void
     */

  public function add_juniors($id) {


    if ($_POST) {

      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
	  $employeename=$this->input->post('juniorname');
      $arrData["tl_id"] = $id;



      $insertedFlag = $this->team_leaders_model->update_employeesdetails($employeename,$arrData);
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Team Leader Assign to Employee successfully');
              redirect('admin/team_leaders');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Assign Team Leader to Employee!!');
              redirect('admin/team_leaders/add_juniors');
            }
          }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/team_leaders/add_juniors';
    $this->load->view('admin/template', $arrData);
  }

  /**
   * delete
   *
   * This help to delete junior Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function remove_junior($icategoryId) {
    $delete = $this->team_leaders_model->remove_junior($icategoryId);
    if ($delete){
      $this->session->set_flashdata('success', 'Junior Removed Successfully !!');
	redirect('admin/team_leaders');
	}
    else{
      $this->session->set_flashdata('error', 'Failed to Remove Junior!!');
      redirect('admin/team_leaders');}
  }

}