<?php
/**
 * Leadership Class
 *
 * @author Ketan Sangani
 * @package CI_Leadership
 * @subpackage Controller
 *
 */

class Leadership extends CI_Controller {

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
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
    if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/leadership_model');
	$this->load->model('admin/employee_model');
  }

  /**
     * index
     *
     * This help to display leaders Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
  public function index(){
	  $priv = $this->session->userdata('privileges');

	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);

	if ($this->input->post('delete')) {

      $multiDelete = $this->leadership_model->multi_delete_leaders($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Leaders Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Leaders !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/leadership');
		 }

    $arrData['leaderDetails'] = $this->leadership_model->get_leader_details();
	//var_dump($arrData['leaderDetails']);exit;
   $arrData['middle'] = 'admin/leadership/leadership';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add leader Details
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
		$this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[leaders.user_id]');
		if ($this->form_validation->run() == FALSE) {

			$arrData['error']= "Already Exist!!  ".validation_errors();
      }else{

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

			$arrData["user_id"] = $this->input->post('empid');
			$name = $this->employee_model->get_employeename($this->input->post('empid'));

			$arrData["post"] = $this->input->post('post');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
			 $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './files/'.$_FILES['logo']['name'];
            $config['new_image'] = './Resize/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 105;
            $config['height'] = 105;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $arrData["img"] = $data['file_name'];
            $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }

            $insertedFlag = $this->leadership_model->save_leaderdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Leader Details Added Successfully !!');
              redirect('admin/leadership');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add leader Details!!');
              redirect('admin/leadership/add');
            }
          }}


    }
    else{
      $arrData['error']='';
      }
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/leadership/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit leader Details
   *
   * @author  ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */

  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['leaderDetailsArr'] = "";
    if ($_POST) {

      $thought_details = $this->leadership_model->get_leader_details($iuserId);
		$arrData['leaderDetailsArr'] = $thought_details;
		if($arrData['leaderDetailsArr'][0]['user_id']!=$this->input->post('empid')){

			$this->form_validation->set_rules('empid', 'Employee Name', 'required|is_unique[leaders.user_id]');
			if ($this->form_validation->run() == FALSE) {
				$arrData['error']= "Already Exist!!  ".validation_errors();
			}
		}
else{
 if ($this->input->post('submit')) {
	 $config=array();
          $config['upload_path'] ='./files/';
          $config['max-size'] = 2000;
          $config['overwrite'] = TRUE;
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['max_width'] = 5000;
          $config['max_height'] = 5000;
          $this->load->library('upload', $config);

          $date = date("Y-m-d H:i:s");
		  $UpdateData["user_id"] = $this->input->post('empid');
		  $name = $this->employee_model->get_employeename($this->input->post('empid'));
		  $UpdateData["post"] = $this->input->post('post');
		  $UpdateData["modified_date"] = $date;
		  $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './files/'.$_FILES['logo']['name'];
            $config['new_image'] ='./Resize/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']  = 105;
            $config['height'] = 105;


            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            if($data['file_name']!=''){

            $UpdateData["img"] = $data['file_name'];
            $UpdateData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

			}
		  }



            $updateFlag = $this->leadership_model->update_leader($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Leader Details Updated Successfully !!');
              redirect('admin/leadership');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Leader Details!!');
              redirect('admin/leadership/edit/' . $iuserId);
            }

        }}

    }
    else {
      $leader_details = $this->leadership_model->get_leader_details($iuserId);
      $arrData['leaderDetailsArr'] = $leader_details;
	  $arrData['error']='';

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/leadership/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete leader Details
   *
   * @author  zchngs
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->leadership_model->delete_leader($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Leader Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Leader Details!!');
      redirect('admin/leadership');
  }
   /**
   * set status
   *
   * This help to publish leader Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->leadership_model->set_leader($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish leader Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->leadership_model->unset_leader($icategoryId);

  }
}