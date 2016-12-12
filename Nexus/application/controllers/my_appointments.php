<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * My_appointments Class 
 *
 * @author Ashok jadhav
 * @package CI_My_appointments
 * @subpackage Controller
 *
 */
class My_appointments extends CI_Controller {
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
		$this->load->model('my_appointments_model');
		
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
	public function index(){	
		$arrData['tab']=$this->uri->segment(1);
	    $id = $this->session->userdata('site_userid');
		$arrData['appoinements']=$this->my_appointments_model->get_apointmentdetails($id);
		$arrData['middle']='my_appointments';
		$this->load->view('template',$arrData);
	}


	/**
     * add
     *
     * This help to add meeting Details(Book Appiontment)
     * 
     * @author  Asho Jadhav
     * @access  public
     * @return  void
     */
	public function add() {
		if ($_POST) {
			if ($this->input->post('submit')) {
			  $arrData['from_name'] = $this->session->userdata('site_userid');
			  $date = date("Y-m-d H:i:s");
			  $inserted_rightsFlag = true;
			  $name = $this->input->post('firstname');
			  $data = $this->my_appointments_model->get_emp_id($name);
			  $arrData["to_name"] = $data[0]['id'];
			  $arrData["contact"] = $this->input->post('contact');
			  $arrData["reason"] = $this->input->post('reason');
			  $arrData["appointment_date"] = $this->input->post('appointment_date');
			  $arrData["from_time"] = $this->input->post('from_time');
			  $arrData["to_time"] = $this->input->post('to_time');
			  $arrData["created_date"] = $date;
			  $arrData["modified_date"] = $date;
			  $insertedFlag = $this->my_appointments_model->save_apointmentsdetails($arrData);
			  if ($insertedFlag) {
				$this->session->set_flashdata('success', 'category Details Added Successfully !!');
				  redirect('my_appointments');
				}
			  else{
				  $this->session->set_flashdata('error', 'Failed to Add category Details!!');
				  redirect('my_appointments');
			  }
			}
         
      
		}
		$arrData['tab']=$this->uri->segment(1);
		$name = $this->session->userdata('user');
		$arrData['appoinements']=$this->my_appointments_model->get_apointmentdetails($name);
		$arrData['middle']='my_appointments';
		$this->load->view('template',$arrData);
	}

    /**
     * edit
     *
     * This help to edit meeting Details(Modify Appiontment)
     * 
     * @author  Asho Jadhav
     * @access  public
     * @return  void
     */
	public function edit($id) {
		if ($_POST) {
			if ($this->input->post('submit')) {
			  $arrData['from_name'] = $this->session->userdata('site_userid');
			  $date = date("Y-m-d H:i:s");
			  $inserted_rightsFlag = true;
			  $name = $this->input->post('firstname');
			  $data = $this->my_appointments_model->get_emp_id($name);
			  $arrData["to_name"] = $data[0]['id'];
			  $arrData["contact"] = $this->input->post('contact');
			  $arrData["reason"] = $this->input->post('reason');
			  $arrData["appointment_date"] = $this->input->post('appdate');
			  $arrData["from_time"] = $this->input->post('appf_time');
			  $arrData["to_time"] = $this->input->post('appt_time');
			  $arrData["created_date"] = $date;
			  $arrData["modified_date"] = $date;
			  
			  $insertedFlag = $this->my_appointments_model->edit_apointmentsdetails($id,$arrData);
              if ($insertedFlag) {
				$this->session->set_flashdata('success', 'category Details Added Successfully !!');
				redirect('my_appointments');
			  }
              else{
				$this->session->set_flashdata('error', 'Failed to Add category Details!!');
				redirect('my_appointments');
			  }
          }
         
      
		}
		$arrData['tab']=$this->uri->segment(1);
		
		$arrData['appoinements']=$this->my_appointments_model->get_apointmentdetails($this->session->userdata('site_userid'));
		$arrData['middle']='my_appointments';
		$this->load->view('template',$arrData);
	}
	
	/**
     * get_appointment
     *
     * This help to give appointments details
     * 
     * @author  Asho Jadhav
     * @access  public
     * @return  void
     */
	public function get_appointment($id){
		$user=  $this->my_appointments_model->get_appointment($id);
		echo json_encode($user);
	}

	/**
     * get_user
     *
     * This help to disable the previousolly booked appointments dates
     * 
     * @author  Asho Jadhav
     * @access  public
     * @return  void
     */
	public function get_user($first){
		$name=urldecode($first);
		$data = $this->my_appointments_model->get_emp_id($name);
		$user = $this->my_appointments_model->get_user($data[0]['id']);
		echo json_encode($user);
	}

	
}

/* End of file My_appointments.php */
/* Location: ./application/controllers/My_appointments.php */