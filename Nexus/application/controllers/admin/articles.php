<?php
/**
 * Articles Class
 *
 * @author Ketan Sangani
 * @package CI_Articles
 * @subpackage Controller
 *
 */
class Articles extends CI_Controller {

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
    $this->load->model('admin/articles_model');
	$this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/


  }

  /**
     * index
     *
     * This help to display Articles Details
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
    			$multiDelete = $this->articles_model->multi_delete_articles($this->input->post('delete'));
    			if ($multiDelete)
                    $this->session->set_flashdata('success', 'Articles Deleted Successfully !!');
    			else
    			   $this->session->set_flashdata('error', 'Failed to Delete Articles !!');
			       // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
    			   // To avoid this we are redirecting it.
			    redirect('admin/articles');
			}
            $arrData['articlesDetails'] = $this->articles_model->get_articles_details();
	        $arrData['middle'] = 'admin/elearning/articles/list';
			$this->load->view('admin/template', $arrData);
      }

  /**
     * add
     *
     * This help to add Articles Details
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
            if ($this->input->post('submit')){
            $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[elearning_articles.title]');
    		$this->form_validation->set_rules('desc', 'Description', 'required');
            if ($this->form_validation->run() == True) // passed validation proceed to post success logic
    		{
    			$date = date("Y-m-d H:i:s");
                $inserted_rightsFlag = true;
                $arrData["title"] = $this->input->post('title');
    			$arrData["categoryid"] = $this->input->post('category');
    			$arrData["desc"] = $this->input->post('desc');
    	        $arrData["created_date"] = $date;
                $arrData["modified_date"] = $date;
                $insertedFlag = $this->articles_model->save_articlesdetails($arrData);
                if ($insertedFlag) {
                    $this->session->set_flashdata('success', 'Article Details Added Successfully !!');
                    redirect('admin/articles');
                }
                else{
                    $this->session->set_flashdata('error', 'Failed to Add Article Details!!');
                    redirect('admin/articles/add');
                }
    		}
            }
            else{
            
            }
        }
        else{
            $arrData['error']='';
        }
    	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/elearning/articles/add';
        $this->load->view('admin/template', $arrData);
    }

 /**
   * edit
   *
   * This help to edit Articles Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */

    public function edit($iuserId){
	   if(!check_priviledges()){
	        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}

        $arrData['articlesDetailsArr'] = "";
        if ($_POST) {
            $policies_details = $this->articles_model->get_articles_details($iuserId);
        if ($this->input->post('submit')){

    	    $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]');
    		$this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == TRUE) // passed validation proceed to post success logic
    		{
                $date = date("Y-m-d H:i:s");
    		    $UpdateData["title"] = $this->input->post('title');
    		    $UpdateData["categoryid"] = $this->input->post('category');
    		    $UpdateData["desc"] = $this->input->post('desc');
                $UpdateData["modified_date"] = $date;
                $updateFlag = $this->articles_model->update_articles($iuserId, $UpdateData);
                if ($updateFlag) {
                    $this->session->set_flashdata('success', 'Article Details Updated Successfully !!');
                    redirect('admin/articles');
                }
                else{
                    $this->session->set_flashdata('error', 'Failed to Update Article Details!!');
                    redirect('admin/articles/edit/' . $iuserId);
                }
    		}
        }
        }
        else {
            $policies_details = $this->articles_model->get_articles_details($iuserId);
            $arrData['articlesDetailsArr'] = $policies_details;
        }
    	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/elearning/articles/edit';
        $this->load->view('admin/template', $arrData);
    }


  /**
   * delete
   *
   * This help to delete Articles Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete($iuserId){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->articles_model->delete_articles($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Article Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Article Details!!');
      redirect('admin/articles');
  }

 /**
   * set status
   *
   * This help to publish Articles Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->articles_model->set_article($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Articles Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
    public function unset_status($icategoryId) {
        $delete = $this->articles_model->unset_article($icategoryId);
    }

/**
     * ckupload
     *
     * This help to upload by ckeditor  for Articles Details
     *
     * @author  Ketan Sangani
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