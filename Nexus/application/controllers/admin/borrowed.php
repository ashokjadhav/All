<?php
/**
 * Borrowed Class
 *
 * @author Ashok Jadhav
 * @package CI_Borrowed
 * @subpackage Controller
 *
 */
class Borrowed extends CI_Controller {

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
   /* if($this->session->lending_managementdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }*/
    $this->load->model('admin/borrow_model');
	$this->load->model('admin/return_model');
	$this->load->model('admin/lending_management_model');
	$this->load->model('admin/resource_management_model');
	$this->load->library('phpmailer');
	
  }

  /**
     * index
     *
     * This help to display borrowed Details items from library
     *
     * @author  Ashok Jadhav
     * @access  public
	 * @param $table(null)
     * @return  void
     */
    public function index($table=null){
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');
        }
		$arrData['tab']=$this->uri->segment(2);
        if ($this->input->post('delete')) {
            $multiDelete = $this->borrow_model->multi_delete_borrowed_management($this->input->post('delete'));
            if ($multiDelete)
                $this->session->set_flashdata('success', 'Borrow Details Deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to Delete Borrow Details !!');
            redirect('admin/borrowed');
        }
        if(empty($table)){$table = 'Book';}
        //Dispaly borrowed Records
        $arrData['borrowedDetails'] = $this->borrow_model->get_borrowed_details($newsfeedId = 0,$table);
    	$arrData['categoryDetails'] = $this->lending_management_model->get_category_details();
    	$arrData['table']=$table;
        $arrData['middle'] = 'admin/library/lending_management/borrow';
        $this->load->view('admin/template', $arrData);
    }


  /**
   * delete
   *
   * This help to delete borrowed Records
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param $ilending_managementId
   * @return  void
   */
    public function delete($ilending_managementId) {
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
        $delete = $this->lending_management_model->delete_lending_management($ilending_managementId);
        if ($delete)
            $this->session->set_flashdata('success', 'Borrow Details Deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to Delete Borrow Details!!');
        redirect('admin/lending_management');
    }
/**
   * return status
   *
   * This help to set return status for lending_management Details and also fine management
   *
   * @author Ashok Jadhav
   * @access  public
   * @return  void
   */

    public function set_status($iresource_managementId,$category,$resource_id) {
	//
    $result=$this->borrow_model->set_status($iresource_managementId,$category,$resource_id);
	//print_r($result[0]['Duration']);exit;
	//Calculate Fine
	if($result[0]['Duration']>14){
		$fine=($result[0]['Duration'] - 14)*50;
		$this->return_model->calculate_fine($fine,$result[0]['id']);
	}

	$details = $this->borrow_model->get_userid($category,$resource_id);
	if($details){
		$getemail = $this->borrow_model->get_emailid($details[0]['user_id']);
		$data['category'] = $details[0]['category'];
		$data['info']=$this->borrow_model->get_details($details[0]['category'],$details[0]['resource_id']);
		$mail = new PHPMailer();
		$mail->IsSMTP();        // set mailer to use SMTP
		$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Username = "nexus@carnivalcinemas.in";  // SMTP username
		$mail->Password = "nexus@123"; // SMTP password
		$mail->Port = 465;
		$mail->From = "nexus@carnivalcinemas.in";
		$mail->FromName = "Librarian";
		$mail->AddAddress($getemail[0]['email']);
		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->Subject = "Notification";
		$mail->Body   = $this->load->view('admin/details.php',$data,true);
		$mail->IsHTML(true);
		if(!$mail->Send())
		{
		$this->session->set_flashdata('error', 'Message Could Not Be Send!! ');
		redirect('admin/returned');
		}
		else{
				//echo "here ";
		$this->session->set_flashdata('success', 'Book is now free to Hire!!! Notification  send to the Requested User!! ');
		 redirect('admin/returned');
}

	}



	redirect('admin/returned');

  }
 /**
   * lost status
   *
   * This help to set lost status for lost resource
   *
   * @author Ashok Jadhav
   * @access  public
   * @return  void
   */
  public function set_lost_status($iresource_managementId,$category,$resource_id){
   $this->borrow_model->set_lost_status($iresource_managementId,$category,$resource_id);
  redirect('admin/lost');


  }


}