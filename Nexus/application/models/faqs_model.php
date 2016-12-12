<?php
/**
 * Faqs_model Class
 *
 * @author Ashok Jadhav
 * @package CI_Faqs_model
 * @subpackage Model
 *
 */
class Faqs_model extends CI_Model{
  
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
	 * faqs_details
     * get details of faqs
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function faqs_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}
		$this->db->select('question,answer');
		$this->db->where('status',1);
		$this->db->order_by('id','ASC');
		$objQuery = $this->db->get('faqs');
		if ($objQuery->num_rows() > 0) {
            foreach ($objQuery->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
		return false;
		
	}   
  

   
}

?>


