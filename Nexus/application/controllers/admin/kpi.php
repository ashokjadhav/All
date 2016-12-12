<?php
/**
 * Kpi Class
 *
 * @author Ketan Sangani
 * @package CI_Kpi
 * @subpackage Controller
 *
 */
class Kpi extends CI_Controller {

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
    $this->load->model('admin/kpi_model');
    $this->load->model('admin/employee_model');

	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display Kpi Details
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
      $multiDelete = $this->kpi_model->multi_delete_kpis($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'KPIs Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete KPIs !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/kpi');
    }

    $arrData['kpisDetails'] = $this->kpi_model->get_kpis_details();
   $arrData['middle'] = 'admin/postings/kpi/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Kpi Details
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
            //$arrData["name"] = $this->input->post('name');
            $arrData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));

			$arrData["details"] = $this->input->post('details');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $insertedFlag = $this->kpi_model->save_kpidetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'KPI Details Added Successfully !!');
              redirect('admin/kpi');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add KPI Details!!');
              redirect('admin/kpi/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/kpi/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit Kpi Details
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

    $arrData['kpisDetailsArr'] = "";
    if ($_POST) {

      $medal_details = $this->kpi_model->get_kpis_details($iuserId);
 if ($this->input->post('submit')) {

          $date = date("Y-m-d H:i:s");
          $UpdateData["user_id"] = $this->input->post('empid');
      $name = $this->employee_model->get_employeename($this->input->post('empid'));
		   //$UpdateData["name"] = $this->input->post('name');

          //$UpdateData["subject"] = $this->input->post('subject');
		  $UpdateData["details"] = $this->input->post('details');

          $UpdateData["modified_date"] = $date;


            $updateFlag = $this->kpi_model->update_kpis($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'KPI Details Updated Successfully !!');
              redirect('admin/kpi');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update KPI Details!!');
              redirect('admin/kpi/edit/' . $iuserId);
            }

        }

    }
    else {
      $kras_details = $this->kpi_model->get_kpis_details($iuserId);
      $arrData['kpisDetailsArr'] = $kras_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/postings/kpi/edit';
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
   * This help to delete Kpi Details
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
    $delete = $this->kpi_model->delete_kpi($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'KPI Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete KPI Details!!');
      redirect('admin/kpi');
  }


  /**
   * set status
   *
   * This help to publish Kpi Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->kpi_model->set_kpi($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Kpi Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->kpi_model->unset_kpi($icategoryId);

  }
}