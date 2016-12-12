<?php
/**
 * category Class
 *
 * @author Ketan Sangani
 * @package CI_category
 * @subpackage Controller
 *
 */
class category extends CI_Controller {

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
    
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
        redirect('admin');
        break;
        }
        $this->load->model('admin/category_model');
	}

/**
 * index
 *
 * This help to display category Details
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
            $multiDelete = $this->category_model->multi_delete_category($this->input->post('delete'));
            if ($multiDelete)
            $this->session->set_flashdata('success', 'Categories Deleted Successfully !!');
            else
            $this->session->set_flashdata('error', 'Failed to Delete Categories !!');
            // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
            // To avoid this we are redirecting it.
            redirect('admin/category');
        }
        $arrData['categoryDetails'] = $this->category_model->get_category_details();
        $arrData['middle'] = 'admin/library/category/list';
        $this->load->view('admin/template', $arrData);
    }

/**
 * add
 *
 * This help to add categroy Details
 *
 * @author Ketan Sangani
 * @access  public
 * @param none
 * @return  void
 */
    public function add() {
	   if(!check_priviledges()){
	       $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}

        if ($_POST) {
            $data['categoryDetails'] = $this->category_model->get_category_name();
            $oneDimensionalArray = array_map('current', $data['categoryDetails']);
        if ($this->input->post('submit')) {
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
	        $category = $this->input->post('name');
            $category = explode(' ',$category);
	        $category = implode('_',$category);
	        if(in_array(strtolower($category), array_map('strtolower', $oneDimensionalArray))){
                $this->session->set_flashdata('error', 'Category with this name already exist');
                redirect('admin/category/add');
            }
            $arrData["name"] = $category;
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
            $insertedFlag = $this->category_model->save_categorydetails($arrData,$category);
            if ($insertedFlag) {
                $this->session->set_flashdata('success', 'Category Details Added Successfully !!');
                redirect('admin/category');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to Add Category Details!!');
                redirect('admin/category/add');
            }
        }
        }
        else{
            $arrData['error']='';
        }
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/library/category/add';
        $this->load->view('admin/template', $arrData);
    }

/**
     * edit
     *
     * This help to edit categroy Details
     *
     * @author Ketan Sangani
     * @access  public
	  * @param none
     * @return  void
     */
    public function edit($icategoryId) {
        if(!check_priviledges()){
	       $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
           redirect('admin/dashboard');}

        $arrData['categoryDetailsArr'] = "";
        if ($_POST) {
            $category_details = $this->category_model->get_category_details($icategoryId);
        if ($this->input->post('submit')) {
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $UpdateData["name"] = $this->input->post('name');
            $UpdateData["modified_date"] = $date;
            $updateFlag = $this->category_model->update_category($icategoryId, $UpdateData);
            if ($updateFlag) {
                $this->session->set_flashdata('success', 'Category Details Updated Successfully !!');
                redirect('admin/category');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to Update Category Details!!');
                redirect('admin/category/edit/' . $icategoryId);
            }
        }
        }
        else {
            $category_details = $this->category_model->get_category_details($icategoryId);
            $arrData['categoryDetailsArr'] = $category_details;
        }
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/library/category/edit';
        $this->load->view('admin/template', $arrData);
    }

  /**
   * delete
   *
   * This help to delete category Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
    public function delete($icategoryId,$name) {
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
        $delete = $this->category_model->delete_category($icategoryId,$name);
        if ($delete)
            $this->session->set_flashdata('success', 'Category Details Deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to Delete Category Details!!');
        redirect('admin/category');
    }

  /**
   * set status
   *
   * This help to publish category Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

    public function set_status($icategoryId) {
        $delete = $this->category_model->set_category($icategoryId);
    }

   /**
   * unset status
   *
   * This help to unpublish category Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
    public function unset_status($icategoryId) {
        $delete = $this->category_model->unset_category($icategoryId);
    }
}