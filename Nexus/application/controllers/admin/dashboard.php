<?php
/**
 * Dashboard Class
 *
 * @author Ashok jadhav
 * @package CI_dashboard
 * @subpackage Controller
 *
 */
class dashboard extends CI_Controller {

  /**
  * __construct
  *
  * Calls parent constructor
  * @author Ashok Jadhav
  * @access public
  * @return void
  */
  function __construct()
  {
    parent::__construct();
	//print($this->session->userdata('logged_in'));exit;
    if($this->session->userdata('logged_in') == FALSE) {
		$this->session->set_flashdata('error', 'Please Login First!!');
		redirect('admin');
		break;
    }
  }


  /**
     * index
     *
     * This help to display  Admin Dashboard      *
     * @author  Ashok jadhav
     * @access  public
     * @return  void
     */
  public function index(){

    $arrData['tab']=$this->uri->segment(2);
	$arrData['middle'] = 'admin/home';
    $this->load->view('admin/template', $arrData);
  }


}
/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */