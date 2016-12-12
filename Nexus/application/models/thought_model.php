<?php
/**
 * Thought_model Class 
 * @package CI_thought_model
 * @subpackage Model
 * @author Ashok Jadhav
 *
 */

class thought_model extends CI_Model{
	
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
     * get details of thoughts
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_thought_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}
		$this->db->select('*');
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$objQuery = $this->db->get('thought');
		return $objQuery->result_array();

	}           
    
   
}

?>