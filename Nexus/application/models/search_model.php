<?php
/**
 * search_model Class 
 * @package CI_search_model
 * @subpackage Model
 * @author Ashok Jadhav
 *
 */

class search_model extends CI_Model{
	
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
	 * get_all_new_joinee_detail
     * get details of joinee as per keyword search
     * 
     * 
     * @access public
     * @param $search,$limit,$start
     * @return result array
     * @author Ashok Jadhav
     * 
     */

	function get_all_new_joinee_details($search,$limit,$start){
		$query=$this->db->query("SELECT employees.name AS name,employees.extn AS extn,employees.img AS img,employees.Resize AS Resize,employees.designation AS designation,employees.location_id AS location_id,employees.email AS email,employees.department AS department,employees.contact AS contact,company_loc.location_name AS location 
            FROM  employees JOIN company_loc ON employees.location_id = company_loc.id WHERE employees.name LIKE '%$search%' AND employees.status='1' LIMIT $limit,$start");
		//echo $this->db->last_query();
		//exit;
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}


	 /**
	 * record_count
     * get total no of joinee for keyword search
     * 
     * 
     * @access public
     * @param $search
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function record_count($search) {
		$query=$this->db->query("SELECT employees.name AS name,employees.img AS img,employees.Resize AS Resize,employees.designation AS designation,employees.location_id AS location_id,employees.email AS email,employees.department AS department,employees.contact AS contact,company_loc.location_name AS location 
            FROM  employees JOIN company_loc ON employees.location_id = company_loc.id WHERE employees.name LIKE '%$search%' AND employees.status='1' ORDER BY employees.id desc");
		return $query->result();
			
    }
}

?>