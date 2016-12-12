<?php
/**
 * Elearning_videos Class
 *
 * @author Ketan Sangani
 * @package CI_Elearning_videos
 * @subpackage Controller
 *
 */
class Elearning_videos extends CI_Controller {

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
    $this->load->model('admin/videos_model');
    $this->load->model('admin/elearning_category_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/

  }

   /**
     * index
     *
     * This help to display Videos Detail for elearning
     *
     * @author  Ketan Sangani
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
      $multiDelete = $this->videos_model->multi_delete_videos($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Videos Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Videos !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/elearning_videos');
    }

    $arrData['videosDetails'] = $this->videos_model->get_videos_details();
   $arrData['middle'] = 'admin/elearning/videos/video';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add Videos for elearning
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
  public function add(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
   if ($_POST) {

      if ($this->input->post('submit')) {

		 $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[elearning_videos.title]');

		if ($this->form_validation->run() == True) // passed validation proceed to post success logic
		{

	     $config=array();
         $config['upload_path'] ='./files/videos/';
		 $config['overwrite'] = TRUE;
         $config['allowed_types'] = 'mp4';
         $config['remove_spaces'] = TRUE;
         $this->load->library('upload', $config);
		 $date = date("Y-m-d H:i:s");
         $inserted_rightsFlag = true;
         $arrData["title"] = $this->input->post('title');
		 $arrData["categoryid"] = $this->input->post('category');
		 $arrData["sub_category"] = $this->input->post('sub_category');
         $arrData["created_date"] = $date;
		 $arrData["type"] = $this->input->post('type');
		 $copyrights = $this->input->post('copyrights');
		 if($copyrights=='on'){
		  $arrData["copyrights"] = 1;
		 }else{
		  $arrData["copyrights"] = 0;
		 }

		 if($arrData["type"]=='Upload'){
         $this->upload->initialize($config);
		 if ( ! $this->upload->do_upload('video')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('admin/elearning_videos/add');

		}
		 else{
         $data=$this->upload->data();
		 if($data['file_name']!=''){

            $arrData["file_name"] = $data['file_name'];

			}

		  }
		 }
		 else{
		 $arrData["code"] = $this->input->post('code');
		 }
       $insertedFlag = $this->videos_model->save_videodetails($arrData);
      if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Video Details Added Successfully !!');
              redirect('admin/elearning_videos');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Video Details!!');

              redirect('admin/elearning_videos/add');
            }
		}
      }


    }
    else{
      $arrData['error']='';
      }
	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/videos/add';
    $this->load->view('admin/template', $arrData);
  }

/**
     * edit
     *
     * This help to edit Videos for elearning
     *
     * @author Ketan Sangani
     * @access  public
	 * @param $icategoryId
     * @return  void
     */
public function edit($icategoryId) {
	if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['videoDetailsArr'] = "";
    if ($_POST){

      $video_details = $this->videos_model->get_videos_details($icategoryId);


 if ($this->input->post('submit')) {

     $config=array();
         $config['upload_path'] ='./files/videos/';
     $config['overwrite'] = TRUE;
         $config['allowed_types'] = 'mp4';
         $config['remove_spaces'] = TRUE;
         $this->load->library('upload', $config);
     $date = date("Y-m-d H:i:s");
         $inserted_rightsFlag = true;
         $UpdateData["title"] = $this->input->post('title');
     $UpdateData["categoryid"] = $this->input->post('category');
     $UpdateData["sub_category"] = $this->input->post('sub_category');
         $UpdateData["modified_date"] = $date;
     $UpdateData["type"] = $this->input->post('type');

     $copyrights = $this->input->post('copyrights');
     if($copyrights=='on'){
      $UpdateData["copyrights"] = 1;
     }else{
      $UpdateData["copyrights"] = 0;
     }

     if($UpdateData["type"]=='Upload'){
         $this->upload->initialize($config);
     if ( ! $this->upload->do_upload('video')){
      $error = $this->upload->display_errors();
      $this->session->set_flashdata('error', $error);
      redirect('admin/elearning_videos/edit/'.$icategoryId);

    }
     else{
         $data=$this->upload->data();
     if($data['file_name']!=''){

            $UpdateData["file_name"] = $data['file_name'];

      }

      }
     }
     else{
     $UpdateData["code"] = $this->input->post('code');
     }
	 //var_dump($UpdateData["type"]);exit;
       $insertedFlag = $this->videos_model->update_video($icategoryId, $UpdateData);
      if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Video Details Updated Successfully !!');
              redirect('admin/elearning_videos');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Video Details!!');

              redirect('admin/elearning_videos/edit/'.$icategoryId);
            }


    }}
    else {
      $video_details = $this->videos_model->get_videos_details($icategoryId);
      $arrData['videoDetailsArr'] = $video_details;

    }
   $arrData['tab']=$this->uri->segment(2);
   $arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
    $arrData['middle'] = 'admin/elearning/videos/edit';
    $this->load->view('admin/template', $arrData);

}
  /**
   * delete
   *
   * This help to delete Videos Details for elearning
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
    $delete = $this->videos_model->delete_videos($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Video Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Video Details!!');
      redirect('admin/elearning_videos');
  }
/**
   * set status
   *
   * This help to publish Videos for elearning
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->videos_model->set_video($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Videos for elearning
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->videos_model->unset_video($icategoryId);

  }
}
