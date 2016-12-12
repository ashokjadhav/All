<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Travel_desk Class
 *
 * @author Ketan Sangani
 * @package CI_Travel_desk
 * @subpackage Controller
 *
 */

class Travel_desk extends CI_Controller {

	/**
     * construct
     *
     * constructor method
     * @author Ashok Jadhav
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
		$this->load->model('booking_model');
		$this->load->model('who_is_where_model');
        $this->load->library('phpmailer');

	}

	/**
     * index
     *
     * display Travel Desk home page
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index()
	{	$arrData['tab']=$this->uri->segment(2);
		$arrData['middle']='travel_desk/index';
		$this->load->view('template',$arrData);
	}

	/**
     * book
     *
     *save booking information for transport
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	function book(){
	if ($_POST) {
		if ($this->input->post('book')) {
			$date = date('Y-m-d H:i:s');
			$arrData["user_id"] = $this->input->post('user');
			$extra = $this->input->post('extra_book');
			$extra1 = $this->input->post('extra_book1');
			$insertedFlag1 ='';
			$insertedFlag2 ='';
			if($extra!=''){
				$arrdata["user_id"] = $this->input->post('user');
				$arrdata["stayplace"] = $this->input->post('stayplace');
				$arrdata["checkin_date"] = $this->input->post('chkindate');
				$arrdata["checkout_date"] = $this->input->post('chkoutdate');
				$arrdata["instructions"] = $this->input->post('instructions');
				$arrdata["created_date"] = $date;
				$insertedFlag1 = $this->booking_model->book_extra($arrdata);

			}
			if($extra1!=''){
				$arrdata1["user_id"] = $this->input->post('user');
				$arrdata1["stayplace"] = $this->input->post('stayplace1');
				$arrdata1["checkin_date"] = $this->input->post('chkindate1');
				$arrdata1["checkout_date"] = $this->input->post('chkoutdate1');
				$arrdata1["instructions"] = $this->input->post('instructions1');
				$arrdata1["created_date"] = $date;
				$insertedFlag2 = $this->booking_model->book_extra1($arrdata1);

			}

			if($insertedFlag1!=''){
				$arrData["hotel"] = $insertedFlag1[0]['id'];
			}
			if($insertedFlag2!=''){
				$arrData["guesthouse"] = $insertedFlag2[0]['id'];
			}
			$arrData["mode"] = $this->input->post('mode');
			$arrData["from"] = $this->input->post('from');
			$arrData["to"] = $this->input->post('to');
		    $arrData["travel_date"] = $this->input->post('travel_date');
			$var = $this->input->post('return_date');
			if(isset($var)){
				$arrData["return_date"] = $var;
				$arrData["Rtrn_travel_time"] = $this->input->post('R_travel_time');
				$arrData["Rtrn_travelt_time"] = $this->input->post('R_travelt_time');
			}
		    $arrData["travel_time"] = $this->input->post('travel_time');
			$arrData["travelt_time"] = $this->input->post('travelt_time');
			$arrData["airlines_id"] = $this->input->post('airid');
			$arrData["authority"] = $this->input->post('authority');
			$email_user = $this->booking_model->get_detailsofuser($arrData["user_id"]);
			$email_authority = $this->booking_model->get_emailofauthority($arrData["authority"]);

			$arrData["purpose"] = $this->input->post('purpose');
			$arrData["band_grade"] = $this->input->post('band');
			$arrData["request_status"] = '0';
			$arrData["approved_status"] = '0';
			$arrData["created_date"] = $date;
			$insertedFlag = $this->booking_model->book_ticket($arrData);
            if ($insertedFlag) {
				$arrData["name"] = $this->session->userdata('site_name');
				$arrData['designation'] = $email_user[0]['designation'];
				$arrData['department'] = $email_user[0]['department'];
				$arrData["authorityname"] = $email_authority[0]['name'];
                $email_traveldesk = "susan.dsouza@aoploverseas.com";
                $data['body']=array($arrData);
                if($extra!=''){
					$data['hotel']=array($arrdata);
				}
				if($extra1!=''){
					$data['guesthouse']=array($arrdata1);
				}
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
				$mail->AddAddress($email_user[0]['email']);
				$mail->AddAddress($email_authority[0]['email']);
                $mail->AddAddress($email_traveldesk);
				//$mail->AddAddress('susan.dsouza@aoploverseas.com', 'Susan Dsouza');
				$mail->WordWrap = 50;            // set word wrap to 50 characters
				$mail->Subject = "Ticket Booking ";
				$mail->Body   = $this->load->view('travel_desk/sendmail/travelrequest.php',$data,true);
				$mail->IsHTML(true);
				if(!$mail->Send())
				{
					$this->session->set_flashdata('error', 'Failed to send Booking Request !!');
					redirect('travel_desk/book');
				}
				else{
					$this->session->set_flashdata('success', 'Booking Request has been Sent');
					redirect('travel_desk/book');

				}
			}


		}
	   }
		$id = $this->session->userdata('site_userid');
		$arrData['Details']=$this->who_is_where_model->get_all_details($id);
		$arrData['authorities'] = $this->booking_model->get_hod();
		$arrData['locations'] = $this->booking_model->get_all_locations();
		$arrData['hotel'] = $this->booking_model->get_all_hotel();
		$arrData['guesthouse'] = $this->booking_model->get_all_guesthouse();
		$arrData['middle']='travel_desk/book';
		$this->load->view('template',$arrData);

	}
/**
     * cancel
     *
     *Cancel Ticket for transport
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function cancel(){
		if ($_POST) {
		if ($this->input->post('cancel')) {

		$pnr = $this->input->post('pnr');
		$arrData['reason_cancel'] = $this->input->post('reason');
		$arrData['request_status'] = '2';
		$insertedFlag = $this->booking_model->set_cancel_status($pnr,$arrData);
		if($insertedFlag){
			$user_id = $this->input->post('user');
			$email_user = $this->booking_model->get_detailsofuser($user_id);
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
			$mail->AddAddress($email_user[0]['email']);
			//$mail->AddAddress($data['Details'][0]['authority']);
			$mail->WordWrap = 50;                                 // set word wrap to 50 characters
			$mail->Subject = "Ticket Cancellation ";
			$mail->Body   = $this->load->view('travel_desk/sendmail/travelcancel.php',$arrData,true);
			$mail->IsHTML(true);
		if($mail->Send()){
			$this->session->set_flashdata('success','Ticket cancellation request has been sent');
			redirect('travel_desk/cancel');

		}else{
			$this->session->set_flashdata('error', 'You have Entered Wrong PNR  Number');
			redirect('travel_desk/cancel');
		}
		}}}
		$arrData['tab']=$this->uri->segment(2);
		$arrData['locations'] = $this->booking_model->get_all_locations();
		$arrData['middle']='travel_desk/cancel';
		$this->load->view('template',$arrData);
	}

/**
     * modify
     *
     * Modify Ticket for transport
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function modify(){
		if ($_POST) {
			if ($this->input->post('modify')) {
				$pnr = $this->input->post('pnr');
				$date = date('Y-m-d H:i:s');
				$extra = $this->input->post('extra_book');
				$extra1 = $this->input->post('extra_book1');
				$insertedFlag1 ='';
				$insertedFlag2 ='';
				if($extra!=''){
					$arrdata["user_id"] = $this->input->post('user');
					$arrdata["stayplace"] = $this->input->post('stayplace');
					$arrdata["checkin_date"] = $this->input->post('chkindate');
					$arrdata["checkout_date"] = $this->input->post('chkoutdate');
					$arrdata["instructions"] = $this->input->post('instructions');
					$arrdata["created_date"] = $date;
					$insertedFlag1 = $this->booking_model->book_extra($arrdata);

				}
				if($extra1!=''){
					$arrdata1["user_id"] = $this->input->post('user');
					$arrdata1["stayplace"] = $this->input->post('stayplace1');
					$arrdata1["checkin_date"] = $this->input->post('chkindate1');
					$arrdata1["checkout_date"] = $this->input->post('chkoutdate1');
					$arrdata1["instructions"] = $this->input->post('instructions1');
					$arrdata1["created_date"] = $date;
					$insertedFlag2 = $this->booking_model->book_extra1($arrdata1);

				}

				if($insertedFlag1!=''){
					$arrData["hotel"] = $insertedFlag1[0]['id'];
				}else{
					$arrData["hotel"] ='0';
				}
				if($insertedFlag2!=''){
					$arrData["guesthouse"] = $insertedFlag2[0]['id'];
				}else{
					$arrData["guesthouse"] = '0';
				}
				$arrData["mode"] = $this->input->post('mode');
				$arrData["from"] = $this->input->post('from');
				$arrData["to"] = $this->input->post('to');
				$arrData["travel_date"] = $this->input->post('travel_date');
				$arrData["travelt_time"] = $this->input->post('travelt_time');
				$var = $this->input->post('return_date');
				if(isset($var)){
					$arrData["return_date"] = $var;
					$arrData["Rtrn_travel_time"] = $this->input->post('R_travel_time');
					$arrData["Rtrn_travelt_time"] = $this->input->post('R_travelt_time');
				}else{
				$arrData["return_date"] = '';
				}
				$arrData["travel_time"] = $this->input->post('travel_time');
				$arrData["airlines_id"] = $this->input->post('airid');
				$arrData["authority"] = $this->input->post('authority');
				$arrData['reason_modify'] = $this->input->post('reason1');
				$arrData['request_status'] = '1';
                                                                $arrData['book_status'] = '0';
				$arrData['approved_status'] = '0';
				$user_id = $this->input->post('user');
				$email_user = $this->booking_model->get_detailsofuser($user_id);
				$email_authority = $this->booking_model->get_emailofauthority($arrData["authority"]);
				$insertedFlag = $this->booking_model->modify_ticket($pnr,$arrData);
				if($insertedFlag){
					$arrData["name"] = $this->session->userdata('site_name');
					$arrData['designation'] = $email_user[0]['designation'];
					$arrData['department'] = $email_user[0]['department'];
					$arrData["authorityname"] = $email_authority[0]['name'];
					$data['body']=array($arrData);
					if($extra!=''){
						$data['hotel']=array($arrdata);
					}
					if($extra1!=''){
						$data['guesthouse']=array($arrdata1);
					}
					$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
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
					$mail->AddAddress($email_user[0]['email']);
					$mail->AddAddress($email_authority[0]['email']);
					$mail->WordWrap = 50;                                 // set word wrap to 50 characters
					$mail->Subject = "Ticket Modify";
					$mail->Body   = $this->load->view('travel_desk/sendmail/travelmodify.php',$data,true);
					$mail->IsHTML(true);
					if($mail->Send()){
						$this->session->set_flashdata('success','Ticket modify request has been sent');
						redirect('travel_desk/modify');

					}
				}else{
					$this->session->set_flashdata('error', 'You have Entered Wrong PNR Ticket Number');
					redirect('travel_desk/modify');
				}
			}
		}
		$arrData['tab']=$this->uri->segment(2);
		$arrData['authorities'] = $this->booking_model->get_hod();
		$arrData['locations'] = $this->booking_model->get_all_locations();
		$arrData['middle']='travel_desk/modify';
		$this->load->view('template',$arrData);
	}
	/**
     * get_details
     *
     * Get Details of ticket from pnr
     * @author Ashok Jadhav
	 * @access public
     * @param $pnr
     * @return json_array
     *
     */
	public function get_details($pnr){

		$arrData['Details']=$this->booking_model->get_ticket_details($pnr);
		//print_r($arrData['Details']);
		//exit;

		echo json_encode($arrData['Details']);
	}
	/**
     * get_airlines
     *
     *Get Airline Details while book ticket on checked
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	function get_airlines($id){
	$arrData['airlines'] = $this->booking_model->get_all_airlines($id);
	echo json_encode($arrData['airlines']);
	}

	/**
     * get_airdetails
     *
     *Get Airline Details if already selected mode is Air during modify ticket
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	function get_airdetails($id){
	$arrData['airlines'] = $this->booking_model->get_all_airdeatils($id);
	echo json_encode($arrData['airlines']);
	}
}

/* End of file travel_desk.php */
/* Location: ./application/controllers/travel_desk.php */