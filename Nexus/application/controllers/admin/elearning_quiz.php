<?php
/**
 * Elearning_quiz Class
 *
 * @author Ketan Sangani
 * @package CI_Elearning_quiz
 * @subpackage Controller
 *
 */
class Elearning_quiz extends CI_Controller {

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
    $this->load->model('admin/quiz_model');
	$this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/

}

  /**
     * index
     *
     * This help to display Questions of quiz Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @param $table
     * @return  void
     */
  public function index($table=null){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
  if ($this->input->post('delete')) {
      $multiDelete = $this->quiz_model->multi_delete_questions($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Quiz Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Quiz Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/elearning_quiz');
    }
if(empty($table))
		{
			$table = '1';
		}
		$arrData['table'] = $table;

    $arrData['questionsDetails'] = $this->quiz_model->get_questions_details($newsfeedId=0,$table);
    $arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['middle'] = 'admin/elearning/quiz/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Question Details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param $table
     * @return  void
     */
  public function add($table=null) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {

      if ($this->input->post('submit')) {



			 $date = date("Y-m-d H:i:s");
           $inserted_rightsFlag = true;
            //$arrData["session"] = $this->input->post('session');
			$arrData["question"] = $this->input->post('question');
			$arrData["categoryid"] = $table;
            $arrData["sub_category"] = $this->input->post('sub_category');
			$arrData["answer1"] = $this->input->post('answer1');
            $arrData["answer2"] = $this->input->post('answer2');
            $arrData["answer3"] = $this->input->post('answer3');
            $arrData["answer4"] = $this->input->post('answer4');
            $arrData["answer"] = $this->input->post('answer');
	        $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->quiz_model->save_questionsdetails($arrData);
      if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Quiz Details Added Successfully !!');
              redirect('admin/elearning_quiz');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Quiz Details!!');

              redirect('admin/elearning_quiz/add');
           }

      }


    }
    else{
      $arrData['error']='';
      }
	  if(empty($table))
		{
			$table = '1';
		}else{
		$table=$table;
		}

	  $arrData['table'] = $table;
	$arrData['subcategory'] = $this->quiz_model->get_subcategory_details($newsfeedId = 0,$table);

	//$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/quiz/add';
    $this->load->view('admin/template', $arrData);
  }



/**
   * edit
   *
   * This help to edit Question Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId,$table
   * @return  void
   */

  public function edit($iuserId,$table) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['questionsDetailsArr'] = "";
    if ($_POST) {

     $arrData['questionsDetails'] = $this->quiz_model->get_questions_details($iuserId,$table);
 if ($this->input->post('submit')) {


	 // passed validation proceed to post success logic


          $date = date("Y-m-d H:i:s");
		  $UpdateData["question"] = $this->input->post('question');
            $UpdateData["sub_category"] = $this->input->post('sub_category');
			$UpdateData["answer1"] = $this->input->post('answer1');
            $UpdateData["answer2"] = $this->input->post('answer2');
            $UpdateData["answer3"] = $this->input->post('answer3');
            $UpdateData["answer4"] = $this->input->post('answer4');
            $UpdateData["answer"] = $this->input->post('answer');

          $UpdateData["modified_date"] = $date;

           $updateFlag = $this->quiz_model->update_questions($iuserId,$table,$UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Quiz Details Updated Successfully !!');
              redirect('admin/elearning_quiz');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Quiz Details!!');
              redirect('admin/elearning_quiz/edit/' . $iuserId);
            }


        }

    }
    else {
      $policies_details = $this->quiz_model->get_questions_details($iuserId,$table);
      $arrData['questionsDetailsArr'] = $policies_details;

    }
	$arrData['table'] = $table;
	$arrData['subcategory'] = $this->quiz_model->get_subcategory_details($newsfeedId = 0,$table);
	//$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/quiz/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Question Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete($iuserId,$table){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->quiz_model->delete_questions($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Quiz Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Quiz Details!!');
      redirect('admin/elearning_quiz/index/'.$table);
  }

 /**
   * set status
   *
   * This help to publish Question Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId,$table
   * @return  void
   */

  public function set_status($icategoryId,$table) {
    $delete = $this->quiz_model->set_question($icategoryId,$table);

  }

   /**
   * unset status
   *
   * This help to unpublish Question Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId,$table
   * @return  void
   */
  public function unset_status($icategoryId,$table) {
    $delete = $this->quiz_model->unset_question($icategoryId,$table);

  }

}