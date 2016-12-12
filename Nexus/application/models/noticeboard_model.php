<?php
/**
 * Noticeboard_model Class 
 * @package CI_noticeboard_model
 * @subpackage Model
 * @author Ashok Jadhav
 *
 */

class noticeboard_model extends CI_Model{
	
	// --------------------------------------------------------------------

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
	}
	
	

   /**
     * get details of notices
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_noticeboard_details($newsfeedId = 0){
		$arrData = array();
		$query=$this->db->query("SELECT * FROM  noticeboard WHERE  DATE_ADD(to_date,INTERVAL	YEAR(CURDATE())-YEAR(to_date)+ IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(to_date),1,0)YEAR)
		BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 MONTH)	AND status = 1 ORDER BY MONTH(from_date), DAYOFMONTH(from_date) desc");
		return $query->result_array();

	}           
    /**
     * get details of all notices
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_allnoticeboard_details($newsfeedId = 0){
		$arrData = array();
		$query=$this->db->query("SELECT * FROM  noticeboard WHERE status=1 ORDER BY from_date DESC");
		return $query->result_array();

	}   
	
    /**
     * get details of all notices
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	 function readmorenotice($newsfeedId){
		$arrData = array();
		$query=$this->db->query("SELECT description FROM noticeboard WHERE id=$newsfeedId AND status='1'");
        return $query->result_array();

	}    
}

?>