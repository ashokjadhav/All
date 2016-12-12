<?php
/**
 * Branding_template Class
 *
 * @author Ashok Jadhav
 * @package CI_Branding_template
 * @subpackage Controller
 *
 */
class Branding_template extends CI_Controller {

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
    $this->load->model('admin/branding_template_model');
  }

 /**
     * index
     *
     * displays index page of branding templates
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
  public function index(){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
		$arrData['tab']=$this->uri->segment(2);
		if ($this->input->post('delete')) {
		  $multiDelete = $this->branding_template_model->multi_delete_branding($this->input->post('delete'));
		  if ($multiDelete)
			$this->session->set_flashdata('success', 'Branding Templates Deleted Successfully !!');
		  else
			$this->session->set_flashdata('error', 'Failed to Delete Branding Templates !!');
		  // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
		  // To avoid this we are redirecting it.
		  redirect('admin/branding_template');
		}

		$arrData['brandingDetails'] = $this->branding_template_model->get_branding_details();
	   $arrData['middle'] = 'admin/branding_template/branding';
		$this->load->view('admin/template', $arrData);
  }

  /**
     * add
     *
     * This help to add branding templates Details
     *
     * @author Ashok Jadhav
     * @access  public
	  * @param none
     * @return  void
     */
  public function add() {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

		if ($_POST) {

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
			  $inserted_rightsFlag = true;
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
				$config['new_image'] ='./Resize/';
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

				$insertedFlag = $this->branding_template_model->save_brandingdetails($arrData);
				if ($insertedFlag) {

				  $this->session->set_flashdata('success', 'Branding Template Details Added Successfully !!');
				  redirect('admin/branding_template');
				}
				else{
				  $this->session->set_flashdata('error', 'Failed to Add Branding Template Details!!');
				  redirect('admin/branding_template/add');
				}
			  }


		}
		else{
		  $arrData['error']='';
		  }
		  $arrData['tab']=$this->uri->segment(2);
		$arrData['middle'] = 'admin/branding_template/add';
		$this->load->view('admin/template', $arrData);
  }
/**
     * edit
     *
     * This help to edit branding templates Details
     *
     * @author Ashok Jadhav
     * @access  public
	  * @param none
     * @return  void
     */

  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['brandingDetailsArr'] = "";
    if ($_POST) {

      $thought_details = $this->branding_template_model->get_branding_details($iuserId);
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
           //$UpdateData["writer"] = $this->input->post('writer');
			//$UpdateData["description"] = $this->input->post('desc');

          $UpdateData["modified_date"] = $date;
		  $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('logo')){
            //$arrData['error'] = $this->upload->display_errors();

          }
          else{
            $data=$this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] ='./files/'.$_FILES['logo']['name'];
            $config['new_image'] ='./Resize/';
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



            $updateFlag = $this->branding_template_model->update_branding($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Branding template Details Updated Successfully !!');
              redirect('admin/branding_template');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Branding template Details!!');
              redirect('admin/branding_template/edit/' . $iuserId);
            }

        }

    }
    else {
      $branding_details = $this->branding_template_model->get_branding_details($iuserId);
      $arrData['brandingDetailsArr'] = $branding_details;

    }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/branding_template/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
     * delete
     *
     * This help to delete branding templates Details
     *
     * @author Ashok Jadhav
     * @access  public
	  * @param none
     * @return  void
     */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->branding_template_model->delete_branding($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Branding template Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Branding template Details!!');
      redirect('admin/branding_template');
  }
/**
   * set status
   *
   * This help to publish job openings Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->branding_template_model->set_brand($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish job openings Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->branding_template_model->unset_brand($icategoryId);

  }
}