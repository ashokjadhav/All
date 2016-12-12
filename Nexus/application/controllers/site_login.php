<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Site_login Class
 *
 * @author Ketan Sangani
 * @package CI_Site_login
 * @subpackage Controller
 *
 */
class Site_login extends CI_Controller {
	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Ketan Sangani
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('site_login_model');
		$this->load->model('elearning_model');

	}
	/**
     * index
     *
     * displays Site Login
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index()
	{
		$this->load->view('site_login');
	}

 /**
   * check
   *
   * This help to Authenticate user login
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
	public function check(){
		if($_POST){
			$userName = $this->input->post('user');
			$password = MD5($this->input->post('password'));
			$this->site_login_model->verifyEmploy($userName,$password);
			if ($this->session->userdata('site_login')=== TRUE){
				$this->session->set_flashdata('success', 'You have Logged In !!');
				redirect('dashboard');
			}
			elseif($this->session->userdata('site_login')=== FALSE){
				$this->session->set_flashdata('error','Sorry!! Your Username Or Password Is Incorrect ');
				redirect('site_login');
			}

		}
	}

 /**
   * logout
   *
   * This help to Logout user From Site
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
	public function logout(){
		$a = $this->session->userdata('site_userid');
		$this->db->query("Update employees SET online='0' where id='$a'");
		if ($this->session->userdata('ellogin')=== TRUE){
			date_default_timezone_set("Asia/Kolkata");
			$t = date('Y-m-d H:i:s');
			$time=(strtotime($t) - strtotime($this->session->userdata('logintime')));
			$Data['total_time'] = $this->convertToHoursMins($time);
			$val1 = $this->session->userdata('logintime');
			$val2 = date('Y-m-d H:i:s');
			$datetime1 = new DateTime($val1);
			$datetime2 = new DateTime($val2);

			$data = $datetime1->diff($datetime2);
			$arrData['h'] = $data->h;
			$arrData['i'] = $data->i;
			$arrData['s'] = $data->s;
			$arrData['user_id'] = $this->session->userdata('site_userid');
			$insertflag = $this->elearning_model->get_elearningtime($this->session->userdata('site_userid'));
			//var_dump($insertflag);exit;
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
		//$ses_user = array("site_name" => "" ,"site_user"=>"","site_user1"=>"","site_userid"=>0,"site_login"=>FALSE);
		//$this->session->set_userdata($ses_user);
		$this->session->set_flashdata('success', 'You have Logged Out!!');
		//$ses_user1 = array("eluser"=>"","eluserid"=>0,"logintime"=>0,"ellogin"=>FALSE);
		//$this->session->set_userdata($ses_user1);
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		redirect('site_login');
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


}

/* End of file Site_login.php */
/* Location: ./application/controllers/site_login.php */