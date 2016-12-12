<?php 
class Login extends CI_Controller {

	/**
	* __construct
	*
	* Calls parent constructor
	* @author	Ashok jadhav
	* @access	public
	* @return	void
	*/
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('admin/login_model');

  }

	/**
   * index
   *
   * This help to display Admin Login Panel
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
	public function index(){

		$this->load->view('admin/login');
		
	}

	
	/**
   * check
   *
   * This help to Authenticate admin login
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
	public function check(){
		if($_POST){
			$userName = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->login_model->verifyUser($userName,$password);
			if ($this->session->userdata('logged_in')=== TRUE){
				$this->session->set_flashdata('success', 'You have Logged In !!');
				redirect('admin/dashboard','refresh');
			}
			else{
				$this->session->set_flashdata('error','Sorry!! Your Username Or Password Is Incorrect ');
				redirect('admin/login');
			}
		
		}
	}

}
/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */