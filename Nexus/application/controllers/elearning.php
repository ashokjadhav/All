<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Elearning Class
 *
 * @author Ashok jadhav
 * @package CI_elearning
 * @subpackage Controller
 *
 */
class Elearning extends CI_Controller {
	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Ashok Jadhav
	 * @access	public
	 * @return	void
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
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->model('elearning_model');
		$this->load->library('phpmailer');

	}

	/**
     * index
     *
     * displays Elearning Login
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index($category=null)
	{	$arrData['tab']=$this->uri->segment(1);
        if($category!=null){
			$category=$category;
			$subcategory1='MUST STUDY';
			$subcategory2='ARTICLES & SLIDES';
			$subcategory3='VIDEOS';
			$subcategory4='BOOK SUMMARY';
			$arrData['articles']= $this->elearning_model->get_articles_details($category);
			$arrData['files'] = $this->elearning_model->get_slides_details($category,$subcategory2);
			$arrData['book_summaries']= $this->elearning_model->get_summaries_details($category,$subcategory4);
			$arrData['videos'] = $this->elearning_model->get_videos_details($category,$subcategory3);
			$arrData['muststudy_summaries'] = $this->elearning_model->get_muststudysummaries_details($category,$subcategory1);
			$arrData['muststudy_slides'] = $this->elearning_model->get_muststudyslides_details($category,$subcategory1);
			$arrData['muststudy_videos'] = $this->elearning_model->get_mustvideos_details($category,$subcategory1);
			$arrData['quiz_sub_categories']= $this->elearning_model->get_quizsub_categories_details($category);
		}
        $arrData['total_time'] = '';
	    $arrData['categorydetails']=$this->elearning_model->get_category_details();
		$arrData['middle']='elearning';
		$this->load->view('template',$arrData);


	}
	/**
     * index
     *
     * Display
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function readmore($id)
	{
		$arrData['descript'] = $this->elearning_model->readmorebook($id);
		$word = reset($arrData['descript'][0]);
		echo json_encode($word);
	}

	/**
     * check
     *
     * Check Elearning login
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function check(){
		if($_POST){
			$userName = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->elearning_model->verifyEmploy($userName,$password);
			if ($this->session->userdata('ellogin')=== TRUE){
				$this->session->set_flashdata('success', 'You have Logged In !!');
				redirect('elearning');
			}
			elseif($this->session->userdata('ellogin')=== FALSE){
				$this->session->set_flashdata('error','Sorry! Incorrect credentials. Please try again');
				redirect('elearning');
			}
		}
	}
	/**
	 * forgot_password
	 *
	 * loads forgot_password page of the frontend
	 *
	 * @param void
	 * @return void
	 */
	public function forgot_password(){
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'trim|required|email');
		if ($this->form_validation->run() === TRUE){
			$email = $this->input->post('email');
			$result = $this->elearning_model->forgot_password($email);
			if($result != FALSE){
				$url_key = base64_encode($result['token'].'/'.$result['id']);
				$message = "Hi {$result['name']}, <br /><br />";
				$message .= "This email contains a link. Please click on the link below to access your account. <br /><br />";
				$message .= "<a href='".site_url('elearning/reset_password/'.urlencode($url_key))."' target='_blank'>".site_url('elearning/reset_password/'.urlencode($url_key))."</a>";
				$message .= "<br /><br />Thanks & Regards,<br />Nexus Intranet Team";
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
				$mail->FromName = "support";
				$mail->AddAddress($email);
				$mail->WordWrap = 50;       // set word wrap to 50 characters
				$mail->Subject = "Reset Password";
				$mail->Body   =$message;
				$mail->IsHTML(true);
				if($mail->Send()){
					$this->session->set_flashdata('success', 'An email has been sent to your registered email id. Please check your email to proceed.');
					redirect('elearning');
				}
			}
			else{
				$this->session->set_flashdata('failure', 'The email id you have entered is not registered with us. Kindly register Or Try using another email id.');
				redirect('elearning/forgot_password');
			}
		}
		$arr_data['middle'] = 'elearning';
		$this->load->view('template', $arr_data);
	}


	/**
	 * reset_password
	 *
	 * loads reset_password page of the frontend
	 *
	 * @param void
	 * @return void
	 */
	public function reset_password(){
		$token = $this->uri->segment(3);
		if($this->elearning_model->check_token($token)){
			$url = base64_decode(urldecode($token));
			$url_chunks = explode('/',$url);
			$arr_data['user_id'] = $url_chunks['1'];
			$arr_data['middle'] = 'elearning';
			$arr_data['token'] = $token;
			$this->load->view('template', $arr_data);
		}
		else
		{
			echo "<script>alert('The link you are trying to access has expired. Please try using a valid link.');
			window.location.href='".base_url()."'
			</script>";
		}
	}


	/**
	 * update_reset_password
	 *
	 * Resets password for for forgot password process
	 *
	 * @param void
	 * @return void
	 */
	public function update_reset_password(){
		$token = $this->uri->segment(3);
		$this->form_validation->set_rules('npwd', 'New Password', 'trim|required');
		$this->form_validation->set_rules('cpwd', 'Confirm Password', 'trim|required|matches[npwd]');
		if ($this->form_validation->run() === TRUE){
			$data['new_pwd'] = $this->input->post('npwd');
			$data['user_id'] = $this->input->post('txtHidUserId');
			$this->elearning_model->update_reset_password($data);
			$this->session->set_flashdata('success', "Your password has been changed.<br/> Please Login with your new password.");
			redirect('elearning');
		}
		if (validation_errors() !== ""){
			$this->session->set_flashdata('failure', validation_errors());
			redirect('elearning/reset_password/'.$token);
		}

	}


	/**
     * logout
     *
     * logout session from  Elearning and calculate Elearning spent time
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */

	public function logout(){
		if ($this->session->userdata('ellogin')=== TRUE){
			date_default_timezone_set("Asia/Kolkata");
			$t = date('Y-m-d H:i:s');
			$time=(strtotime($t) - strtotime($this->session->userdata('logintime')));
			$Data['total_time'] = $this->convertToHoursMins($time);
			$val1 = $this->session->userdata('logintime');
			$val2 = date('Y-m-d H:i:s');
			$datetime1 = new DateTime($val1);
			$datetime2 = new DateTime($val2);
			$Data['scores'] = $this->elearning_model->get_elearningscore($val1,$val2);
			$data = $datetime1->diff($datetime2);
			$arrData['h'] = $data->h;
			$arrData['i'] = $data->i;
			$arrData['s'] = $data->s;
			$arrData['user_id'] = $this->session->userdata('site_userid');
			$insertflag = $this->elearning_model->get_elearningtime($this->session->userdata('site_userid'));
			if($insertflag){
				$arrData['s'] =  ($insertflag[0]['s']) + ($data->s);
				$arrData['i'] =  ($insertflag[0]['i']) + ($data->i);
				$arrData['h'] =  ($insertflag[0]['h']) + ($data->h);
				if($arrData['s']>59){
					$arrData['s'] =$arrData['s'] -  60;
					$arrData['i'] = $arrData['i']+1;
				}
				if($arrData['i']>59){
					$arrData['i'] =$arrData['i'] -  60;
					$arrData['h'] = $arrData['h']+1;
				}
				$this->elearning_model->update_elearningtime($arrData,$this->session->userdata('site_userid'));
			}else{
				$arrData['login_date'] = date('Y-m-d');
				$this->elearning_model->count_elearningtime($arrData);
			}
		}
		$ses_user = array("eluser"=>"","eluserid"=>0,"logintime"=>0,"ellogin"=>FALSE);
		$this->session->set_userdata($ses_user);
		$Data['middle']='elearning';
		$this->load->view('template',$Data);
	}

	/**
     * convertToHoursMins
     *
     * Convert time to H:m:s
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function convertToHoursMins($time) {
		$hours = floor($time / (60 * 60));

	    // extract minutes
	    $divisor_for_minutes = $time % (60 * 60);
	    $minutes = floor($divisor_for_minutes / 60);

	    // extract the remaining seconds
	    $divisor_for_seconds = $divisor_for_minutes % 60;
	    $seconds = ceil($divisor_for_seconds);

	    // return the final array
	    $obj = array(
	        "h" => (int) $hours,
	        "m" => (int) $minutes,
	        "s" => (int) $seconds,
	    );
	    return $obj;
	}

	/**
     * displaypdf
     *
     * Display pdf 
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function displaypdf($name){
		$arrData['pdf'] = urldecode($name);
		$this->load->view('display',$arrData);
	}

}

/* End of file elearning.php */
/* Location: ./application/controllers/elearning.php */