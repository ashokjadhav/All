<?php
/**
 *
 * This is jobopenings Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class travel_desk_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  zchngs
   * @access  public
   * @return  void
   */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }


 /**
   * get_travelrequests_management_details
   *
   * This is used to fetches lending_management details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_travelrequests(){
		$authority = $this->session->userdata('site_userid');
		$approve_status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$request_status="(travel_desk.request_status = '0' OR travel_desk.request_status = '1')";
		$this->db->select('employees.name as name,employees.department as													department,employees.designation as designation,travel_desk.*');
        $this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->where('authority',$authority);
        $this->db->where($request_status);
		$this->db->where($approve_status);
		$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('travel_desk');
		return $query->result_array();

  }


  function update_request($arrData,$id){
		$this->db->where('id',$id);
		if($this->db->update('travel_desk', $arrData)){
		return true;
		}
		else{
			return false;
		}
  }

 /**
   * get_requestdetails
   *
   * This is used to fetches updated travel request details for send mail
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */

  function get_requestdetails($id){
		$this->db->select('employees.email as email,employees.name as name,e2.name as authorityname,employees.department as						department,employees.designation as designation,travel_desk.*');
        $this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->join('employees as e2','e2.id = travel_desk.authority','full outer');
		$this->db->where('travel_desk.id',$id);
		$query = $this->db->get('travel_desk');
		return $query->result_array();

  }

  /**
   * get_emailofauthority
   *
   * This is used to fetches emailid of travel authority
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_emailofauthority($authorityid){
		$this->db->select('employees.email');
        $this->db->where('employees.id',$authorityid);
		$query = $this->db->get('employees');
		return $query->result_array();

  }

}

?>