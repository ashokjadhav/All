<?php
/**
 * group_companies Class 
 *
 * @author Ashok Jadhav
 * @package CI_group_companies
 * @subpackage Controller
 *
 */
class group_companies extends CI_Controller {

  /**
  * __construct
  *
  * Calls parent constructor
  * @author Ashok Jadhav
  * @access public
  * @return void
  */
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/group_companies_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display group_companies Details
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
      $multiDelete = $this->group_companies_model->multi_delete_group_companies($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Company Details Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Company Details !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/group_companies');
    }
    
    $arrData['group_companiesDetails'] = $this->group_companies_model->get_group_companies_details();
   $arrData['middle'] = 'admin/group_companies/group_companies';
    $this->load->view('admin/template', $arrData);
  }
  
  /**
     * add
     *
     * This help to add group_companies Details
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
            $config['upload_path'] = './public/images/company/';
            $config['max-size'] = 2000;
            $config['overwrite'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $this->load->library('upload', $config);

            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $arrData["name"] = $this->input->post('name');
			$arrData["contact"] = $this->input->post('contact');
			$arrData["desc"] = $this->input->post('desc');
			$arrData["address"] = $this->input->post('address');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('logo')){
                //$arrData['error'] = $this->upload->display_errors();

            }
            else{
                $data=$this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/images/company/'.$_FILES['logo']['name'];
                $config['new_image'] = './public/images/company/Resize/';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']  = 115;
                $config['height'] = 54;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if($data['file_name']!=''){

                $arrData["img"] = $data['file_name'];
                $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

                }
            }
                $insertedFlag = $this->group_companies_model->save_group_companiesdetails($arrData);
    			if ($insertedFlag) {

                  $this->session->set_flashdata('success', 'Company Details Added Successfully !!');
                  redirect('admin/group_companies');
                }
                else{
                  $this->session->set_flashdata('error', 'Failed to Add Company Details!!');
                  redirect('admin/group_companies/add');
                }
            }
         
      
        }
        else{
        $arrData['error']='';
        }
    	$arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/group_companies/add';
        $this->load->view('admin/template', $arrData);
    }
/**
   * edit
   *
   * This help to edit group_companies Details
   * 
   * @author  Ashok jadhav
   * @access  public
   * @param integer $id
   * @return  void
   */
   
  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
	  
    $arrData['group_companiesDetailsArr'] = "";
    if ($_POST) {
		$group_companies_details = $this->group_companies_model->get_group_companies_details($iuserId);
		if ($this->input->post('submit')) {

            $config=array();
            $config['upload_path'] ='./public/images/company/';
            $config['max-size'] = 2000;
            $config['overwrite'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $this->load->library('upload', $config);

			$date = date("Y-m-d H:i:s");
			$UpdateData["name"] = $this->input->post('name');
			$UpdateData["contact"] = $this->input->post('contact');
			$UpdateData["desc"] = $this->input->post('desc');
			$UpdateData["address"] = $this->input->post('address');
			$UpdateData["modified_date"] = $date;

            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('logo')){
                //$arrData['error'] = $this->upload->display_errors();
            }
            else{
                $data=$this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './public/images/company/'.$_FILES['logo']['name'];
                $config['new_image'] ='./public/images/company/Resize/';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']  = 115;
                $config['height'] = 54;
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if($data['file_name']!=''){

                    $UpdateData["img"] = $data['file_name'];
                    $UpdateData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];

                }
            }
			$updateFlag = $this->group_companies_model->update_group_companies($iuserId, $UpdateData);
			if ($updateFlag) {
              $this->session->set_flashdata('success', 'Company Details Updated Successfully !!');
              redirect('admin/group_companies');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Company Details!!');
              redirect('admin/group_companies/edit/' . $iuserId);
            }
        }
    }
    else {
		$group_companies_details = $this->group_companies_model->get_group_companies_details($iuserId);
		$arrData['group_companiesDetailsArr'] = $group_companies_details;
	}
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/group_companies/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete group_companies Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->group_companies_model->delete_group_companies($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Company Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Company Details!!');
    redirect('admin/group_companies');
  }
   /**
   * set status
   *
   * This help to publish company Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->group_companies_model->set_company($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish company Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->group_companies_model->unset_company($icategoryId);
   
  }

  
}
/* End of file birthday.php */
/* group_companies: ./application/controllers/birthday.php */