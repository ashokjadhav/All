<?php
/**
 * Hr_help_desk_model Class
 *
 * @author Ketan Sangani
 * @package CI_Hr_help_desk_model
 * @subpackage Model
 *
 */

class Hr_forms_model extends CI_Model{
  
 /**
	 * construct
	 *
	 * initializes
	 * @author Ketan Sangani
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
     * get_hr_details
     * get hr details of company
     * 
     * retrieve data
     * @access public
     * @param $limit,$start
     * @return array
     * @author Ketan Sangani
     * 
     */
  function get_hr_details($limit,$start){
		$arrData = array();
		$query=$this->db->query("SELECT id,name,form FROM  hr_forms WHERE status=1 ORDER BY id asc LIMIT							$limit,$start");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
       
 
	}



	function get_form_details($id){
		$arrData = array();
		$query=$this->db->query("SELECT id,name,form FROM hr_forms where id='$id'");
		return $query->result_array();
       
 
	}

	/**
     * record_count
     * get total no of hrs
     * 
     * retrieve data
     * @access public
     * @param none
     * @return array
     * @author Ketan Sangani
     * 
     */
	function record_count(){
		$arrData = array();
		$query=$this->db->query("SELECT id,name,form FROM  hr_forms");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}
?>