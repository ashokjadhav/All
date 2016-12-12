<?php 
class Logout extends CI_Controller {

	/**
     * __construct
     *
     * Calls parent constructor
     * @access	public
     * @return	void
     */
	function __construct()
	{
		parent::__construct();
		$this->load->model('logout_model');
	}

	 /**
     * index
     *
     * This will destroy the current session
     * 
     * @author	Ashok Jadhav
     * @access	public
     * @return	void
     */
	
	public function index()
	{	$this->logout_model->set_offline($this->session->userdata('user'));
	     $ses_user = array("user"=>"","userid"=>0,"login"=>FALSE);
		$this->session->set_userdata($ses_user);

        $this->session->set_flashdata('success', 'You have Logged Out!!');
		redirect('dashboard');
	}
}
/* End of file logout.php */
/* Location: ./application/controllers/admin/logout.php */