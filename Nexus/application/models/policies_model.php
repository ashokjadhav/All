<?php
/**
 * policies_model Class 
 * @package CI_policies_model
 * @subpackage Model
 * @author Ketan Sangani
 *
 */

class policies_model extends CI_Model{
  
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
	 * get_policies_details
     * get details of policies of company
     * 
     * 
     * @access public
     * @param $limit,$start
     * @return result array
     * @author Ashok Jadhav
     * 
     */
  function get_policies_details($limit,$start){
    
   $query=$this->db->query("SELECT * FROM  policies ORDER BY id asc LIMIT $limit,$start");
      
    //var_dump($this->db->last_query());
  
    
    //return $query->result_array();
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
     * get total count of company policies for pagination
     * 
     * 
     * @access public
     * @param none
     * @return result array
     * @author Ketan Sangani
     * 
     */
  
      function record_count(){
    
   $query=$this->db->query("SELECT * FROM  policies ORDER BY id asc");
      
    //var_dump($this->db->last_query());
  
    
    //return $query->result_array();
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