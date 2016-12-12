<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    zchngs
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */
 
// ------------------------------------------------------------------------

/**
 *
 * This is My_appointments_model Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class My_appointments_model extends CI_Model{
  
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
   * save_apointmentsdetails
   *
   * This is used to save apointments details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_apointmentsdetails($arrData){
    if($this->db->insert('apointments', $arrData)){
		return true;
	}
	else{
		return false;
	}
    

  }

    /**
   * get_jobopenings_details
   *
   * This is used to fetches jobopenings details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
	function get_apointmentdetails($id){
		$arrData = array();
		$name=$id;
		$query=$this->db->query("UPDATE apointments SET status=1 WHERE appointment_date < DATE(NOW())");
		$this->db->select("employees.name as fname,e2.name as tname,apointments.*");
        $this->db->from("apointments");
        $this->db->join("employees",'apointments.from_name = employees.id','LEFT');
		$this->db->join("employees as e2",'apointments.to_name = e2.id','LEFT');
		$this->db->where('apointments.from_name',$name);
		$this->db->where('apointments.status','0');
        $this->db->get();
        $query1 = $this->db->last_query();
		
         
        $this->db->select("employees.name as fname,e2.name as tname,apointments.*");
        $this->db->from("apointments");
        $this->db->join("employees",'apointments.from_name = employees.id','LEFT');
		$this->db->join("employees as e2",'apointments.to_name = e2.id','LEFT');
		$this->db->where('apointments.to_name',$name);
		$this->db->where('apointments.status','0');
        $this->db->get();
        $query2 =  $this->db->last_query();
		
        $objQuery = $this->db->query($query1." UNION ".$query2."ORDER BY appointment_date");
		
		if($objQuery->num_rows>0){
		return $objQuery->result_array();
		}
		else{return false;
		}

	}


    function get_user($name){
		
		$Query = $this->db->query("SELECT appointment_date FROM apointments WHERE from_name ='$name' OR	to_name='$name'");
		if($Query->num_rows>0){
			return $Query->result_array();
		}
		else{
			return false;
		}

	}
	
	function get_appointment($id){
		$Query = $this->db->query("SELECT * FROM apointments WHERE id='$id'");
		if($Query->num_rows>0){
			return $Query->result_array();
		}
		else{
			return false;
		}

	}

 /**
   * edit_apointmentsdetails
   *
   * This is used to edit apointments details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
	function edit_apointmentsdetails($id,$arrData){
		$this->db->where('id', $id);
		if($this->db->update('apointments',$arrData)){
			return true;}
		else{
			return false;
		}
	}
	public function get_emp_id($name) {
		$query = $this->db->select('id')->where('name',$name)->get('employees');
		return $query->result_array();
    }

}

?>
