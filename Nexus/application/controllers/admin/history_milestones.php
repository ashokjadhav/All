<?php
/**
 * History_milestones Class
 *
 * @author Ashok Jadhav
 * @package CI_history_milestones
 * @subpackage Controller
 *
 */

class history_milestones extends CI_Controller {

/**
 * __construct
 *
 * Calls parent constructor
 * @author Ashok Jadhav
 * @access public
 * @return void
 */
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/history_milestones_model');
  }

/**
 * index
 *
 * This help to display Milestones Details
 *
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */
  public function index(){
    if(!check_priviledges()){
      $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
      redirect('admin/dashboard');
    }
    $arrData['tab']=$this->uri->segment(2);
    if ($this->input->post('delete')) {
        $multiDelete = $this->history_milestones_model->multi_delete_milestones($this->input->post('delete'));
        if ($multiDelete)
            $this->session->set_flashdata('success', 'Milestones Deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to Delete Milestones !!');
          // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
          // To avoid this we are redirecting it.
    redirect('admin/history_milestones');
    }
    $arrData['milestonesDetails'] = $this->history_milestones_model->get_milestones_details();
    $arrData['middle'] = 'admin/history_milestones/list';
    $this->load->view('admin/template', $arrData);
  }

/**
 * add
 *
 * This help to add milestones Details
 *
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */

  public function add() {
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
    }
    if ($_POST) {
      if ($this->input->post('submit')) {
        $date = date("Y-m-d H:i:s");
        $inserted_rightsFlag = true;
        $arrData["description"] = $this->input->post('desc');
        $arrData["date"] = $this->input->post('don');
        $arrData["created_date"] = $date;
        $arrData["modified_date"] = $date;
        $insertedFlag = $this->history_milestones_model->save_milestonesdetails($arrData);
        if ($insertedFlag) {
          $this->session->set_flashdata('success', 'Milestones Details Added Successfully !!');
          redirect('admin/history_milestones');
        }
        else{
          $this->session->set_flashdata('error', 'Failed to Add Milestones Details!!');
          redirect('admin/history_milestones/add');
        }
      }
    }
    else{
      $arrData['error']='';
    }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/history_milestones/add';
    $this->load->view('admin/template', $arrData);
  }

/**
 * edit
 *
 * This help to edit Milestones Details
 *
 * @author  Ashok jadhav
 * @access  public
 * @param integer $iuserId
 * @return  void
 */

  public function edit($iuserId) {
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
    }
    $arrData['milestonesDetailsArr'] = "";
    if ($_POST) {
      $noticeboard_details = $this->history_milestones_model->get_milestones_details($iuserId);
      if ($this->input->post('submit')) {
        $date = date("Y-m-d H:i:s");
        $UpdateData["description"] = $this->input->post('desc');
        $UpdateData["date"] = $this->input->post('don');
        $UpdateData["modified_date"] = $date;
        $updateFlag = $this->history_milestones_model->update_milestones($iuserId, $UpdateData);
        if ($updateFlag) {
            $this->session->set_flashdata('success', 'Milestones Details Updated Successfully !!');
            redirect('admin/history_milestones');
        }
        else{
            $this->session->set_flashdata('error', 'Failed to Update Milestones Details!!');
            redirect('admin/history_milestones/edit/' . $iuserId);
        }
      }
    }
    else {
      $noticeboard_details = $this->history_milestones_model->get_milestones_details($iuserId);
      $arrData['milestonesDetailsArr'] = $noticeboard_details;
    }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/history_milestones/edit';
    $this->load->view('admin/template', $arrData);
  }

/**
 * ckupload
 *
 * This help to upload by ckeditor  for Milestones Details
 *
 * @author  Ashok Jadhav
 * @access  public
 * @return  void
 */

  function ckupload(){
    $time = time();
    $url = './design/ckeditor/uploads/' . $time . "_" . $_FILES['upload']['name'];
    $furl = 'http' . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $fdata = explode('ckupload.php', $furl);

    //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name']))) {
        $message = "No file uploaded.";
    } else if ($_FILES['upload']["size"] == 0) {
        $message = "The file is of zero length.";
    } else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png")) {
        $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
    } else if (!is_uploaded_file($_FILES['upload']["tmp_name"])) {
        $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    } else {
        $message = "";
        $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
        if (!$move) {
            $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
        }
        //$url = $fdata[0]."uploads/" . $time."_".$_FILES['upload']['name'];
        $url = base_url() . "design/ckeditor/uploads/" . $time . "_" . $_FILES['upload']['name'];
    }

    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
  }

/**
 * delete
 *
 * This help to delete milestones Details
 *
 * @author  Ashok Jadhav
 * @access  public
 * @param integer $iuserId
 * @return  void
 */
  public function delete($iuserId) {
  if(!check_priviledges()){
    $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
    redirect('admin/dashboard');}
    $delete = $this->history_milestones_model->delete_milestones($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Milestones Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Milestones Details!!');
    redirect('admin/history_milestones');
  }

  
/**
 * set status
 *
 * This help to publish milestones Details
 *
 * @author  Ashok Jadhav
 * @access  public
 * @param integer $icategoryId
 * @return  void
 */

  public function set_status($icategoryId) {
    $delete = $this->history_milestones_model->set_milestones($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish milestones Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param integer $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->history_milestones_model->unset_milestones($icategoryId);

  }
}
