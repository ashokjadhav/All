<?php
/**
 * Thought_model Class
 * @package CI_Admin
 * @subpackage Model
 * @author priyank jain
 *
 */

class Leadership_model extends CI_Model{

	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	priyank jain
	 * @access	public
	 * @return	void
	 */
	function __construct(){
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
     * @author priyank jain
     *
     */
	function get_leaders_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('leaders.id', $newsfeedId);
		}
		$this->db->select('leaders.*,employees.name');
	    $this->db->from('leaders');
	    $this->db->join('employees','employees.id=leaders.user_id','full outer');

		$this->db->where('leaders.status',1);
		$this->db->order_by('id','ASC');
		$objQuery = $this->db->get();
		return $objQuery->result_array();

	}
}

?>