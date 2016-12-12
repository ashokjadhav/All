<?php
/**
 * Birth_day Class 
 * @package CI_Admin
 * @subpackage Model
 * @author priyank jain
 *
 */

class location_model extends CI_Model{
	
	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	zchngs
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}
	
	

   /**
     * get user info which have birthday on today
     * 
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     * 
     */
	function get_alllocation_details($limit, $start){
		$arrData = array();
		$query=$this->db->query("SELECT name,address,city,contact FROM location WHERE status=1 ORDER BY	city asc LIMIT $limit,$start");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

	} 
	
	public function record_count() {
		$query=$this->db->query("SELECT name,address,city,contact FROM location");
		return $query->result();
			
    }

    public function getSearchLoc($key){
    	$query=$this->db->query("SELECT name,address,city,contact FROM location WHERE city LIKE '%$key%' ORDER BY city asc");
    	return $query->result(); 
    }
    
   
}

?>