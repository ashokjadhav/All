<?php
/**
 * jobopenings Class
 *
 * @author Ketan Sangani
 * @package CI_jobopenings
 * @subpackage Controller
 *
 */
class jobopenings extends CI_Controller {

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
    $this->load->model('admin/jobopenings_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display jobopenings Details
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
      $multiDelete = $this->jobopenings_model->multi_delete_jobopenings($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Job Opening Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Job Opening Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/jobopenings');
    }

    $arrData['jobopeningsDetails'] = $this->jobopenings_model->get_jobopenings_details();
   $arrData['middle'] = 'admin/jobopenings/job';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add jobopenings Details
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
			//$arrData["notice_date"] = $this->input->post('don');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->jobopenings_model->save_jobopeningsdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Job Opening Details Added Successfully !!');
              redirect('admin/jobopenings');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Job Opening Details!!');
              redirect('admin/jobopenings/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/jobopenings/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit jobopenings Details
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

    $arrData['jobopeningsDetailsArr'] = "";
    if ($_POST) {
		$jobopenings_details = $this->jobopenings_model->get_jobopenings_details($iuserId);
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$UpdateData["title"] = $this->input->post('title');
			$UpdateData["description"] = $this->input->post('desc');
			//$UpdateData["notice_date"] = $this->input->post('don');
			$UpdateData["modified_date"] = $date;
			$updateFlag = $this->jobopenings_model->update_jobopenings($iuserId, $UpdateData);
			if ($updateFlag) {
              $this->session->set_flashdata('success', 'Job Opening Details Updated Successfully !!');
              redirect('admin/jobopenings');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Job Opening Details!!');
              redirect('admin/jobopenings/edit/' . $iuserId);
            }
        }
    }
    else {
		$jobopenings_details = $this->jobopenings_model->get_jobopenings_details($iuserId);
		$arrData['jobopeningsDetailsArr'] = $jobopenings_details;
	}
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/jobopenings/edit';
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
   * This help to delete jobopenings Details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->jobopenings_model->delete_jobopenings($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Job Opening Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Job Opening Details!!');
    redirect('admin/jobopenings');
  }
   /**
   * set status
   *
   * This help to publish job openings Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->jobopenings_model->set_job($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish job openings Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->jobopenings_model->unset_job($icategoryId);

  }
}
/* End of file birthday.php */
/* Location: ./application/controllers/birthday.php */