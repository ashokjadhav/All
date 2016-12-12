<?php
/**
 * Sub_category Class
 *
 * @author Ketan Sangani
 * @package CI_Sub_category
 * @subpackage Controller
 *
 */
class Sub_category extends CI_Controller {

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
    $this->load->model('admin/sub_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display subcategory Details
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
      $multiDelete = $this->sub_category_model->multi_delete_subcategory($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Subcategories Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Subcategories !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/sub_category');
    }

    $arrData['subcategoryDetails'] = $this->sub_category_model->get_subcategory_details();
   $arrData['middle'] = 'admin/library/subcategory/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add subcategory Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
  public function add() {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {

      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
	  $arrData["category"]=$this->input->post('category');
      $arrData["sub_category"] = $this->input->post('subcategory');
		//$category = $this->input->post('name');
      $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->sub_category_model->save_subcategorydetails($arrData);
	  //var_dump($insertedFlag);exit;
            if ($insertedFlag) {

              $this->session->set_flashdata('success', 'subcategory Details Added Successfully !!');
              redirect('admin/sub_category');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add subcategory Details!!');
              redirect('admin/sub_category/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
	$arrData['categorydetails']=$this->sub_category_model->get_category_details();
    $arrData['middle'] = 'admin/library/subcategory/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit subcategory Details
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

      $subcategory_details = $this->sub_category_model->get_subcategory_details($icategoryId);

 if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $UpdateData["category"] = $this->input->post('category');
	  $UpdateData["sub_category"] = $this->input->post('subcategory');


      $date = date("Y-m-d H:i:s");
      $UpdateData["modified_date"] = $date;
     }


            $updateFlag = $this->sub_category_model->update_subcategory($icategoryId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'category Details Updated Successfully !!');
              redirect('admin/sub_category');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update category Details!!');
              redirect('admin/sub_category/edit/' . $icategoryId);
            }



    }
    else {
      $subcategory_details = $this->sub_category_model->get_subcategory_details($icategoryId);
      $arrData['subcategoryDetailsArr'] = $subcategory_details;
	  //var_dump($subcategory_details);exit;

    }
   $arrData['tab']=$this->uri->segment(2);
   $arrData['categorydetails']=$this->sub_category_model->get_category_details();
    $arrData['middle'] = 'admin/library/subcategory/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete subcategory Details
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
    $delete = $this->sub_category_model->delete_subcategory($icategoryId);
    if ($delete)
      $this->session->set_flashdata('success', 'subcategory Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete subcategory Details!!');
      redirect('admin/sub_category');
  }
  /**
   * set status
   *
   * This help to publish subcategory in library
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function set_status($icategoryId) {
    $delete = $this->sub_category_model->set_subcategory($icategoryId);

  }
   /**
   * unset status
   *
   * This help to unpublish subcategory in library
   *
   * @author  Ketan Sangani
   * @access  public
   * @param $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->sub_category_model->unset_subcategory($icategoryId);

  }
}