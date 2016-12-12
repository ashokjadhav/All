<?php
/**
 * Travel_requests Class
 *
 * @author Ashok Jadhav
 * @package CI_Travel_requests
 * @subpackage Controller
 *
 */
class Travel_requests extends CI_Controller {

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
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
            redirect('admin');
            break;
        }
        $this->load->model('admin/traveldesk_model');
        $this->load->library('phpmailer');
    }

  /**
     * index
     *
     * This help to display travel requests Details
     *
     * @author  Ashok Jadhav
     * @access  public
	 * @param   $table
     * @return  void
     */
    public function index($table=null){
        if(!check_priviledges()){
                $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
                redirect('admin/dashboard');
            }
            $arrData['tab']=$this->uri->segment(2);
            if(empty($table)){
                $table = 'AIR';
            }
            $arrData['table'] = $table;
            $arrData['requests_managementDetails'] = $this->traveldesk_model->get_travelrequests_management_details($newsfeedId=0,$table);
            $arrData['middle'] = 'admin/travel_desk/travel_requests/list';
            $this->load->view('admin/template', $arrData);
    }

  /**
     * add
     *
     * This help to update status of ticket of user Details
     *
     * @author  Ketan Sangani
     * @access  public
	 * @param   $table
     * @return  void
     */
    public function update($table,$id) {
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');
        }
        if ($_POST) {
            if ($this->input->post('submit')) {
                $date = date("Y-m-d H:i:s");
                $inserted_rightsFlag = true;
                $id = $this->input->post('id');
                $request =  $this->traveldesk_model->get_requestdetails($table,$id);
                $approve_status = $request[0]['approved_status'];
                if($approve_status==1){
                    $arrData["PNR"] = $this->input->post('pnr');
                    $arrData["book_status"] = $this->input->post('status');
                }else{
                    $arrData["PNR"] = ' ';
                    $arrData["book_status"] = 0;
                }
                if($this->input->post('hotelid')!=0){
                    $hotelid = $this->input->post('hotelid');
                    $hoteldata['ticket_number'] = $this->input->post('hotelcode');
                    $hoteldata["status"] = '1';
                    $hoteldata["modified_date"] = $date;
                    $hotelflag =  $this->traveldesk_model->update_hotelrequest($hoteldata,$hotelid);
                    if($hotelflag){
                        $adata['hotelrequestdetails']= $this->traveldesk_model->get_hotelrequestdetails($hotelid);
                    }
                }
                if($this->input->post('guesthouseid')!=0){
        		    $guestid = $this->input->post('guesthouseid');
        		    $guestdata['ticket_number'] = $this->input->post('guesthousecode');
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
                    $email_hod =  $this->traveldesk_model->get_emailofhod($adata['requestdetails'][0]['authority']);
                    $emailofuser = $this->traveldesk_model->get_requestdetails($table,$id);
                    $email_traveldesk = "susan.dsouza@aoploverseas.com"; 
    				$data['body']=array($adata);
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
                    $mail->AddAddress($email_hod[0]['email']);
                    $mail->AddAddress($email_traveldesk);
					//$mail->AddAddress('susan.dsouza@aoploverseas.com', 'Susan Dsouza');
    				$mail->WordWrap = 50;                                 // set word wrap to 50 characters
    				$mail->Subject = "Ticket Approve";
    				$mail->Body   = $this->load->view('admin/travel_desk/sendmail/updaterequest.php',$adata,true);
    				$mail->IsHTML(true);
    				if(!$mail->Send()){
				        $this->session->set_flashdata('error', 'Failed to Update Travel Request Details!!');
                        redirect('admin/travel_requests/index/'.$table);
    				}
    				else{
    					$this->session->set_flashdata('success', 'Travel Request Details Updated Successfully !!');
                        redirect('admin/travel_requests/index/'.$table);
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
   * This help to delete travel requests Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $icategoryId
   * @return  void
   */
    public function delete($table,$icategoryId){
        if(!check_priviledges()){
	        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}

            $Delete = $this->traveldesk_model->delete_travelrequest($icategoryId);
            if ($Delete)
                $this->session->set_flashdata('success', 'Travel Request Deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to Delete Travel Request !!');
            // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
            // To avoid this we are redirecting it.
            redirect('admin/travel_requests/index/'.$table);
    }

    /**
       * set_authority
       *
       * This is used to publish approving authority details
       *
       * @author  Ketan Sangani
       * @access  public
       * @param  integer-$iNewfeedId
       * @return boolean
       */
    function set_approval_status($iNewfeedId,$status){
        $query=$this->db->query("UPDATE travel_desk SET approved_status='$status' WHERE id='$iNewfeedId'");
        if($query){
            $arrData['status'] = $status;
            echo json_encode($arrData);
        }
    }
  
  /**
   * set_authority
   *
   * This is used to publish approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
    function update_traveldate($id){
        $date = $_POST['date'];
        $query=$this->db->query("UPDATE travel_desk SET travel_date='$date' WHERE id='$id'");
        if($query){
            echo date('d M Y',  strtotime($date));exit;
            $arrData['date'] = date('d M Y',  strtotime($date));
            echo json_encode($arrData);
        }
    }
}