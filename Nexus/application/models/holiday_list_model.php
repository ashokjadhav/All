<?php
/**
 * holiday_list_model Class
 *
 * @author Ashok Jadhav
 * @package CI_holiday_list_model
 * @subpackage Model
 *
 */

class holiday_list_model extends CI_Model{
  
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
     * get_allholiday_list_details
     * get holidays on today and in next 5 month
     * 
     * saves data
     * @access public
     * @param none
     * @return array
     * @author Ashok Jadhav
     * 
     */
  function get_allholiday_list_details(){
		$arrData = array();
	    /*$query=$this->db->query("SELECT * FROM  holiday_list WHERE  DATE_ADD(holiday_date,INTERVAL								YEAR(CURDATE())-YEAR(holiday_date)+ IF(DAYOFYEAR(CURDATE()) >=									DAYOFYEAR(holiday_date),1,0)YEAR)  
					            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 5 MONTH) ORDER BY MONTH(holiday_date), DAYOFMONTH(holiday_date) asc LIMIT 2");*/
		$query=$this->db->query("SELECT * FROM holiday_list WHERE STATUS=1 AND holiday_date>NOW() ORDER BY holiday_date ASC LIMIT 2");
		
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

  } 
  /**
     * get_mumbai_holidays
     * get holidays for mumbaioffice
     * 
     * saves data
     * @access public
     * @param none
     * @return array
     * @author Ashok Jadhav
     * 
     */

	function get_mumbai_holidays(){
		$query=$this->db->query("SELECT * FROM  holiday_list WHERE city='MUMBAI' AND  status=1 ORDER BY							holiday_date asc");
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
  
	}
 /**
     * get_cochin_holidays
     * get holidays for cochinoffice
     * 
     * saves data
     * @access public
     * @param none
     * @return array
     * @author Ashok Jadhav
     * 
     */
	function get_cochin_holidays(){
		$query=$this->db->query("SELECT * FROM  holiday_list WHERE city='COCHIN' AND status=1  ORDER BY							holiday_date asc");
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