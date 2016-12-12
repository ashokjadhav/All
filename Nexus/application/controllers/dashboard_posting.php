<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dashboard_posting Class
 *
 * @author Ketan Sangani
 * @package CI_Dashboard_posting
 * @subpackage Controller
 *
 */
class Dashboard_posting extends CI_Controller {
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
		$this->load->model('dashboard_posting_model');
		$this->load->model('medals_model');

	}
	/**
     * index
     *
     * displays index page of Dashboard_posting
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$arrData['tab']=$this->uri->segment(1);
	    $id=$this->session->userdata('dpuserid');
	    $arrData['juniors'] = $this->dashboard_posting_model->get_juniors($id);
		$arrData['medalsDetails']='';
		$arrData['assignmentsDetails']='';
		$arrData['kraDetails']='';
		$arrData['kpiDetails']='';
		$arrData['programsDetails']='';
		$arrData['middle']='dashboard_posting';
		$this->load->view('template',$arrData);


	}
	
	/**
     * get_details
     *
     * get dashboard deatils of their juniors
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function get_details($userid){
		$arrData['tab']=$this->uri->segment(1);
		$id=$this->session->userdata('dpuserid');
		$arrData['juniors'] = $this->dashboard_posting_model->get_juniors($id);
		$arrData['medalsDetails']=$this->dashboard_posting_model->get_allmedals_details($userid);
		$arrData['assignmentsDetails']=$this->dashboard_posting_model->get_allassignments_details($userid);
		$arrData['kraDetails']=$this->dashboard_posting_model->get_allkras_details($userid);
		$arrData['kpiDetails']=$this->dashboard_posting_model->get_allkpis_details($userid);
		$arrData['programsDetails']=$this->dashboard_posting_model->get_alltraining_details($userid);
		$arrData['middle']='dashboard_posting';
		$this->load->view('template',$arrData);


	}

	/**
     * check
     *
     * check dashboard posting  login
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
			$this->dashboard_posting_model->verifyEmploy($userName,$password);
			if ($this->session->userdata('login')=== TRUE){
				$this->session->set_flashdata('success', 'You have Logged In !!');
				redirect('dashboard_posting');
			}
			elseif($this->session->userdata('login')=== FALSE){
				$this->session->set_flashdata('error','Sorry!! Your Username Or Password Is Incorrect ');
				redirect('dashboard_posting');
			}

		}
	}

	/**
     * logout
     *
     * Unset the dashboard posting session
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
	public function logout(){
		$ses_user = array("dpuser"=>"","dpuserid"=>0,"dplogin"=>FALSE);
		$this->session->set_userdata($ses_user);
		$this->session->set_flashdata('success', 'You have Logged Out!!');
		redirect('dashboard_posting');
	}

	/**
     * medals
     *
     * ADD/Edit Medals details
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function medals($user_id){
		if ($this->input->post('submit')) {
		  $date = date("Y-m-d H:i:s");
          //$UpdateData["name"] = urldecode($name);
          $UpdateData["user_id"] = $user_id;
		  $UpdateData["dop"] = $this->input->post('dop');
		  $UpdateData["medalfor"] = $this->input->post('medalfor');
          $UpdateData["gold"] = $this->input->post('gold');
		  if($UpdateData["gold"]>5){
		  $UpdateData["gold"] = 5;
		  }
	      $UpdateData["silver"] = $this->input->post('silver');
		   if($UpdateData["silver"]>5){
		  $UpdateData["silver"] = 5;
		  }
		  $UpdateData["bronze"] = $this->input->post('bronze');
		   if($UpdateData["bronze"]>5){
		  $UpdateData["bronze"] = 5;
		  }
		  $UpdateData["status"] = 1;
		  $UpdateData["modified_date"] = $date;
		  $updateFlag = $this->medals_model->update_medals($user_id, $UpdateData);
		  if ($updateFlag) {
              $this->session->set_flashdata('success', 'Medal Details Updated Successfully !!');
              redirect('dashboard_posting/get_details/'.$user_id);
          }
		  else{
		    $this->session->set_flashdata('error', 'Failed to Update Medal Details!!');
		    redirect('dashboard_posting/get_details/'.$user_id);
		  }

        }
	}

	/**
     * assignment
     *
     * Save assignment deatails
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function assignment($user_id){
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$inserted_rightsFlag = true;
            $arrData["user_id"] = $user_id;
            $arrData["subject"] = $this->input->post('subject');
			$arrData["details"] = $this->input->post('details');
            $arrData["deadline"] = $this->input->post('deadline');
			$arrData["comments"] = $this->input->post('specialcomments');
            $arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
			$arrData["status"] = 1;
			$insertedFlag = $this->medals_model->save_assignmentdetails($user_id,$arrData);
			if ($insertedFlag) {
			  $this->session->set_flashdata('success', 'Assignmet Details Added Successfully !!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Assignment Details!!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
          }
	}

	/**
     * kra
     *
     * Save kra deatails
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function kra($user_id){
	 if ($this->input->post('submit')) {
		   $date = date("Y-m-d H:i:s");
           $inserted_rightsFlag = true;
           $arrData["user_id"] = $user_id;
           //$arrData["name"] = urldecode($name);
           $arrData["details"] = $this->input->post('details');
		   $arrData["created_date"] = $date;
           $arrData["modified_date"] = $date;
		   $arrData["status"] = 1;
		   $insertedFlag = $this->medals_model->save_kradetails($user_id,$arrData);
		   if ($insertedFlag) {
			  $this->session->set_flashdata('success', 'KRA Details Added Successfully !!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add KRA Details!!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
          }
	}

	/**
     * kpi
     *
     * Save kpi deatails
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function kpi($user_id){
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$inserted_rightsFlag = true;
            $arrData["user_id"] = $user_id;
            //$arrData["name"] = urldecode($name);
			$arrData["details"] = $this->input->post('details');
			$arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
			$arrData["status"] = 1;
			$insertedFlag = $this->medals_model->save_kpidetails($user_id,$arrData);
			if ($insertedFlag) {
			  $this->session->set_flashdata('success', 'KPI Details Added Successfully !!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add KPI Details!!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
          }
	}

	/**
     * training_programs
     *
     * Save training programs deatails
     * @author Ketan Sangani
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function training_programs($user_id){
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $arrData["user_id"] = $user_id;
            //$arrData["name"] = urldecode($name);
			$arrData["programname"] = $this->input->post('programname');
			$arrData["importance_level"] = $this->input->post('importance');
			$arrData["process"] = $this->input->post('process');
            $arrData["start_date"] = $this->input->post('sdate');
			$arrData["learning_areas"] = $this->input->post('learning');
			$arrData["deadline"] = $this->input->post('deadline');
			$arrData["total_hours"] = $this->input->post('hours');
			$arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
			$arrData["status"] = 1;
			$insertedFlag = $this->medals_model->save_programdetails($user_id,$arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Training Program Details Added Successfully !!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Training Program Details!!');
              redirect('dashboard_posting/get_details/'.$user_id);
            }
		}
	}
	/**
     * delete_special_assignments
     *
     * Delete special assignments details
     * @author Ketan Sangani
	 * @access public
     * @param $id,$name
     * @return void
     *
     */
	function delete_special_assignments($id,$user_id){
		if($this->db->delete('special_assignments', array('id' => $id))){
			redirect('dashboard_posting/get_details/'.$user_id);
		 }

	}

	/**
     * delete_kpi
     *
     * Delete kpis details
     * @author Ketan Sangani
	 * @access public
     * @param $id,$name
     * @return void
     *
     */
	function delete_kpi($id,$user_id){
		if($this->db->delete('kpi', array('id' => $id))){
			redirect('dashboard_posting/get_details/'.$user_id);
		}
    }


	/**
     * delete_kra
     *
     * Delete kras details
     * @author Ketan Sangani
	 * @access public
     * @param $id,$name
     * @return void
     *
     */
	function delete_kra($id,$user_id){
		if($this->db->delete('kra', array('id' => $id))){
			redirect('dashboard_posting/get_details/'.$user_id);
		}

	}

	/**
     * delete_training_programs
     *
     * Delete training programs details
     * @author Ketan Sangani
	 * @access public
     * @param $id,$name
     * @return void
     *
     */
	function delete_training_programs($id,$user_id){
		if($this->db->delete('training_programs', array('id' => $id))){
			redirect('dashboard_posting/get_details/'.$user_id);
		}
	}

}

/* End of file dashboard_posting.php */
/* Location: ./application/controllers/dashboard_posting.php */