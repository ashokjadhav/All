<?php 
class Faq extends CI_Controller {

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
    $this->load->model('admin/faq_model');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }
  

  /**
     * index
     *
     * This help to display FAqs Details
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
      $multiDelete = $this->faq_model->multi_delete_faqs($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'FAQs Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete FAQs !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/faq');
    }
    
    $arrData['faqDetails'] = $this->faq_model->get_faq_details();
   $arrData['middle'] = 'admin/faq/faq';
    $this->load->view('admin/template', $arrData);
  }
  
  /**
     * add
     *
     * This help to add jobopenings Details
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
   
            $date = date("Y-m-d H:i:s");
           
            $inserted_rightsFlag = true;
            $arrData["question"] = $this->input->post('question');
			$arrData["answer"] = $this->input->post('answer');
			//$arrData["notice_date"] = $this->input->post('don');

            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
             
            $insertedFlag = $this->faq_model->save_faqdetails($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'FAQs Details Added Successfully !!');
              redirect('admin/faq');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add FAQs Details!!');
              redirect('admin/faq/add');
            }
          }
         
      
    }
    else{
      $arrData['error']='';
      }
	 $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/faq/add';
    $this->load->view('admin/template', $arrData);
  }
/**
   * edit
   *
   * This help to edit jobopenings Details
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
	  
    $arrData['faqDetailsArr'] = "";
    if ($_POST) {
		$faq_details = $this->faq_model->get_faq_details($iuserId);
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$UpdateData["question"] = $this->input->post('question');
			$UpdateData["answer"] = $this->input->post('answer');
			//$UpdateData["notice_date"] = $this->input->post('don');
			$UpdateData["modified_date"] = $date;
			$updateFlag = $this->faq_model->update_faq($iuserId, $UpdateData);
			if ($updateFlag) {
              $this->session->set_flashdata('success', 'FAQs Details Updated Successfully !!');
              redirect('admin/faq');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update FAQs Details!!');
              redirect('admin/faq/edit/' . $iuserId);
            }
        }
    }
    else {
  		$faq_details = $this->faq_model->get_faq_details($iuserId);
  		$arrData['faqDetailsArr'] = $faq_details;
    }
    $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/faq/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete jobopenings Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function delete($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->faq_model->delete_faq($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'FAQ Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete FAQ Details!!');
    redirect('admin/faq');
  }
   /**
   * set status
   *
   * This help to publish faq Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->faq_model->set_faq($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish faq Details
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->faq_model->unset_faq($icategoryId);
   
  }
}
/* End of file birthday.php */
/* Location: ./application/controllers/birthday.php */