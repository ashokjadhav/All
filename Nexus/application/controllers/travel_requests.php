<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Travel_requests Class
 *
 * @author Ketan Sangani
 * @package CI_Travel_requests
 * @subpackage Controller
 *
 */
class Travel_requests extends CI_Controller {
	/**
     * construct
     *
     * constructor method
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */

	function __construct()
	{
		// Initialization of class
		parent::__construct();
		if($this->session->userdata('site_login') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
            redirect('site_login');
            break;
		}
		$this->load->model('travel_desk_model');
        $this->load->library('phpmailer');
	}
	/**
     * index
     *
     * displays index page of travel requests for authority
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$arrData['tab']=$this->uri->segment(1);
		$arrData['requestsdetails'] = $this->travel_desk_model->get_travelrequests();
		$arrData['middle']='travel_requests';
		$this->load->view('template',$arrData);
	}
	/**
     * update
     *
     * This help to update status of ticket of user Details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param   $table
     * @return  void
     */
	public function update($id) {
		if ($_POST) {
			if ($this->input->post('submit')) {
				$authorityid = $this->session->userdata('site_userid');
				$date = date("Y-m-d H:i:s");
				$inserted_rightsFlag = true;
				//$arrData["PNR"] = $this->input->post('pnr');
				$arrData["approved_status"] = $this->input->post('status');
				$arrData["modified_date"] = $date;
				$insertedFlag = $this->travel_desk_model->update_request($arrData,$id);
				if ($insertedFlag) {
					$adata['requestdetails']= $this->travel_desk_model->get_requestdetails($id);
					$aData["approved_status"] = $this->input->post('status');
					$emailofuser = $this->travel_desk_model->get_requestdetails($id);
					$email_authority = $this->travel_desk_model->get_emailofauthority($authorityid);
                                                                                $email_traveldesk = "susan.dsouza@aoploverseas.com";
					$mail = new PHPMailer();
					$mail->IsSMTP();                                      // set mailer to use SMTP
					$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
					$mail->Host = 'smtp.gmail.com';
					$mail->Username = "nexus@carnivalcinemas.in";  // SMTP username
					$mail->Password = "nexus@123"; // SMTP password
					$mail->Port = 465;
					$mail->From = "nexus@carnivalcinemas.in";
					$mail->FromName = "Travel Requisition";
					$mail->AddAddress($emailofuser[0]['email']);
					$mail->AddAddress($email_traveldesk);
					//$mail->AddAddress('susan.dsouza@aoploverseas.com', 'Susan Dsouza');
					$mail->WordWrap = 50;                            // set word wrap to 50 characters
					$mail->Subject = "Ticket Approved";
					$mail->Body   = $this->load->view('travel_desk/sendmail/authorityrequest.php',$adata,true);
					$mail->IsHTML(true);
					if(!$mail->Send()){
						$this->session->set_flashdata('error', 'Failed to Update Travel Request Details!!');
						redirect('travel_requests');
					}
					else{
						$this->session->set_flashdata('success', 'Travel Request Details Updated Successfully !!');
						redirect('travel_requests');

					}

				}

          }


		}
		else{
		  $arrData['error']='';
		}

	}


}

/* End of file Travel_requests.php */
/* Location: ./application/controllers/Travel_requests.php */