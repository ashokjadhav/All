<?php

/**
 * Meta Tags
 * 
 * @package Meta Tags
 * @subpackage Controller
 * @author  Javed Hasan 
 * @link URL description
 */
class Usermanagement extends CI_Controller {

    public function __construct() {

        parent::__construct();
         //if(!check_priviledges())
              //redirect('admin/dashboard');
         
        if($this->session->userdata('logged_in') == FALSE) {
      $this->session->set_flashdata('error', 'Please Login First!!');
      redirect('admin');
      break;
    }
        
        
        $this->load->model(array('admin/usermanagement_model'));
        $this->load->library('controllerlist');
		if(!check_priviledges())
       redirect('admin/dashboard');
    }

    /**
     * Index Function
     * @access public 
     * @param 
     * @return 
     */
    public function index() {
		$arrData['tab']=$this->uri->segment(2);
		$arrData['user_data'] = $this->usermanagement_model->get();
        $arrData['middle'] = 'admin/userm/index';
		$this->load->view('admin/template',$arrData);
    }

    public function add() {
	 
    if ($_POST) {
		  
      if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$inserted_rightsFlag = true;
            $arrData["username"] = $this->input->post('name');
			$emp_name= $this->input->post('empname');
			$employee_id = $this->usermanagement_model->get_emp_id($emp_name);
			$arrData["employee_id"]	= $employee_id[0]['id'];
			$arrData["password"] = md5($this->input->post('pass'));
			$arrData["role_id"] = $this->input->post('role');
			$arrData["created"] = $date;
            $insertedFlag = $this->usermanagement_model->add($arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Leader Details Added Successfully !!');
              redirect('admin/usermanagement');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add leader Details!!');
              redirect('admin/usermanagement/add');
            }
          }
         
      
    }
    else{
      $arrData['error']='';
      }
	  $arrData['role'] = $this->usermanagement_model->get_role();
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/userm/add';
    $this->load->view('admin/template', $arrData);
  }

  public function edit($id) {
	 
    if ($_POST) {
		  
      if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$inserted_rightsFlag = true;
			if($this->input->post('pass')!= ''){
            
			$arrData["password"] = md5($this->input->post('pass'));
			}
			$arrData["username"] = $this->input->post('name');
			$emp_name= $this->input->post('empname');
			$employee_id = $this->usermanagement_model->get_emp_id($emp_name);
			$arrData["employee_id"]	= $employee_id[0]['id'];
			$arrData["role_id"] = $this->input->post('role');
			$arrData["created"] = $date;
            $insertedFlag = $this->usermanagement_model->update($id,$arrData);
			if ($insertedFlag) {

              $this->session->set_flashdata('success', 'Leader Details Added Successfully !!');
              redirect('admin/usermanagement');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add leader Details!!');
              redirect('admin/usermanagement/edit/'.$id);
            }
          }
         
      
    }
    else{
      $arrData['error']='';
      }

	  $arrData['role'] = $this->usermanagement_model->get_role();
	  $arrData['user_role'] = $this->usermanagement_model->get_user_role($id);
	  $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/userm/edit';
    $this->load->view('admin/template', $arrData);
  }
  
   public function view_role()
   {	
		$arrData['tab']=$this->uri->segment(2);
		//$this->load->library('controllerlist');
        //$arrData['controller']=$this->controllerlist->getControllers();
		$arrData['role_data'] = $this->usermanagement_model->get_role();
		$arrData['middle'] = 'admin/userm/view_role';
		$this->load->view('admin/template', $arrData);
       
   }

     public function add_role() {
		 if ($_POST) {
			
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$insertedFlag = true;
            $arrData["role"] = $this->input->post('role');
			$arrData["privileges"] = serialize($this->input->post("permission"));
			$arrData["created"] = $date;
            $insertedFlag = $this->usermanagement_model->add_roles($arrData);
			if($insertedFlag) {

              $this->session->set_flashdata('success', 'Role Added Successfully !!');
              redirect('admin/usermanagement/view_role');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Role!!');
              redirect('admin/usermanagement/add_role');
            }
          }
         
      
    }
    else{
      $arrData['error']='';
      }

//for Library

	 $libcontrollers = $this->controllerlist->getControllers();
	 foreach($libcontrollers as $key => $value) {
		$item1=array('category','sub_category','resource_management','borrowed','lost','returned','lending_management');
		$index = in_array($key,$item1);
		if(!$index){
			unset($libcontrollers[$key]);
		}
	}
	$arrData['librarycontroller']= $libcontrollers;

//for Dashboard Posting
	$dashContr = $this->controllerlist->getControllers();
	foreach($dashContr as $key => $value) {
		$item2 = array('my_medals','special_assignments','kra','kpi','training_programs');
		$index = in_array($key,$item2);
		if(!$index){
			unset($dashContr[$key]);
		}
	}
	$arrData['Dashcontroller']= $dashContr;

//for Elearning
	$elearnContr = $this->controllerlist->getControllers();
	foreach($elearnContr as $key => $value) {
		$item3=array('elearning_category','articles','elearning_slides','elearning_videos','book_summary','quiz_subcategory','elearning_quiz','quiz_scores','elearning_totaltime');
		$index = in_array($key,$item3);
		if(!$index){
			unset($elearnContr[$key]);
		}
	}
	$arrData['Elearncontroller']= $elearnContr;

//for Travel Desk
	$travelContr = $this->controllerlist->getControllers();
	foreach($travelContr as $key => $value) {
		$item4=array('travel_airlines','travel_locations','approve_authority','travel_requests','hotel_requests','ticket_modified','ticket_cancelled','ticket_approved','guesthouse_locations','hotel_locations');
		$index = in_array($key,$item4);
		if(!$index){
			unset($travelContr[$key]);
		}
	}
	$arrData['Travelcontroller']= $travelContr;

//for Dashboard
	$Allontr = $this->controllerlist->getControllers();
	$item5 = array('login','logout','dashboard','usermanagement');
	foreach($Allontr as $key => $value) {
		$item=array_merge($item1,$item2);
		$item=array_merge($item,$item3);
		$item=array_merge($item,$item4);
		$item=array_merge($item,$item5);
		$index = in_array($key,$item);
		if($index){
			unset($Allontr[$key]);
		}
	}
	$arrData['Allcontroller']= $Allontr;


	
	
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/userm/role_add';
    $this->load->view('admin/template', $arrData);
  }

	 public function edit_role($id) {
		 if ($_POST) {
			
		if ($this->input->post('submit')) {
			$date = date("Y-m-d H:i:s");
			$insertedFlag = true;
            $arrData["role"] = $this->input->post('role');
			$arrData["privileges"] = serialize($this->input->post("permission"));
			$arrData["created"] = $date;
            $insertedFlag =$this->usermanagement_model->update_role($id, $arrData);
			if($insertedFlag) {
				$this->session->set_flashdata('success', 'Role updated Successfully !!');
				redirect('admin/usermanagement/view_role');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to update Role!!');
              redirect('admin/usermanagement/add_role');
            }
          }
         
      
    }
    else{
      $arrData['error']='';
      }	
    //for Library

	 $libcontrollers = $this->controllerlist->getControllers();
	 foreach($libcontrollers as $key => $value) {
		$item1=array('category','sub_category','resource_management','borrowed','lost','returned','lending_management');
		$index = in_array($key,$item1);
		if(!$index){
			unset($libcontrollers[$key]);
		}
	}
	$arrData['librarycontroller']= $libcontrollers;

//for Dashboard Posting
	$dashContr = $this->controllerlist->getControllers();
	foreach($dashContr as $key => $value) {
		$item2 = array('my_medals','special_assignments','kra','kpi','training_programs');
		$index = in_array($key,$item2);
		if(!$index){
			unset($dashContr[$key]);
		}
	}
	$arrData['Dashcontroller']= $dashContr;

//for Elearning
	$elearnContr = $this->controllerlist->getControllers();
	foreach($elearnContr as $key => $value) {
		$item3=array('elearning_category','articles','elearning_slides','elearning_videos','book_summary','quiz_subcategory','elearning_quiz','quiz_scores','elearning_totaltime');
		$index = in_array($key,$item3);
		if(!$index){
			unset($elearnContr[$key]);
		}
	}
	$arrData['Elearncontroller']= $elearnContr;

//for Travel Desk
	$travelContr = $this->controllerlist->getControllers();
	foreach($travelContr as $key => $value) {
		$item4=array('travel_airlines','travel_locations','approve_authority','travel_requests','hotel_requests','ticket_modified','ticket_cancelled','ticket_approved','guesthouse_locations','hotel_locations');
		$index = in_array($key,$item4);
		if(!$index){
			unset($travelContr[$key]);
		}
	}
	$arrData['Travelcontroller']= $travelContr;

//for Dashboard
	$Allontr = $this->controllerlist->getControllers();
	$item5 = array('login','logout','dashboard','usermanagement');
	foreach($Allontr as $key => $value) {
		$item=array_merge($item1,$item2);
		$item=array_merge($item,$item3);
		$item=array_merge($item,$item4);
		$item=array_merge($item,$item5);
		$index = in_array($key,$item);
		if($index){
			unset($Allontr[$key]);
		}
	}
	$arrData['Allcontroller']= $Allontr;
	$arrData['record'] = $this->usermanagement_model->get_role($id);
	$arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/userm/role_edit';
    $this->load->view('admin/template', $arrData);
  }

  /**
   * delete_role
   *
   * This help to delete User Roles
   * 
   * @author  zchngs
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete_role($iuserId) {
    $delete = $this->usermanagement_model->deleterole($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Role Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Role!!');
      redirect('admin/usermanagement/view_role');
  }
   /**
   * set status
   *
   * This help to publish User Role
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status_role($icategoryId) {
    $delete = $this->usermanagement_model->set_role($icategoryId);
    
  }

   /**
   * unset status
   *
   * This help to unpublish  User Role
   * 
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status_role($icategoryId) {
    $delete = $this->usermanagement_model->unset_role($icategoryId);
   
  }
  public function delete($iuserId) {
	  
    $delete = $this->usermanagement_model->delete($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'User Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete User!');
      redirect('admin/usermanagement');
  }
  
   
}