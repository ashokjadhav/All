<?php
/**
 * Employee_directory Class
 *
 * @author Ketan Sangani
 * @package CI_Employee_directory
 * @subpackage Controller
 *
 */
class Employee_directory extends CI_Controller {


 /**
     * construct
     *
     * constructor method (checks login status)
     * @author ketan sangani
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
    $this->load->model('admin/employee_model');
    $this->load->model('admin/company_location_model');
   /*
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');
    }
    */
  }

  /**
     * index
     *
     * This help to display mumbai and kerala office employees Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
    public function index(){
    if(!check_priviledges()){
        $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');}
        $arrData['tab']=$this->uri->segment(2);
    	if ($this->input->post('delete')) {
            $multiDelete = $this->employee_model->multi_delete_employees($this->input->post('delete'));
            if ($multiDelete)
                $this->session->set_flashdata('success', 'Employee Details Deleted Successfully !!');
            else
                $this->session->set_flashdata('error', 'Failed to Delete Employee Details !!');
            /*We are redirecting coz it has $_POST and so while refreshing everytime it will ask for resending data.
            To avoid this we are redirecting it. */
            redirect('admin/employee_directory');
        }
        $arrData['records'] = $this->employee_model->get_data();
        $arrData['middle'] = 'admin/employee_directory/index';
        $this->load->view('admin/template', $arrData);
    }


   /**
     * add
     *
     * saves record of employees
     * @access public
     * @param $table
     * @return void
     * @author Ketan Sangani
     *
     */
	function add()
	{
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
            if ($_POST) {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('emp', 'Employee Id', 'required|is_unique[employees.emp_id]');
    		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[employees.username]');
    		if ($this->form_validation->run() == FALSE) {
                $arrData['error']= validation_errors();
            }
            else{
            if ($this->input->post('submit')) {
                $config=array();
                $config['upload_path'] = './files/';
                $config['max-size'] = 2000;
                $config['overwrite'] = TRUE;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);

                $date = date("Y-m-d H:i:s");
                $inserted_rightsFlag = true;

        		$arrData["emp_id"] = $this->input->post('emp');
                $arrData["name"] = $this->input->post('name');
                $arrData["email"] = $this->input->post('email');
        		$arrData["username"] = $this->input->post('username');
        		$arrData["dob"] = $this->input->post('dob');
        		$arrData["department"] = $this->input->post('department');
        		$arrData["designation"] = $this->input->post('designation');
                $arrData["description"] = $this->input->post('description');
        		$arrData["contact"] = $this->input->post('contact');
        		$arrData["extn"] = $this->input->post('extn');
        		$arrData["password"] = md5($this->input->post('password'));
        		$arrData["location_id"] = $this->input->post('location');
        		$arrData["type"] = $this->input->post('type');
                // $arrData["address"] = $this->input->post('address');
                $arrData["company"] = $this->input->post('company');
		        $arrData["joining_date"] = $this->input->post('joining_date');
    		    $arrData["floor"] = $this->input->post('floor');
                $arrData["created_date"] = $date;
                $arrData["modified_date"] = $date;
                
                $this->upload->initialize($config);
                if (! $this->upload->do_upload('logo')){
                    //$arrData['error'] = $this->upload->display_errors();
                }
                else{
                    $data=$this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './files/'.$_FILES['logo']['name'];
                    $config['new_image'] ='./Resize/';
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = FALSE;
                    $config['width']  = 250;
                    $config['height'] = 150;

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    if($data['file_name']!=''){

                        $arrData["img"] = $data['file_name'];
                        $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];
                    }
                }
                if($this->employee_model->add_data($arrData)){
    		        $this->session->set_flashdata('success', 'Record saved successfully');
    		        redirect('admin/employee_directory/');
	            }
	            else {
		            $this->session->set_flashdata('error', 'Sorry!!!Some error has occured while saving.');
		        }
                //redirect('admin/employee_directory/index'.$table);
            }
            }
        }
        else{
            $arrData['error']='';
        }
	    //$arrData['table'] = $table;
    	$arrData['tab']=$this->uri->segment(2);
        $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
        $arrData['middle'] = 'admin/employee_directory/add';
        $this->load->view('admin/template', $arrData);
    }

    /**
     * edit
     *
     * Edit record of employees
     * @access public
     * @param $id
     * @return void
     * @author Ketan Sangani
     *
     */
    public function edit($id) {
	 if(!check_priviledges()){
	    $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');}
	    $arrData['userDetailsArr'] = "";
    if ($_POST) {
		$user_details = $this->employee_model->get_data($id);
		$arrData['userDetailsArr'] = $user_details;
		if($arrData['userDetailsArr'][0]['emp_id']!=$this->input->post('emp')){
			$this->form_validation->set_rules('emp', 'Employee Id', 'required|is_unique[employees.emp_id]');
		}else{
            $this->form_validation->set_rules('emp', 'Employee Id', 'required');            
        }
        if($arrData['userDetailsArr'][0]['username'] != $this->input->post('username')){
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[employees.username]');
		}else{
            $this->form_validation->set_rules('username', 'Username', 'required');            
        }
        if ($this->form_validation->run() == FALSE) {
            $arrData['error']= validation_errors();
        }
	  else{
		if ($this->input->post('submit')) {
            $config=array();
            $config['upload_path'] = './files/';
            $config['max-size'] = 2000;
            $config['overwrite'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_width'] = 5000;
	        $config['max_height'] = 5000;
            $this->load->library('upload', $config);
            $date = date("Y-m-d H:i:s");
            $inserted_rightsFlag = true;
            $UpdateData["emp_id"] = $this->input->post('emp');
            $UpdateData["name"] = $this->input->post('name');
            $UpdateData["email"] = $this->input->post('email');
            $UpdateData["username"] = $this->input->post('username');
            $UpdateData["dob"] = $this->input->post('dob');
            $UpdateData["department"] = $this->input->post('department');
            $UpdateData["designation"] = $this->input->post('designation');
            $UpdateData["description"] = $this->input->post('description');
            $UpdateData["contact"] = $this->input->post('contact');
            $UpdateData["address"] = $this->input->post('address');
            $UpdateData["extn"] = $this->input->post('extn');
            if($this->input->post('password')!=''){
                $UpdateData["password"] = md5($this->input->post('password'));
            }
            $UpdateData["company"] = $this->input->post('company');
            $UpdateData["joining_date"] = $this->input->post('joining_date');
            $UpdateData["floor"] = $this->input->post('floor');
            $UpdateData["location_id"] = $this->input->post('location');
            $UpdateData["type"] = $this->input->post('type');
            $this->upload->initialize($config);
            $date = date("Y-m-d H:i:s");
            $UpdateData["modified_date"] = $date;
			if ( ! $this->upload->do_upload('logo')){}
            else{
    			$data=$this->upload->data();
    			$config['image_library'] = 'gd2';
    			$config['source_image'] ='./files/'.$_FILES['logo']['name'];
    			$config['new_image'] = './Resize/';
    			$config['create_thumb'] = TRUE;
    			$config['maintain_ratio'] = TRUE;
    			$config['width']  = 250;
    			$config['height'] = 150;
                $this->load->library('image_lib', $config);
    			$this->image_lib->resize();
                if($data['file_name']!=''){
                    $UpdateData["img"] = $data['file_name'];
                    $UpdateData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];
                }
            }
            $updateFlag = $this->employee_model->update_data($UpdateData,$id);
            if ($updateFlag) {
                $this->session->set_flashdata('success', 'Employee Details Updated Successfully !!');
                redirect('admin/employee_directory/');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to Update Employee Details!!');
                redirect('admin/user/edit/'.$iuserId);
            }

        }}

    }
    else {
     $user_details = $this->employee_model->get_data($id);
      $arrData['userDetailsArr'] = $user_details;
	  $arrData['error']='';

    }
	//$arrData['table']=$table;
	 $arrData['tab']=$this->uri->segment(2);
     $arrData['company_location_details']=$this->company_location_model->get_company_location_details();
    $arrData['middle'] = 'admin/employee_directory/edit';
    $this->load->view('admin/template', $arrData);
  }
   /**
   * delete
   *
   * This help to delete user Details
   *
   * @author  zchngs
   * @access  public
   * @return  void
   */
  public function delete($id=null) {
    if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->employee_model->delete_employee($id);
    if ($delete)
      $this->session->set_flashdata('success', 'Employee Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Employee Details!!');
      redirect('admin/employee_directory');
  }
  /**
   * set status
   *
   * This help to publish employee Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->employee_model->set_employee($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish employee Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->employee_model->unset_employee($icategoryId);

  }

  /**
     * import_record
     *
     * uploads excelsheet for importing data and call function for importing data
     * @access public
     * @param none
     * @return void
     * @author ketan Sangani
     *
     */
	function import_record()
	{
		$config['upload_path'] = './upload/record/';
		$folderPath = $_SERVER['DOCUMENT_ROOT'].'/upload/record/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '0';

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', 'Sorry!!!Some error has occured while uploading file.');
		}
		else
		{
			$file_data = array('upload_data' => $this->upload->data());
			foreach($file_data as $item)
			{
				$file = $item['file_name'];
			}

			//$this->test1($file);exit;
			if($this->excel_read($file))
			{
				$this->session->set_flashdata('success', 'Details inserted successfully');
			}
			else {
				$this->session->set_flashdata('error', 'Sorry!!!Some error has occured while insertion.');
			}
		}

		redirect('admin/employee_directory');
	}

	/**
     * excel_read
     *
     * parse excelsheet and imports data to db
     * @access public
     * @param $filename
     * @return void
     * @author Ketan Sangani
     *
     */
	function excel_read($filename = null)
	{
		if($filename)
		{
			$table = strstr($filename,'.',true);
            $this->load->library('excelreader/Excel/Spreadsheet_Excel_Reader');
            $this->load->library('Excel');
            $ObjExcel = new Spreadsheet_Excel_Reader();
	        //$ObjExcel->setOutputEncoding('CP1251');
	        $ObjExcel->read('./upload/record/'.$filename);
            $objPHPExcel = new PHPExcel();
            $worksheet = $objPHPExcel->getActiveSheet();
            $count = count($ObjExcel->sheets[0]['cells']);
            $data = $ObjExcel->sheets[0]['cells'];
            $arr = array_values($ObjExcel->sheets[0]['cells']);

            for($row = 1; $row <= $count; ++$row) {
                $worksheet->setCellValue('A'.$row, $arr[$row-1][7]);
                $worksheet->setCellValue('C'.$row, '=A'.$row);
                $worksheet->setCellValue('D'.$row, $arr[$row-1][8]);
                $worksheet->setCellValue('F'.$row, '=D'.$row);
            }

            $worksheet->getStyle('C1:C'.$count)
                      ->getNumberFormat()
                      ->setFormatCode('yyyy-mm-dd');
            $worksheet->getStyle('C1:F'.$count)
                      ->getNumberFormat()
                      ->setFormatCode('yyyy-mm-dd');

            for ($row = 1; $row <= $count; ++$row) {
                $arr[$row-1][7] = $worksheet->getCell('C'.$row)->getFormattedValue();
                $arr[$row-1][8] = $worksheet->getCell('F'.$row)->getFormattedValue();
            }
                        

			$fields = $arr[0];
            foreach($arr as $key=>$val){
                foreach($val as $k=>$v){
                    if($fields[$k] == 'password' && $v != 'password'){
                        $records[$fields[$k]] = md5($v);
                    }else if($fields[$k]=='username' && $v!='username'){
					   $records[$fields[$k]] = str_replace(' ','',$v);
                    }else if($fields[$k]=='location_id' && $v!='location_id'){
                       $records[$fields[$k]] = $this->employee_model->get_location_id(ucfirst(strtolower($v)));
                    }else{
                       $records[$fields[$k]] = $v;
					}
				}
                $this->employee_model->add_data($records);
			}

            return TRUE;
		}

	}

  /**
   * list for add juniors
   *
   * This help to assign team leader
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function list_employee() {

	$data = $this->employee_model->list_juniors();
	echo json_encode($data);

  }
/**
   * list for employees names for autocomplete
   *
   * This help to get employee name easily
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
   public function list_employee_name() {

	$data = $this->employee_model->list_name();
	echo json_encode($data);

  }
  /**
   * To fetch employee id fro database
   *
   * This help to get employee id easily
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function get_emp_id($name) {

	$data = $this->employee_model->get_emp_id(urldecode($name));
	echo json_encode($data);

  }
  /**
   * To fetch employee id fro database
   *
   * This help to get employee id easily
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function get_user_id($email) {

	$data = $this->employee_model->get_user_id(urldecode($email));
	echo json_encode($data);

  }
}