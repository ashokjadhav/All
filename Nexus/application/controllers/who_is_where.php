<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Who_is_where Class
 * @author Ashok jadhav
 * @subpackage Controller
 *
 */
class Who_is_where extends CI_Controller {
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
		$this->load->model('who_is_where_model');
		$this->load->model('admin/employee_model');

	}
	/**
     * index
     *
     * Display Employee Status
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function index(){
		$arrData['tab']=$this->uri->segment(1);
		$id = $this->session->userdata('site_userid');
		$arrData['Details']=$this->who_is_where_model->get_all_details($id);
		//var_dump($arrData['Details']);exit;
		$arrData['middle']='who_is_where';
		$this->load->view('template',$arrData);
	}

	/**
     * add
     *
     * Add My Status
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function add() {
		if ($_POST) {
			if ($this->input->post('submit')) {
				$date = date("Y-m-d H:i:s");
			    $inserted_rightsFlag = true;
				//$arrData["name"] = $this->input->post('name');
                $arrData["user_id"] = $this->input->post('empid');
				$arrData["status"] = $this->input->post('my_status');
				if($arrData['status']=='Travel'){
					$arrData["from"] = $this->input->post('from');
					$arrData["to"] = $this->input->post('to');
				}
				$arrData["created_date"] = $date;
				$arrData["modified_date"] = $date;
				$insertedFlag = $this->who_is_where_model->save_status($arrData);
				if ($insertedFlag) {
				  redirect('who_is_where');
				}
				else{
					echo "Failed";
				}
			}
		}
   }

	/**
     * search
     *
     * Search status of other employees
     * @author Ashok Jadhav
	 * @access public
     * @param $name
     * @return void
     *
     */
	public function search($userid) {

		$details =  $this->who_is_where_model->search_details($userid);
		echo  json_encode($details);
	}

	/**
     * list_employee_name
     *
     * this function helps to display auto suggestion of name during search
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     *
     */
	public function list_employee_name() {
		$data = $this->employee_model->list_name();
		echo json_encode($data);

	}
	/**
   * To fetch employee id from database
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
}

/* End of file who_is_where.php */
/* Location: ./application/controllers/who_is_where.php */