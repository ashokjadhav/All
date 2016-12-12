<?php
/**
 * Utsav Class 
 *
 * @author Ashok Jadhav
 * @package CI_Utsav
 * @subpackage Controller
 *
 */
class Utsav extends CI_Controller {

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
    $this->load->model('admin/utsav_model');
	}

/**
 * index
 *
 * This help to display Utsav Details
 * 
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */
  public function index(){ 
	  if(!check_priviledges()){
		  $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
      redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
    if ($this->input->post('delete')) {
      $multiDelete = $this->utsav_model->multi_delete_utsav($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'utsav Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete utsav !!');
      redirect('admin/utsav');
    }
    $arrData['utsavDetails'] = $this->utsav_model->get_utsav_details();
    $arrData['middle'] = 'admin/utsav/list_utsav';
    $this->load->view('admin/template', $arrData);
  }
  
/**
 * add
 *
 * This help to add Utsav Details
 * 
 * @author  Ashok Jadhav
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
    	  $config['upload_path'] ='./utsav/';
    	  $config['max-size'] = 2000;
    	  $config['overwrite'] = TRUE;
    	  $config['allowed_types'] ='pdf|doc|docx';
    	  $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (! $this->upload->do_upload('upload')){
    	    $data=$this->upload->data();
    		  $error=$this->upload->display_errors();
    		  $this->session->set_flashdata('error', $error);
    		  redirect('admin/utsav/add');
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
      		$insertedFlag = $this->utsav_model->save_utsavdetails($arrData);
      		if ($insertedFlag) {

      		  $this->session->set_flashdata('success', 'utsav  Details Added Successfully !!');
      		  redirect('admin/utsav');
      		}
      		else{
      		  $this->session->set_flashdata('error', 'Failed to Add utsav Details!!');
      		  redirect('admin/utsav/add');
      		}
	      }
      }
    }
    else{
      $arrData['error']='';
    }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/utsav/add';
    $this->load->view('admin/template', $arrData);
  }

/**
 * edit
 *
 * This help to edit Utsav Details
 * 
 * @author  Ashok Jadhav
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
		  $hr_help_desk_details = $this->utsav_model->get_utsav_details($iuserId);
      if ($this->input->post('submit')) {
  		  $config=array();
  		  $config['upload_path'] ='./utsav/';
  		  $config['max_size'] = 2000;
  		  $config['overwrite'] = TRUE;
  		  $config['allowed_types'] ='pdf|doc|docx';
  		  $this->load->library('upload', $config);
  		  $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload')){}
  		  $data=$this->upload->data();
        $date = date("Y-m-d H:i:s");
        $UpdateData["name"] = $this->input->post('name');
  		  $UpdateData["modified_date"] = $date;
  		  if($data['file_name']!==''){
  		    $UpdateData["form"] = $data['file_name'];
  		  }
		    $updateFlag = $this->utsav_model->update_utsav($iuserId, $UpdateData);
        if ($updateFlag) {
          $this->session->set_flashdata('success', 'Utsav Details Updated Successfully !!');
          redirect('admin/utsav');
        }
        else{
          $this->session->set_flashdata('error', 'Failed to Update Utsav Details!!');
          redirect('admin/utsav/edit/' . $iuserId);
        }
      }
    }
    else {
      $hr_help_desk_details = $this->utsav_model->get_utsav_details($iuserId);
      $arrData['utsavDetailsArr'] = $hr_help_desk_details;
    }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/utsav/edit';
    $this->load->view('admin/template', $arrData);
  }

/**
 * delete
 *
 * This help to delete Utsav Details
 * 
 * @author  Ashok Jadhav
 * @access  public
 * @param   $iuserId
 * @return  void
 */
  public function delete($iuserId) {
    if(!check_priviledges()){
		  $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
      redirect('admin/dashboard');}
    $delete = $this->utsav_model->delete_hr($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Utsav Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Utsav Details!!');
    redirect('admin/utsav');
  }


/**
 * set status
 *
 * This help to publish Utsav Details
 * 
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */

  public function set_status($icategoryId) {
    $delete = $this->utsav_model->set_utsav($icategoryId);
  }

/**
 * unset status
 *
 * This help to unpublish Utsav Details
 * 
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */
  public function unset_status($icategoryId) {
    $delete = $this->utsav_model->unset_utsav($icategoryId);
  }

  /**
 * download
 *
 * This help to download pdfs
 * 
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */
  public function download($id) {
		//load the download helper
		
		//Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
		$arrData=$this->utsav_model->get_utsav_details($id);
		$data = file_get_contents("./utsav/".$arrData[0]['form']);
		
		//Read the file's contents
		$name = $arrData[0]['form'];

		//use this function to force the session/browser to download the file uploaded by the user 
		force_download($name, $data);
	}
}