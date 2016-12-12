<?php
/**
 * thought Class
 *
 * @author Ashok Jadhav
 * @package CI_thought
 * @subpackage Controller
 *
 */
class thought extends CI_Controller {

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
    $this->load->model('admin/thought_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display thoughts Details
     *
     * @author  Ashok jadhav
     * @access  public
     * @return  void
     */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
	if ($this->input->post('delete')) {
      $multiDelete = $this->thought_model->multi_delete_thought($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Thoughts Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Thoughts !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/thought');
    }

    $arrData['thoughtDetails'] = $this->thought_model->get_thought_details();
   $arrData['middle'] = 'admin/thought/todaysthought';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add thought Details
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
          $config['upload_path'] = './files/';

          $config['max-size'] = 2000;
          $config['overwrite'] = TRUE;
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_width'] = 5000;
          $config['max_height'] = 5000;
          $this->load->library('upload', $config);
		   $date = date("Y-m-d H:i:s");

            $inserted_rightsFlag = true;
            $arrData["writer"] = $this->input->post('writer');
			$arrData["description"] = $this->input->post('desc');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
			 $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] ='./files/'.$_FILES['logo']['name'];
            $config['new_image'] = './Resize/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 100;
            $config['height'] = 100;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $arrData["img"] = $data['file_name'];
            $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }

            $insertedFlag = $this->thought_model->save_thoughtdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'thought Details Added Successfully !!');
              redirect('admin/thought');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add thought Details!!');
              redirect('admin/thought/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/thought/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit thought Details
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

    $arrData['thoughtDetailsArr'] = "";
    if ($_POST) {

      $thought_details = $this->thought_model->get_thought_details($iuserId);
 if ($this->input->post('submit')) {
	 $config=array();
          $config['upload_path'] = './files/';
          $config['max-size'] = 2000;
          $config['overwrite'] = TRUE;
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_width'] = 5000;
          $config['max_height'] = 5000;
          $this->load->library('upload', $config);

          $date = date("Y-m-d H:i:s");
           $UpdateData["writer"] = $this->input->post('writer');
			$UpdateData["description"] = $this->input->post('desc');

          $UpdateData["modified_date"] = $date;
		  $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] ='./files/'.$_FILES['logo']['name'];
            $config['new_image'] = './Resize/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 100;
            $config['height'] = 100;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $UpdateData["img"] = $data['file_name'];
            $UpdateData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }



            $updateFlag = $this->thought_model->update_thought($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'thought Details Updated Successfully !!');
              redirect('admin/thought');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update thought Details!!');
              redirect('admin/thought/edit/' . $iuserId);
            }

        }

    }
    else {
      $thought_details = $this->thought_model->get_thought_details($iuserId);
      $arrData['thoughtDetailsArr'] = $thought_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/thought/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete thought Details
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
    $delete = $this->thought_model->delete_thought($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'thought Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete thought Details!!');
      redirect('admin/thought');
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
   * set status
   *
   * This help to publish thought of the day Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->thought_model->set_thought($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish thought of the day Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->thought_model->unset_thought($icategoryId);

  }
}