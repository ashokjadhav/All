<?php
/**
 * Quiz_subcategory Class
 *
 * @author Ketan Sangani
 * @package CI_Quiz_subcategory
 * @subpackage Controller
 *
 */
class Quiz_subcategory extends CI_Controller {

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
     * This help to display different Quizes Details
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
      $multiDelete = $this->quiz_model->multi_delete_subcategory($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Subcategories Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Subcategories !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/quiz_subcategory');
    }

    $arrData['subcategoryDetails'] = $this->quiz_model->get_subcategory_details();
   $arrData['middle'] = 'admin/elearning/quiz_subcategory/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add quiz subcategory Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
 public function add(){
	 if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
       if ($_POST) {
		   $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|is_unique[quiz_subcategory.sub_category]');
		    if ($this->form_validation->run() == FALSE) {
         $arrData['error'] = 'This Quiz Subcategory Name Aleready Exist !!';
      }

    else{
          if ($this->input->post('submit')) {
           $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
	  $arrData["categoryid"]=$this->input->post('category');
      $arrData["sub_category"] = $this->input->post('subcategory');
		//$category = $this->input->post('name');
      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->quiz_model->save_subcategorydetails($arrData);
	  //var_dump($insertedFlag);exit;
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'subcategory Details Added Successfully !!');
              redirect('admin/quiz_subcategory');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add subcategory Details!!');
              redirect('admin/quiz_subcategory/add');
            }
          }
	}

    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
	$arrData['categorydetails']=$this->elearning_category_model->get_category_details();
    $arrData['middle'] = 'admin/elearning/quiz_subcategory/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit quiz subcategory Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function edit($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['subcategoryDetailsArr'] = "";
    if ($_POST) {

      $subcategory_details = $this->quiz_model->get_subcategory_details($icategoryId);

 if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $UpdateData["categoryid"] = $this->input->post('category');
	  $UpdateData["sub_category"] = $this->input->post('subcategory');


      $date = date("Y-m-d H:i:s");
      $UpdateData["modified_date"] = $date;
     }


            $updateFlag = $this->quiz_model->update_subcategory($icategoryId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'category Details Updated Successfully !!');
              redirect('admin/quiz_subcategory');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update category Details!!');
              redirect('admin/quiz_subcategory/edit/' . $icategoryId);
            }



    }
    else {
      $subcategory_details = $this->quiz_model->get_subcategory_details($icategoryId);
      $arrData['subcategoryDetailsArr'] = $subcategory_details;
	  //var_dump($subcategory_details);exit;

    }
   $arrData['tab']=$this->uri->segment(2);
   $arrData['categorydetails']=$this->elearning_category_model->get_category_details();
    $arrData['middle'] = 'admin/elearning/quiz_subcategory/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete quiz subcategory Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function delete($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->quiz_model->delete_subcategory($icategoryId);
    if ($delete)
      $this->session->set_flashdata('success', 'subcategory Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete subcategory Details!!');
      redirect('admin/quiz_subcategory');
  }
  /**
   * set_status
   *
   * This help to publish quiz subcategory Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function set_status($icategoryId) {
    $delete = $this->quiz_model->set_subcategory($icategoryId);

  }
   /**
   * unset_status
   *
   * This help to unpublish quiz subcategory Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->quiz_model->unset_subcategory($icategoryId);

  }
}