<?php
/**
 * Elearning_category Class
 *
 * @author Ketan Sangani
 * @package CI_Elearning_category
 * @subpackage Controller
 *
 */
class Elearning_category extends CI_Controller {

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
   if($this->session->userdata('logged_in') == FALSE){
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display elearning category Details
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
      $multiDelete = $this->elearning_category_model->multi_delete_category($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Categories Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Categories !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/elearning_category');
    }
    $arrData['categoryDetails'] = $this->elearning_category_model->get_category_details();
   $arrData['middle'] = 'admin/elearning/category/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add elearning categroy Details
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
		$this->form_validation->set_rules('name', 'Category', 'required|is_unique[elearning_category.name]');
		if ($this->form_validation->run() == FALSE) {

			$arrData['error']= "Already Exist!!  ".validation_errors();
      }else{


      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $arrData["name"] = rtrim($this->input->post('name'));
		$category = rtrim($this->input->post('name'));
      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->elearning_category_model->save_categorydetails($arrData,$category);
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Category Details Added Successfully !!');
              redirect('admin/elearning_category');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Category Details!!');
              redirect('admin/elearning_category/add');
            }
          }}


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/category/add';
    $this->load->view('admin/template', $arrData);
  }
/**
     * edit
     *
     * This help to edit elearning categroy Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param $icategoryId
     * @return  void
     */
  public function edit($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['categoryDetailsArr'] = "";
    if ($_POST){

      $category_details = $this->elearning_category_model->get_category_details($icategoryId);
	  $arrData['categoryDetailsArr'] = $category_details;
			if($arrData['categoryDetailsArr'][0]['name']!=$this->input->post('name')){
				$this->form_validation->set_rules('name', 'Category', 'required|is_unique[elearning_category.name]');
				if ($this->form_validation->run() == FALSE) {
					$arrData['error']= "Already Exist!!  ".validation_errors();
				}
			}
			else{


 if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $UpdateData["name"] =rtrim($this->input->post('name'));

      $date = date("Y-m-d H:i:s");
      $UpdateData["modified_date"] = $date;
     }}


            $updateFlag = $this->elearning_category_model->update_category($icategoryId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Category Details Updated Successfully !!');
              redirect('admin/elearning_category');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Category Details!!');
              redirect('admin/elearning_category/edit/' . $icategoryId);
            }



    }
    else {
      $category_details = $this->elearning_category_model->get_category_details($icategoryId);
      $arrData['categoryDetailsArr'] = $category_details;
	   $arrData['error']='';

    }
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/category/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete elearning Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function delete($icategoryId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->elearning_category_model->delete_category($icategoryId);
    if ($delete)
      $this->session->set_flashdata('success', 'Category Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Category Details!!');
      redirect('admin/elearning_category');
  }
  /**
   * set status
   *
   * This help to publish elearning category Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->elearning_category_model->set_category($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish elearning category Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->elearning_category_model->unset_category($icategoryId);

  }

}