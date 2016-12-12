<?php
/**
 * Ticket_modified Class
 *
 * @author Ketan Sangani
 * @package CI_Ticket_modified
 * @subpackage Controller
 *
 */
class Ticket_modified extends CI_Controller {

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
    $this->load->model('admin/traveldesk_model');
	$this->load->library('phpmailer');
	/*if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}*/


  }

  /**
     * index
     *
     * This help to display Details of modified travel tickets
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
			$table = 'AIR';
		}
  if ($this->input->post('delete')) {
      $multiDelete = $this->traveldesk_model->multi_delete_ticketsmodified($this->input->post('delete'));
      if ($multiDelete)
        $this->session->set_flashdata('success', 'Tickets Deleted Successfully !!');
      else
        $this->session->set_flashdata('error', 'Failed to Delete Tickets !!');
      // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
      // To avoid this we are redirecting it.
      redirect('admin/tickets_modified');
    }


		$arrData['table'] = $table;


    $arrData['modifiedtickets_managementDetails'] = $this->traveldesk_model->get_modifiedtickets_management_details($newsfeedId=0,$table);
	//var_dump($arrData['requests_managementDetails']);exit;
   $arrData['middle'] = 'admin/travel_desk/travel_requests/modified';
    $this->load->view('admin/template', $arrData);
  }

  /**
     * update
     *
     * This help to update Details of modified travel ticket
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
      $request =  $this->traveldesk_model->get_requestdetails($table,$id);
                               $approve_status = $request[0]['approved_status'];
                               
                               if($approve_status==1){
                                    //var_dump($id);exit;
                                $arrData["PNR"] = $this->input->post('pnr');
                               
                                //$arrData["approved_status"] = $this->input->post('status');
                                 $arrData["book_status"] = $this->input->post('status');
                               }else{
                                  $arrData["PNR"] = ' ';
                                  $arrData["book_status"] = 0;
                                  
                               }
	  if($this->input->post('hotelid')!=0){
		  $hotelid = $this->input->post('hotelid');
		 
          $hoteldata["status"] = '1';
		  $hoteldata["modified_date"] = $date;
		$hotelflag =  $this->traveldesk_model->update_hotelrequest($hoteldata,$hotelid);
		if($hotelflag){
         $adata['hotelrequestdetails']= $this->traveldesk_model->get_hotelrequestdetails($hotelid);
		}

	  }
	   if($this->input->post('guesthouseid')!=0){
		  $guestid = $this->input->post('guesthouseid');
		 // $guestdata['ticket_number'] = $this->input->post('guesthousecode');
		  $guestdata["status"] = '1';
		  $guestdata["modified_date"] = $date;
		  $guesthouseflag = $this->traveldesk_model->update_guesthouserequest($guestdata,$guestid);
          if($guesthouseflag){
           $adata['guestrequestdetails']= $this->traveldesk_model->get_guesthouserequestdetails($guestid);
		}
	  }
	
      $arrData["modified_date"] = $date;


      $insertedFlag = $this->traveldesk_model->update_request($arrData,$table,$id);
			if ($insertedFlag) {
                $adata['requestdetails']= $this->traveldesk_model->get_requestdetails($table,$id);
				$aData["book_status"] = $this->input->post('status');
                                                                $aData["approved_status"] = $this->input->post('approve_status');
				$emailofuser = $this->traveldesk_model->get_requestdetails($table,$id);
                                                                 $email_hod =  $this->traveldesk_model->get_emailofhod($adata['requestdetails'][0]['authority']);
				 $email_traveldesk = "susan.dsouza@aoploverseas.com"; 
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
                                                                $mail->AddAddress($email_hod[0]['email']);
                                                                $mail->AddAddress($email_traveldesk);
																//$mail->AddAddress('susan.dsouza@aoploverseas.com', 'Susan Dsouza');
				//$mail->AddAddress($email_authority[0]['email']);
				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
				$mail->Subject = "Ticket Approved";
				$mail->Body   = $this->load->view('admin/travel_desk/sendmail/updaterequest.php',$adata,true);
				$mail->IsHTML(true);
				$mail->Send();
				if(!$mail->Send())
				{
					$this->session->set_flashdata('error', 'Failed to Update Modified Travel Request Details!!');
					redirect('admin/ticket_modified');
				}
				else{
					$this->session->set_flashdata('success', 'Modified Travel Request Details Updated Successfully !!');
					redirect('admin/ticket_modified');

				}

			}





    }
    else{
      $arrData['error']='';
      }
	  $arrData['table'] = $table;
    $arrData['tab']=$this->uri->segment(2);
}
}

  /**
   * delete
   *
   * This help to delete Details of modified travel ticket
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iresource_managementId
   * @return  void
   */
  public function delete($table,$iresource_managementId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
                redirect('admin/dashboard');}
                $delete = $this->traveldesk_model->delete_modifiedtravelrequest($iresource_managementId);
        if ($delete)
                $this->session->set_flashdata('success', 'Modified Travel Request Details Deleted Successfully !!');
    else
            $this->session->set_flashdata('error', 'Failed to Delete Modified Travel Request Details!!');
      redirect('admin/ticket_modified/index/'.$table);
  }


}