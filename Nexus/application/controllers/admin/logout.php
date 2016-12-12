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
	{   
		$ses_user = array("username"=>"","id"=>0,"logged_in"=>FALSE);
		$this->session->set_userdata($ses_user);
        $this->session->set_flashdata('success', 'You have Logged Out!!');
		redirect('admin/login');
	}
}
/* End of file logout.php */
/* Location: ./application/controllers/admin/logout.php */