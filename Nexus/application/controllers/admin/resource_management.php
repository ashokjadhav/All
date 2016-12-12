<?php
/**
 * resource_management Class
 *
 * @author Ashok Jadhav
 * @package CI_resource_management
 * @subpackage Controller
 *
 */
class resource_management extends CI_Controller {

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
   /* if($this->session->resource_managementdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }*/
    $this->load->model('admin/resource_management_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/

  }

  /**
     * index
     *
     * This help to display resource_management Details
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
	if(empty($table))
		{
			$table = 'Book';
		}

  if ($this->input->post('delete')) {
      $multiDelete = $this->resource_management_model->multi_delete_resource_management($table,$this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'resource_Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete resource_managements !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/resource_management');
    }


		$arrData['table'] = $table;


    $arrData['resource_managementDetails'] = $this->resource_management_model->get_resource_management_details($newsfeedId=0,$table);
	$arrData['categoryDetails'] = $this->resource_management_model->get_category_details();
   $arrData['middle'] = 'admin/library/resource_management/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add resource_management Details
     *
     * @author  Ashok Jadhav
     * @access  public
	 * @param   $table
     * @return  void
     */
  public function add($table=null) {

	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {
	  $this->form_validation->set_rules('name', 'Resource Name', 'required|is_unique['.$table.'.name]');
		 $this->form_validation->set_rules('code','Code Number', 'required|is_unique['.$table.'.code]');
		 if ($this->form_validation->run() == FALSE) {
			$arrData['error']= validation_errors();
      }else{
      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $arrData["name"] = $this->input->post('name');
	  $arrData["sub_category"] = $this->input->post('sub_category');
      $arrData["author"] = $this->input->post('author');
      $arrData["publisher"] = $this->input->post('publisher');
      $arrData["price"] = $this->input->post('price');
      $arrData["dop"] = $this->input->post('dop');
      $arrData["code"] = $this->input->post('code');
	  $arrData["created_date"] = $date;
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->resource_management_model->save_resource_managementdetails($arrData,$table);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'resource_management Details Added Successfully !!');
              redirect('admin/resource_management/index/'.$table);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add resource_management Details!!');
             // redirect('admin/resource_management/add');
            }
          }}


    }
    else{
      $arrData['error']='';
      }
	  $arrData['table'] = $table;
    $arrData['tab']=$this->uri->segment(2);
	$arrData['subcategory']=$this->resource_management_model->get_subcategory($newsfeedId=0,$table);
    $arrData['middle'] = 'admin/library/resource_management/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit resource_management Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $table,$iresource_managementId
   * @return  void
   */

  public function edit($iresource_managementId,$table) {
	if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');
	}
	$arrData['resource_managementDetailsArr'] = "";
    if ($_POST) {
		$resource_management_details = $this->resource_management_model->get_resource_management_details($iresource_managementId,$table);
		if(($resource_management_details[0]['name']!=$this->input->post('name')) ||		(($resource_management_details[0]['code']!=$this->input->post('code')))){
			if($resource_management_details[0]['name']!=$this->input->post('name')){
				$this->form_validation->set_rules('name', 'Resource Name', 'required|is_unique['.$table.'.name]');
				if ($this->form_validation->run() == FALSE) {
					$arrData['error']= validation_errors();
				}
			}
			if($resource_management_details[0]['code']!=$this->input->post('code')){
				$this->form_validation->set_rules('code', 'Code Number', 'required|is_unique['.$table.'.code]');
				if ($this->form_validation->run() == FALSE) {
					$arrData['error']= validation_errors();
				}
			}
		}
		else if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$inserted_rightsFlag = true;
			$UpdateData["name"] = $this->input->post('name');
			$UpdateData["sub_category"] = $this->input->post('sub_category');
			$UpdateData["author"] = $this->input->post('author');
			$UpdateData["publisher"] = $this->input->post('publisher');
			$UpdateData["price"] = $this->input->post('price');
			$UpdateData["dop"] = $this->input->post('dop');
			$UpdateData["code"] = $this->input->post('code');
			$UpdateData["modified_date"] = $date;
			$updateFlag = $this->resource_management_model->update_resource_management($iresource_managementId,$table, $UpdateData);

				if ($updateFlag) {
					$this->session->set_flashdata('success', 'resource_management Details Updated Successfully !!');
					redirect('admin/resource_management/index/'.$table);
				}
				else{
					$this->session->set_flashdata('error', 'Failed to Update resource_management Details!!');
					redirect('admin/resource_management/edit/' . $iresource_managementId.'/'.$table);
				}

			}

		}
		else {
			$resource_management_details = $this->resource_management_model->get_resource_management_details($iresource_managementId,$table);
			
			$arrData['error']= '';
		}
		$arrData['table'] = $table;
		$arrData['resource_managementDetailsArr'] = $resource_management_details;
		$arrData['tab']=$this->uri->segment(2);
		$arrData['subcategory']=$this->resource_management_model->get_subcategory($newsfeedId=0,$table);
		$arrData['middle'] = 'admin/library/resource_management/edit';
		$this->load->view('admin/template', $arrData);
	}
  /**
   * delete
   *
   * This help to delete resource_management Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $table,$iresource_managementId
   * @return  void
   */
  public function delete($iresource_managementId,$table) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->resource_management_model->delete_resource_management($iresource_managementId,$table);
    if ($delete)
      $this->session->set_flashdata('success', 'resource_management Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete resource_management Details!!');
      redirect('admin/resource_management');
  }

/**
   * set_status
   *
   * This help to publish resource_management Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $table,$iresource_managementId
   * @return  void
   */
  public function set_status($iresource_managementId,$table) {
    $delete = $this->resource_management_model->set_resource_management($iresource_managementId,$table);

  }
  /**
   * unset_status
   *
   * This help to unpublish resource_management Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $table,$iresource_managementId
   * @return  void
   */
  public function unset_status($iresource_managementId,$table) {
    $delete = $this->resource_management_model->unset_resource_management($iresource_managementId,$table);

  }
}