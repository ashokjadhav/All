<?php
    /**
     * boardDirectors Class 
     *
     * @author Ashok Jadhav
     * @package CI_Hr_help_desk
     * @subpackage Controller
     *
     */
    class boardDirectors extends CI_Controller {

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
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
            redirect('admin');
            break;
        }
        $this->load->model('admin/boardDirectors_model');
    }

   /**
     * index
     *
     * This help to display Directors Details companywise
     * 
     * @author  Ashok Jadhav
     * @access  public
     * @return  void
     */

    public function index($table=null){  
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
        $arrData['tab']=$this->uri->segment(2);
        if ($this->input->post('delete')) {
            $multiDelete = $this->boardDirectors_model->multi_delete_directors($this->input->post('delete'));
            if ($multiDelete)
                $this->session->set_flashdata('success', 'Directors Deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to Delete Directors !!');
            // We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
            // To avoid this we are redirecting it.
            redirect('admin/boardDirectors');
        }
        $arrData['company_details']=$this->boardDirectors_model->get_company_details();
        if($table == null && !empty($arrData['company_details'])){
          $table = $arrData['company_details'][0]['id'];
        }
        $arrData['table']=$table;
        $arrData['DirectorsDetails'] = $this->boardDirectors_model->get_Directors_details($table);
        
        $arrData['middle'] = 'admin/BOD/list';
        $this->load->view('admin/template', $arrData);
    }
  
   /**
     * add
     *
     * This help to add board Directors Details
     * 
     * @author  Ashok Jadhav(AJ)
     * @access  public
     * @return  void
     */
    public function add($table=null) {
      if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
      }
      if ($_POST) {
       $this->form_validation->set_rules('empid', 'Employee Name', 'required');
          if ($this->form_validation->run() == FALSE) {
              $arrData['error']= "Already Exist!!  ".validation_errors();
          }
          else{
            if ($this->input->post('submit')) {
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            /*$arrData["company_id"] = $this->input->post('company_id');*/
            $arrData["company_id"] = $table;
      			$arrData["user_id"] = $this->input->post('empid');
      			$arrData["created_date"] = $date;
            $arrData["modified_date"] = $date;
            $insertedFlag = $this->boardDirectors_model->save_Directorsdetails($arrData);
		        if ($insertedFlag) {
              $this->session->set_flashdata('success', 'Directors Details Added Successfully !!');
              redirect('admin/boardDirectors/index/'.$table);
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Add Directors Details!!');
              redirect('admin/boardDirectors/add/'.$table);
            }
          }
        }
      }
      else{
        $arrData['error']='';
      }
      $arrData['tab']=$this->uri->segment(2);
      $arrData['company_details']=$this->boardDirectors_model->get_company_details();
      $arrData['middle'] = 'admin/BOD/add';
      $this->load->view('admin/template', $arrData);
    }


 /**
   * edit
   *
   * This help to edit boardDirectors Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iuserId
   * @return  void
   */
   
    public function edit($table=null,$iuserId) {
      if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
      }
      $arrData['DirectorsDetailsArr'] = "";
      if ($_POST) {
        $arrData['error']='';
		    $hr_help_desk_details = $this->boardDirectors_model->get_editDirectors_details($iuserId);
		    $arrData['DirectorsDetailsArr'] = $hr_help_desk_details;
        if ($this->input->post('submit')){
          $date = date("Y-m-d H:i:s");
		      $UpdateData["user_id"] = $this->input->post('empid');
          /*$UpdateData["company_id"] = $this->input->post('company_id');*/
          $UpdateData["company_id"] = $table;
		      $UpdateData["modified_date"] = $date;
          $updateFlag = $this->boardDirectors_model->update_Directors($iuserId, $UpdateData);
          if ($updateFlag) {
		        $this->session->set_flashdata('success', 'Directors Details Updated Successfully !!');
		        redirect('admin/boardDirectors/index/'.$table);
		      }    
		      else{
		        $this->session->set_flashdata('error', 'Failed to Update Directors Details!!');
		        redirect('admin/boardDirectors/edit/'.$table .'/'. $iuserId);
		      }
        }
      }
      else {
        $hr_help_desk_details = $this->boardDirectors_model->get_editDirectors_details($iuserId);
        $arrData['DirectorsDetailsArr'] = $hr_help_desk_details;
        $arrData['error']='';
      }
      $arrData['tab']=$this->uri->segment(2);
      $arrData['company_details']=$this->boardDirectors_model->get_company_details();
      $arrData['middle'] = 'admin/BOD/edit';
      $this->load->view('admin/template', $arrData);
    }

  /**
   * delete
   *
   * This help to delete Board Directors Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @param   $iuserId
   * @return  void
   */
    public function delete($iuserId) {
	   if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
        $delete = $this->boardDirectors_model->delete_Directors($iuserId);
        if ($delete)
            $this->session->set_flashdata('success', 'Directors Details Deleted Successfully !!');
        else
            $this->session->set_flashdata('error', 'Failed to Delete Directors Details!!');
            redirect('admin/boardDirectors');
    }

 /**
   * set status
   *
   * This help to publish Directors Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */

    public function set_status($icategoryId) {
        $delete = $this->boardDirectors_model->set_Directors($icategoryId);
    }

   /**
   * unset status
   *
   * This help to unpublish Directors Details
   * 
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
    public function unset_status($icategoryId) {
        $delete = $this->boardDirectors_model->unset_Directors($icategoryId);
    }
}