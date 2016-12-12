<?php
/**
 * Hr_forms Class 
 *
 * @author Ketan Sangani
 * @package CI_Hr_forms
 * @subpackage Controller
 *
 */
class Hr_forms extends CI_Controller {

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
    $this->load->model('admin/hr_forms_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display HR Form  Details
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
      $multiDelete = $this->hr_forms_model->multi_delete_hr($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'HR Forms Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete HR Forms Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/hr_forms');
    }
    
    $arrData['hrhelpdeskDetails'] = $this->hr_forms_model->get_hr_details();
   $arrData['middle'] = 'admin/hr_forms/list_hr_forms';
    $this->load->view('admin/template', $arrData);
  }
  
  /**
     * add
     *
     * This help to add HR Form Details
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
		
	  $config=array();
	  $config['upload_path'] ='./HRforms/';
	  $config['max-size'] = 2000;
	  $config['overwrite'] = TRUE;
	  $config['allowed_types'] ='pdf|doc|docx';
	  $this->load->library('upload', $config);
      $this->upload->initialize($config);
	  if (! $this->upload->do_upload('upload')){
	    $data=$this->upload->data();
		$error=$this->upload->display_errors();
		$this->session->set_flashdata('error', $error);
		redirect('admin/hr_forms/add');
	  }
      else{
        $data=$this->upload->data();
		$date = date("Y-m-d H:i:s");
		$inserted_rightsFlag = true;
		$arrData["name"] = $this->input->post('name');
		$arrData["created_date"] = $date;
		$arrData["modified_date"] = $date;
		if($data['file_name']!==''){
			$arrData["form"] = $data['file_name'];
		}
		$insertedFlag = $this->hr_forms_model->save_hrdetails($arrData);
		if ($insertedFlag) {

		  $this->session->set_flashdata('success', 'HR Form  Details Added Successfully !!');
		  redirect('admin/hr_forms');
		}
		else{
		  $this->session->set_flashdata('error', 'Failed to Add HR Form Details!!');
		  redirect('admin/hr_forms/add');
		}
	  }
	 
	 }
    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/hr_forms/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit HR Form Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
   
 public function edit($iuserId) {
	 if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
	  
    $arrData['hrhelpDetailsArr'] = "";
    if ($_POST) {
		
    $hr_help_desk_details = $this->hr_forms_model->get_hr_details($iuserId);
	if ($this->input->post('submit')) {
		  $config=array();
		  $config['upload_path'] ='./HRforms/';
		  $config['max-size'] = 2000;
		  $config['overwrite'] = TRUE;
		  $config['allowed_types'] ='pdf|doc|docx';
		  $this->load->library('upload', $config);
		  $this->upload->initialize($config);
	     if (!$this->upload->do_upload('upload')){
			
		  }
		  $data=$this->upload->data();
          $date = date("Y-m-d H:i:s");
          $UpdateData["name"] = $this->input->post('name');
		  $UpdateData["modified_date"] = $date;
		  if($data['file_name']!==''){
			$UpdateData["form"] = $data['file_name'];
		}
		 
            $updateFlag = $this->hr_forms_model->update_hr($iuserId, $UpdateData);
			
            if ($updateFlag) {
              $this->session->set_flashdata('success', 'HR Form Details Updated Successfully !!');
              redirect('admin/hr_forms');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update HR Form Details!!');
              redirect('admin/hr_forms/edit/' . $iuserId);
            }
          
        }
      
    }
    else {
      $hr_help_desk_details = $this->hr_forms_model->get_hr_details($iuserId);
      $arrData['hrhelpDetailsArr'] = $hr_help_desk_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/hr_forms/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete HR Form Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
   public function delete($iuserId) {
	   if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->hr_forms_model->delete_hr($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'HR Form Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete HR Form Details!!');
      redirect('admin/hr_forms');
  }
 /**
   * set status
   *
   * This help to publish HR Form Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

   public function set_status($icategoryId) {
    $delete = $this->hr_forms_model->set_hr($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish HR Form Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
   public function unset_status($icategoryId) {
    $delete = $this->hr_forms_model->unset_hr($icategoryId);
   
  }
  public function download($id) {
		//load the download helper
		
		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$arrData=$this->hr_forms_model->get_hr_details($id);
		$data = file_get_contents("./HRforms/".$arrData[0]['form']);
		
		//Read the file's contents
		$name = $arrData[0]['form'];

		//use this function to force the session/browser to download the file uploaded by the user 
		force_download($name, $data);
	}
}