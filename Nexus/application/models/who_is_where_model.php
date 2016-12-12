<?php
/**
 * what_is_on_today_model Class
 *
 * @author Ashok Jadhav
 * @package CI_what_is_on_today_model
 * @subpackage Model
 *
 */

class who_is_where_model extends CI_Model{

	/**
	 * construct
	 *
	 * initializes
	 * @author Ashok Jadhav
	 * @access public
	 * @param none
	 * @return void
	 *
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}



    /**
	 * get_upcoming_details
     * get details of upcoming events
     *
     *
     * @access public
     * @param $arrData
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	 function save_status($arrData){
	 	$id = $this->session->userdata('site_userid');
    	$this->db->where('user_id',$id);
  		$Q =  $this->db->get('who_is_where');
   		if($Q->num_rows()>0){
			$this->db->where('user_id',$id);
			if($this->db->update('who_is_where', $arrData)){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			if($this->db->insert('who_is_where', $arrData)){
			  return true;
			}else{
			  return false;
			}

		}
	}

	/**
	 * get_all_details
     * Get My status
     *
     *
     * @access public
     * @param $id
     * @return result array
     * @author Ashok Jadhav
     *
     */
   	function get_all_details($id){
		$this->db->select('who_is_where.status as mystatus,employees.*');
		$this->db->from('employees');
		$this->db->join('who_is_where','who_is_where.user_id = employees.id','LEFT');
		$this->db->where('employees.id', $id);
		$this->db->limit(1);
		$objQuery = $this->db->get('');
		//echo $this->db->last_query();exit;
		return $objQuery->result_array();

	}


	/**
	 * search_details
     * Search Employee Status
     *
     *
     * @access public
     * @param $name
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function search_details($name){
		$this->db->select('who_is_where.*,employees.designation as designation,employees.department as	department');
		$this->db->from('who_is_where');
		$this->db->join('employees','who_is_where.user_id = employees.id','full outer');
		$this->db->like('who_is_where.user_id', $name);
		$this->db->limit(1);
		$objQuery = $this->db->get();
		return $objQuery->result_array();

	}
}

?>