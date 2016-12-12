<?php
/**
 * what_is_on Class
 *
 * @author ketan sangani
 * @package CI_what_is_on
 * @subpackage Controller
 *
 */
class what_is_on extends CI_Controller {

/**
 * construct
 *
 * constructor method (checks login status)
 * @author ketan sangani
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
    $this->load->model('admin/what_is_on_model');

  }

/**
 * index
 *
 * This help to display events Details
 *
 * @author  ketan sangani
 * @access  public
 * @return  void
 */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
	if ($this->input->post('delete')) {
      $multiDelete = $this->what_is_on_model->multi_delete_what_is_on($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Events Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Events !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/what_is_on');
    }

    $arrData['what_is_onDetails'] = $this->what_is_on_model->get_what_is_on_details();
   $arrData['middle'] = 'admin/what-is-on-today/what_is_on';
    $this->load->view('admin/template', $arrData);
  }

 /**
     * add
     *
     * This help to add new event Details
     *
     * @author  ketan sangani
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
          $config['upload_path'] = './public/images/Events/';

          $config['max-size'] = 2000;
          $config['overwrite'] = TRUE;
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_width'] = 5000;
          $config['max_height'] = 5000;
          $this->load->library('upload', $config);
		   $date = date("Y-m-d H:i:s");

            $inserted_rightsFlag = true;
            $arrData["from_date"] = $this->input->post('date');
			$arrData["to_date"] = $this->input->post('todate');
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
            $config['source_image'] = './public/images/Events/'.$_FILES['logo']['name'];
            $config['new_image'] ='./public/images/Events/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 168;
            $config['height'] = 218;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $arrData["img"] = $data['file_name'];
            $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }

            $insertedFlag = $this->what_is_on_model->save_what_is_ondetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Event Details Added Successfully !!');
              redirect('admin/what_is_on');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Event Details!!');
              redirect('admin/what_is_on/add');
            }
          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/what-is-on-today/add';
    $this->load->view('admin/template', $arrData);
  }
 /**
     * edit
     *
     * This help to edit event Details
     *
     * @author  ketan sangani
     * @access  public
	 * @param   $iuserId
     * @return  void
     */
  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['what_is_onDetailsArr'] = "";
    if ($_POST) {

      $what_is_on_details = $this->what_is_on_model->get_what_is_on_details($iuserId);
 if ($this->input->post('submit')) {
	 $config=array();
          $config['upload_path'] = './public/images/Events/';
          $config['max-size'] = 2000;
          $config['overwrite'] = TRUE;
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          
          $this->load->library('upload', $config);

          $date = date("Y-m-d H:i:s");
           $UpdateData["from_date"] = $this->input->post('date');
           $UpdateData["to_date"] = $this->input->post('todate');
			$UpdateData["description"] = $this->input->post('desc');

          $UpdateData["modified_date"] = $date;
		  $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './public/images/Events/'.$_FILES['logo']['name'];
            $config['new_image'] = './public/images/Events/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 168;
            $config['height'] = 218;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $UpdateData["img"] = $data['file_name'];
            $UpdateData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }



            $updateFlag = $this->what_is_on_model->update_what_is_on($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Event Details Updated Successfully !!');
              redirect('admin/what_is_on');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Event Details!!');
              redirect('admin/what_is_on/edit/' . $iuserId);
            }

        }

    }
    else {
      $what_is_on_details = $this->what_is_on_model->get_what_is_on_details($iuserId);
      $arrData['what_is_onDetailsArr'] = $what_is_on_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/what-is-on-today/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
     * delete
     *
     * This help to delete event Details
     *
     * @author  ketan sangani
     * @access  public
	 * @param   $iuserId
     * @return  void
     */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->what_is_on_model->delete_what_is_on($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Event Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Event Details!!');
      redirect('admin/what_is_on');
  }
    /**
   * set status
   *
   * This help to publish event Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->what_is_on_model->set_event($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish event Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->what_is_on_model->unset_event($icategoryId);

  }
}