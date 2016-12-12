<?php
/**
 * Quiz_scores Class
 *
 * @author Ashok Jadhav
 * @package CI_Quiz_scores
 * @subpackage Controller
 *
 */
class Quiz_scores extends CI_Controller {
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
    $this->load->model('admin/quiz_model');
	$this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Quiz_scores Details
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
      $multiDelete = $this->quiz_model->multi_delete_scoresdetails($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Scores Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Scores Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/quiz_scores');
    }
    if(empty($table))
	{
			$table = '1';
		}
	else{
		$table=$table;
	}
    $arrData['scoresdetails'] = $this->quiz_model->get_scores_details($newsfeedId = 0,$table);

	//exit;
	$arrData['categoryDetails'] = $this->elearning_category_model->get_category_details();
	$arrData['table']=$table;
   $arrData['middle'] = 'admin/elearning/quiz_scores/list';
    $this->load->view('admin/template', $arrData);
  }


  /**
   * delete
   *
   * This help to delete Quiz_scores Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $ilending_managementId
   * @return  void
   */
  public function delete($ilending_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->quiz_model->delete_scoresdetails($ilending_managementId);
    if ($delete)
      $this->session->set_flashdata('success', 'Score Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Score Details!!');
      redirect('admin/quiz_scores');
  }
  /**
   * set_status
   *
   * This help to publish Quiz_scores Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */
  public function set_status($iresource_managementId) {
    $delete = $this->quiz_model->set_quiz_score($iresource_managementId);

  }
  /**
   * unset_status
   *
   * This help to unpublish Quiz_scores Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */
  public function unset_status($iresource_managementId) {
    $delete = $this->quiz_model->unset_quiz_score($iresource_managementId);

  }

}