<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->load->helper('text');
		$this->load->model('birthday_model');
		$this->load->model('new_joinee_model');
		$this->load->model('thought_model');
		$this->load->model('noticeboard_model');
		$this->load->model('what_is_on_today_model');
		$this->load->model('holiday_list_model');

	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{	$arrData['tab']=$this->uri->segment(1);
		$arrData['birthdays']=$this->birthday_model->get_todaybirthday_details();
		$arrData['new_joinees']=$this->new_joinee_model->get_new_joinee_details();
		$arrData['thoughts']=$this->thought_model->get_thought_details();
		$arrData['notices']=$this->noticeboard_model->get_noticeboard_details();
		$arrData['upcomings']=$this->what_is_on_today_model->get_upcoming_details();
		$arrData['upcoming_holiday']=$this->holiday_list_model->get_allholiday_list_details();
		$arrData['onlines']=$this->new_joinee_model->get_online_details();
		$arrData['middle']='dashboard';
		$this->load->view('template',$arrData);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */