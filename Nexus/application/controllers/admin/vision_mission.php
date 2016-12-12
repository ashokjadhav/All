<?php
/**
 * Elearning_videos Class
 *
 * @author Ketan Sangani
 * @package CI_Elearning_videos
 * @subpackage Controller
 *
 */
class Vision_mission extends CI_Controller {

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
      $this->load->model('admin/vision_mission_model');
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
         redirect('admin/dashboard');
      }
      $arrData['tab']=$this->uri->segment(2);
      if ($this->input->post('delete')) {
         $multiDelete = $this->vision_mission_model->multi_delete_videos($this->input->post('delete'));
         if ($multiDelete)
            $this->session->set_flashdata('success', 'Videos Deleted Successfully !!');
         else
            $this->session->set_flashdata('error', 'Failed to Delete Videos !!');
         redirect('admin/vision_mission');
      }  
   
      $arrData['videosDetails'] = $this->vision_mission_model->get_videos_details();
      $arrData['middle'] = 'admin/vision_mission/list';
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
         redirect('admin/dashboard');
      }
      if ($_POST) {
         if ($this->input->post('submit')) {
         $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[elearning_videos.title]');
            if ($this->form_validation->run() == True){
               $config=array();
               $config['upload_path'] ='./files/videos/';
               $config['overwrite'] = TRUE;
               $config['allowed_types'] = 'mp4';
               $config['remove_spaces'] = TRUE;
               $this->load->library('upload', $config);
               $date = date("Y-m-d H:i:s");
               $inserted_rightsFlag = true;
               $arrData["title"] = $this->input->post('title');
               $arrData["created_date"] = $date;
	            $this->upload->initialize($config);
      		   if ( ! $this->upload->do_upload('video')){
      			   $error = $this->upload->display_errors();
      			   $this->session->set_flashdata('error', $error);
      			   redirect('admin/vision_mission/add');
               }
		         else{
                  $data=$this->upload->data();
                  if($data['file_name']!=''){
                     $arrData["file_name"] = $data['file_name'];
                  }
               }
		      }
   		   $insertedFlag = $this->vision_mission_model->save_videodetails($arrData);
            if ($insertedFlag) {
               $this->session->set_flashdata('success', 'Video Details Added Successfully !!');
               redirect('admin/vision_mission');
            }
            else{
               $this->session->set_flashdata('error', 'Failed to Add Video Details!!');
               redirect('admin/vision_mission/add');
            }
         }
      }
      else{
         $arrData['error']='';
      }
      $arrData['tab']=$this->uri->segment(2);
      $arrData['middle'] = 'admin/vision_mission/add';
      $this->load->view('admin/template', $arrData);
   }


  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->vision_mission_model->delete_videos($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Video Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Video Details!!');
      redirect('admin/vision_mission');
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
    $delete = $this->vision_mission_model->set_video($icategoryId);

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
    $delete = $this->vision_mission_model->unset_video($icategoryId);

  }
}
