<?php
/**
 * Elearning_slides Class
 *
 * @author Ashok Jadhav
 * @package CI_Elearning_slides
 * @subpackage Controller
 *
 */
class Elearning_slides extends CI_Controller {

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
    $this->load->model('admin/slides_model');
    $this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/

  }

   /**
     * index
     *
     * This help to display PPT and PDF files Details for elearning
     *
     * @author  Ashok Jadhav
     * @access  public
	 * @param  none
     * @return  void
     */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);

	if ($this->input->post('delete')) {
      $multiDelete = $this->slides_model->multi_delete_slides($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Slides & Pdf Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Slides & Pdf Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/elearning_slides');
    }

    $arrData['slidesDetails'] = $this->slides_model->get_slides_details();
   $arrData['middle'] = 'admin/elearning/slides/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add PPT and PDF files Details for elearning
     *
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */
  public function add(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
   if ($_POST) {

      if ($this->input->post('submit')) {

		 $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[elearning_files.title]');

		if ($this->form_validation->run() == True) // passed validation proceed to post success logic
		{

	      $config=array();
          $config['upload_path'] = './files/ppt&pdf/';
          $config['overwrite'] = FALSE;
          $config['allowed_types'] = 'pdf|zip|doc|docx|ppt|pptx';
          $config['remove_spaces'] = TRUE;
          $this->load->library('upload', $config);
			 $date = date("Y-m-d H:i:s");
           $inserted_rightsFlag = true;
            //$arrData["session"] = $this->input->post('session');
			$arrData["title"] = $this->input->post('title');
			$arrData["categoryid"] = $this->input->post('category');
			$arrData["sub_category"] = $this->input->post('sub_category');

            $arrData["created_date"] = $date;
			$copyrights = $this->input->post('copyrights');
			if($copyrights=='on'){
		  $arrData["copyrights"] = 1;
		 }else{
		  $arrData["copyrights"] = 0;
		 }

           $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('slide')){
            //$arrData['error'] = $this->upload->display_errors();

          }
		  else{
         $data=$this->upload->data();
		 if($data['file_name']!=''){

            $arrData["file_name"] = $data['file_name'];

			}

		  }

            $insertedFlag = $this->slides_model->save_slidesdetails($arrData);
      if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Slides & Pdf Details Added Successfully !!');
              redirect('admin/elearning_slides');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Slides & Pdf Details!!');

              redirect('admin/elearning_slides/add');
            }
		}
      }


    }
    else{
      $arrData['error']='';
      }
	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/slides/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit PPT and PDF files Details for elearning
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */

  public function edit($iresource_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['slideDetailsArr'] = "";
    if ($_POST) {

      $slides_details = $this->slides_model->get_slides_details($iresource_managementId);


 if ($this->input->post('submit')) {

      $config=array();
          $config['upload_path'] = './files/ppt&pdf/';
          $config['overwrite'] = FALSE;
          $config['allowed_types'] = 'pdf|zip|doc|docx|ppt|pptx';
          $config['remove_spaces'] = TRUE;
          $this->load->library('upload', $config);
			 $date = date("Y-m-d H:i:s");
           $inserted_rightsFlag = true;
            //$arrData["session"] = $this->input->post('session');
			$UpdateData["title"] = $this->input->post('title');
			$UpdateData["categoryid"] = $this->input->post('category');
			$UpdateData["sub_category"] = $this->input->post('sub_category');

            $UpdateData["modified_date"] = $date;
			$copyrights = $this->input->post('copyrights');
			if($copyrights=='on'){
		  $UpdateData["copyrights"] = 1;
		 }else{
		  $UpdateData["copyrights"] = 0;
		 }

           $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('slide')){
            //$arrData['error'] = $this->upload->display_errors();

          }
		  else{
         $data=$this->upload->data();
		 if($data['file_name']!=''){

            $UpdateData["file_name"] = $data['file_name'];

			}

     }


            $updateFlag = $this->slides_model->update_slide($iresource_managementId,$UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Slides & Pdf Details Updated Successfully !!');
              redirect('admin/elearning_slides/');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Slides & Pdf Details!!');
              redirect('admin/elearning_slides/edit/' . $iresource_managementId);
            }



    }}
    else {
      $slides_details = $this->slides_model->get_slides_details($iresource_managementId);
      $arrData['slideDetailsArr'] = $slides_details;

    }
	 //$arrData['table'] = $table;
   $arrData['tab']=$this->uri->segment(2);
   $arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['middle'] = 'admin/elearning/slides/edit';
    $this->load->view('admin/template', $arrData);
  }

  /**
   * delete
   *
   * This help to delete PPT and PDF files Details for elearning
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
    $delete = $this->slides_model->delete_slide($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Slides & Pdf Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Slides & Pdf Details!!');
      redirect('admin/elearning_slides');
  }
 /**
   * set status
   *
   * This help to publish slides Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->slides_model->set_slide($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish slides Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->slides_model->unset_slide($icategoryId);

  }

}