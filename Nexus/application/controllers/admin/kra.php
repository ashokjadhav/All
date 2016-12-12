<?php
/**
 * Kra Class
 *
 * @author Ketan Sangani
 * @package CI_Kra
 * @subpackage Controller
 *
 */
class Kra extends CI_Controller {

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
    $this->load->model('admin/kra_model');
    $this->load->model('admin/employee_model');

	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Kra Details
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
      $multiDelete = $this->kra_model->multi_delete_kras($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'KRAs Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete KRAs !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/kra');
    }

    $arrData['krasDetails'] = $this->kra_model->get_kras_details();
   $arrData['middle'] = 'admin/postings/kra/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Kra Details
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
            $arrData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
            //$arrData["name"] = $this->input->post('name');

			$arrData["details"] = $this->input->post('details');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
            //var_dump($arrData);exit;
            $insertedFlag = $this->kra_model->save_kradetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'KRA Details Added Successfully !!');
              redirect('admin/kra');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add KRA Details!!');
              redirect('admin/kra/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/kra/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit Kra Details
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

    $arrData['krasDetailsArr'] = "";
    if ($_POST) {

      $medal_details = $this->kra_model->get_kras_details($iuserId);
 if ($this->input->post('submit')) {

          $date = date("Y-m-d H:i:s");
          $UpdateData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
		   //$UpdateData["name"] = $this->input->post('name');

          //$UpdateData["subject"] = $this->input->post('subject');
		  $UpdateData["details"] = $this->input->post('details');

          $UpdateData["modified_date"] = $date;


            $updateFlag = $this->kra_model->update_kras($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'KRA Details Updated Successfully !!');
              redirect('admin/kra');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update KRA Details!!');
              redirect('admin/kra/edit/' . $iuserId);
            }

        }

    }
    else {
      $kras_details = $this->kra_model->get_kras_details($iuserId);
      $arrData['krasDetailsArr'] = $kras_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/kra/edit';
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
   * This help to delete Kra Details
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
    $delete = $this->kra_model->delete_kra($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'KRA Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete KRA Details!!');
      redirect('admin/kra');
  }


  /**
   * set status
   *
   * This help to publish Kra Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->kra_model->set_kras($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Kra Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->kra_model->unset_kras($icategoryId);

  }
}