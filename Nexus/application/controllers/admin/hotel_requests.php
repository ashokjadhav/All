<?php
/**
 * Hotel_requests Class
 *
 * @author Ketan Sangani
 * @package CI_Hotel_requests
 * @subpackage Controller
 *
 */
class Hotel_requests extends CI_Controller {

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
   if($this->session->userdata('logged_in')== FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
    $this->load->model('admin/traveldesk_model');
    $this->load->library('phpmailer');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/
  }

  /**
     * index
     *
     * This help to display hotel & guesthouse booking requests Details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param   $table
     * @return  void
     */
  public function index($table=null){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $arrData['tab']=$this->uri->segment(2);
if(empty($table))
		{
			$table = 'book_hotel';
		}
  if ($this->input->post('delete')) {
      $multiDelete = $this->traveldesk_model->multi_delete__hotelrequests($table,$this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Hotel Requests Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Hotel Requests!!');

      redirect('admin/hotel_requests/index/'.$table);
    }
	/*if(empty($table))
		{
			$table = 'book_hotel';
		}*/

		$arrData['table'] = $table;


    $arrData['requests_managementDetails'] = $this->traveldesk_model->get_hotelrequests_management_details($newsfeedId=0,$table);
	//var_dump($arrData['requests_managementDetails']);exit;
   $arrData['middle'] = 'admin/travel_desk/hotelrequests/list';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * update
     *
     * This help to update Hotel booking requests details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param   $table
     * @return  void
     */
  public function update($table) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    if ($_POST) {

      if ($this->input->post('submit')) {

      $date = date("Y-m-d H:i:s");
      $inserted_rightsFlag = true;
      $id = $this->input->post('id');
      $arrData["ticket_number"] = $this->input->post('ticketnumber');
      $arrData["status"] = '1';
	  /*if($this->input->post('status')==0){
		  $query = $this->db->query("DELETE FROM $table where id='$id'");

	  }*/
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->traveldesk_model->update_hotelrequest($arrData,$table,$id);
			if ($insertedFlag){
				$adata['requestdetails']= $this->traveldesk_model->get_hotelrequestdetails($table,$id);
				$adata['table'] = $table;
				$emailofuser = $this->traveldesk_model->get_hotelrequestdetails($table,$id);
				$mail = new PHPMailer();
				$mail->IsSMTP();                                      // set mailer to use SMTP
				$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true;     // turn on SMTP authentication
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = 'smtp.gmail.com';
				//$mail->Host = "rx5301.rapidns.com:465";  // specify main and backup server
				$mail->Username = "nexus@carnivalcinemas.in";  // SMTP username
				$mail->Password = "nexus@123"; // SMTP password
				$mail->Port = 465;
				$mail->From = "nexus@carnivalcinemas.in";
				$mail->FromName = "Travel Requisition";
				$mail->AddAddress($emailofuser[0]['email']);
				//$mail->AddAddress($email_authority[0]['email']);
				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
				$mail->Subject = "Hotel Ticket Approved";
				$mail->Body   = $this->load->view('admin/travel_desk/sendmail/updatehotelrequest.php',$adata,true);
				$mail->IsHTML(true);
				if(!$mail->Send())
				{
					$this->session->set_flashdata('error', 'Failed to Update Hotel Request Details!!');
					redirect('admin/hotel_requests/index/'.$table);
				}
				else{
					$this->session->set_flashdata('success', 'Hotel Request Details Updated Successfully !!');
					redirect('admin/hotel_requests/index/'.$table);

				}



            }

          }


    }
    else{
      $arrData['error']='';
      }
	  $arrData['table'] = $table;
    $arrData['tab']=$this->uri->segment(2);
}

  /**
   * delete
   *
   * This help to delete hotel & guesthouse booking requests Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $table,$iresource_managementId
   * @return  void
   */
  public function delete($iresource_managementId,$table) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->traveldesk_model->delete_hotel_request($iresource_managementId,$table);
    if ($delete)
      $this->session->set_flashdata('success', 'Request Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Request Details!!');
      redirect('admin/hotel_requests/index/'.$table);
  }


}