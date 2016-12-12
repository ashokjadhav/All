<?php
/**
 * noticeboard Class
 *
 * @author Ashok Jadhav
 * @package CI_noticeboard
 * @subpackage Controller
 *
 */
class noticeboard extends CI_Controller {

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
    $this->load->model('admin/noticeboard_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display noticeboard Details
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
      $multiDelete = $this->noticeboard_model->multi_delete_noticeboard($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Notices Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Notices !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/noticeboard');
    }

    $arrData['noticeboardDetails'] = $this->noticeboard_model->get_noticeboard_details();
   $arrData['middle'] = 'admin/noticeboard/notice';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add noticeboard Details
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

            $date = date("Y-m-d H:i:s");

            $inserted_rightsFlag = true;
            $arrData["title"] = $this->input->post('title');
			$arrData["description"] = $this->input->post('desc');
			$arrData["from_date"] = $this->input->post('don');

          $arrData["to_date"] = $this->input->post('todate');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->noticeboard_model->save_noticeboarddetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Noticeboard Details Added Successfully !!');
              redirect('admin/noticeboard');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Noticeboard Details!!');
              redirect('admin/noticeboard/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/noticeboard/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit noticeboard Details
   *
   * @author  Ashok jadhav
   * @access  public
   * @param integer $id
   * @return  void
   */

  public function edit($iuserId) {
       if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['noticeboardDetailsArr'] = "";
    if ($_POST) {
		$noticeboard_details = $this->noticeboard_model->get_noticeboard_details($iuserId);
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$UpdateData["title"] = $this->input->post('title');
			$UpdateData["description"] = $this->input->post('desc');
			$UpdateData["from_date"] = $this->input->post('don');
			$UpdateData["to_date"] = $this->input->post('todate');
			$UpdateData["modified_date"] = $date;
			$updateFlag = $this->noticeboard_model->update_noticeboard($iuserId, $UpdateData);
			if ($updateFlag) {
              $this->session->set_flashdata('success', 'Noticeboard Details Updated Successfully !!');
              redirect('admin/noticeboard');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Noticeboardn Details!!');
              redirect('admin/noticeboard/edit/' . $iuserId);
            }
        }
    }
    else {
		$noticeboard_details = $this->noticeboard_model->get_noticeboard_details($iuserId);
		$arrData['noticeboardDetailsArr'] = $noticeboard_details;
	}
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/noticeboard/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
     * ckupload
     *
     * This help to upload by ckeditor  for Policy Details
     *
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */

  function ckupload()
	{
		$time = time();

        //echo $_SERVER['DOCUMENT_ROOT'];exit;
        //$url = '../../uploads/'.$time."_".$_FILES['upload']['name'];

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
            echo $url;
            //echo "<pre>";print_r($fdata);
            //exit;
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
   * This help to delete noticeboard Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->noticeboard_model->delete_noticeboard($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'noticeboard Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete noticeboard Details!!');
    redirect('admin/noticeboard');
  }
/**
   * set status
   *
   * This help to publish notice Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->noticeboard_model->set_notice($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish notice Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->noticeboard_model->unset_notice($icategoryId);

  }
}
/* End of file birthday.php */
/* Location: ./application/controllers/birthday.php */