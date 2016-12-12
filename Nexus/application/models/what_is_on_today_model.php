<?php
/**
 * what_is_on_today_model Class
 *
 * @author Ashok Jadhav
 * @package CI_what_is_on_today_model
 * @subpackage Model
 *
 */

class what_is_on_today_model extends CI_Model{
	
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
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_upcoming_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}
		$newsfeedId='NOW()>=from_date && NOW()<=to_date';
		$this->db->select('*');
		$this->db->where($newsfeedId); 
		$this->db->where('status',1);
		$this->db->order_by('from_date','DESC');
		//$this->db->limit(3);
		$objQuery = $this->db->get('what_is_on');
		return $objQuery->result_array();

	}
	 /**
	 * get_all_details
     * get details of upcoming events
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_all_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}
		$newsfeedId='NOW()>=from_date && NOW()<=to_date';
		$this->db->select('*');
		$this->db->where($newsfeedId);
		$this->db->where('status',1);
		$this->db->order_by('from_date','asc');
		$objQuery = $this->db->get('what_is_on');
		return $objQuery->result_array();

	}   
   
   
}

?>