<?php
/**
 * Policies Class
 *
 * @author Ashok Jadhav
 * @package CI_Policies
 * @subpackage Controller
 *
 */
class It_policies extends CI_Controller {

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
    $this->load->model('admin/it_policies_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Policy Details
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
      $multiDelete = $this->it_policies_model->multi_delete_policies($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'IT Policies Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete IT Policies !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/it_policies');
    }

    $arrData['policiesDetails'] = $this->it_policies_model->get_policies_details();
   $arrData['middle'] = 'admin/it_policies/it_policies';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Policy Details
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

		 $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[policies.title]');
		$this->form_validation->set_rules('desc', 'Description', 'required');
	$this->form_validation->set_rules('status', 'Status', 'required');



		if ($this->form_validation->run() == True) // passed validation proceed to post success logic
		{
			 $date = date("Y-m-d H:i:s");
           $inserted_rightsFlag = true;
            //$arrData["session"] = $this->input->post('session');
			$arrData["title"] = $this->input->post('title');
			$arrData["desc"] = $this->input->post('desc');
			$arrData["status"] = $this->input->post('status');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->it_policies_model->save_policiesdetails($arrData);
      if ($insertedFlag) {

              $this->session->set_flashdata('success', 'IT Policy Details Added Successfully !!');
              redirect('admin/it_policies');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add IT Policy Details!!');

              redirect('admin/it_policies/add');
            }
		}
      }


    }
    else{
      $arrData['error']='';
      }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/it_policies/add';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * edit
   *
   * This help to edit policy Details
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

    $arrData['policiesDetailsArr'] = "";
    if ($_POST) {

      $policies_details = $this->it_policies_model->get_policies_details($iuserId);
 if ($this->input->post('submit')) {
	 $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]');
		$this->form_validation->set_rules('desc', 'Description', 'required');
	$this->form_validation->set_rules('status', 'Status', 'required');

		//$this->form_validation->set_error_delimiters('<label class="errors">', '</label>');
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == TRUE) // passed validation proceed to post success logic
		{

          $date = date("Y-m-d H:i:s");
           $UpdateData["status"] = $this->input->post('status');
		   $UpdateData["title"] = $this->input->post('title');
		  $UpdateData["desc"] = $this->input->post('desc');

          $UpdateData["modified_date"] = $date;

           $updateFlag = $this->it_policies_model->update_policies($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'IT Policy Details Updated Successfully !!');
              redirect('admin/it_policies');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update IT Policy Details!!');
              redirect('admin/it_policies/edit/' . $iuserId);
            }
		}

        }

    }
    else {
      $policies_details = $this->it_policies_model->get_policies_details($iuserId);
      $arrData['policiesDetailsArr'] = $policies_details;

    }
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/it_policies/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete policy Details
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
    $delete = $this->it_policies_model->delete_policies($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'IT Policy Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete IT Policy Details!!');
      redirect('admin/it_policies');
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




}