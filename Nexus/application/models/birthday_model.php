<?php
/**
 * birthday_model Class
 *
 * @author Ashok Jadhav
 * @package CI_birthday_model
 * @subpackage Model
 *
 */

class birthday_model extends CI_Model{
	
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
     * get_allbirthday_details
     * get birthday details of all the users
     * 
     * retrieve data
     * @access public
     * @param $limit, $start
     * @return array
     * @author Ashok Jadhav
     * 
     */
	function get_allbirthday_details($limit, $start){
		$arrData = array();
        $year = date('Y');
        $data1 =array();
        $data2 =array();
        $sql1 ="SELECT employees.name AS name,employees.img AS img,employees.Resize AS Resize,employees.designation AS designation,employees.location_id AS location_id,employees.dob AS dob,employees.department AS department,company_loc.location_name AS location 
            FROM  employees JOIN company_loc ON employees.location_id = company_loc.id                      
            WHERE  DATE_ADD(employees.dob,INTERVAL YEAR(CURDATE())-YEAR(dob)+                                           IF(DAYOFYEAR(CURDATE()) >= DAYOFYEAR(dob),1,0)YEAR)  
                                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 MONTH) AND employees.status='1' AND (UNIX_TIMESTAMP(CURDATE()) < UNIX_TIMESTAMP(DATE_FORMAT(employees.dob, '".$year."-%m-%d')))";

        $sql1.= " ORDER BY UNIX_TIMESTAMP(DATE_FORMAT(employees.dob, '".$year."-%m-%d')) ASC";
        $sql1.= " LIMIT $limit,$start";
        $query1=$this->db->query($sql1);
        
        if ($query1->num_rows() > 0) {
            foreach ($query1->result() as $row) {
                $data1[] = $row;
            }
            
        }

        $sql ="SELECT employees.name AS name,employees.img AS img,employees.Resize AS Resize,employees.designation AS designation,employees.location_id AS location_id,employees.dob AS dob,employees.department AS department,company_loc.location_name AS location 
            FROM  employees JOIN company_loc ON employees.location_id = company_loc.id                      
            WHERE  DATE_ADD(employees.dob,INTERVAL YEAR(CURDATE())-YEAR(dob)+                                           IF(DAYOFYEAR(CURDATE()) >= DAYOFYEAR(dob),1,0)YEAR)  
                                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 MONTH) AND employees.status='1' AND (UNIX_TIMESTAMP(CURDATE()) > UNIX_TIMESTAMP(DATE_FORMAT(employees.dob, '".$year."-%m-%d')))";

        $sql.= " ORDER BY UNIX_TIMESTAMP(DATE_FORMAT(employees.dob, '".$year."-%m-%d')) ASC";
        $sql.= " LIMIT $limit,$start";

        $query=$this->db->query($sql);
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data2[] = $row;
            }
            
        }
        
        if(is_array($data1) && is_array($data2)){
            $data = array_merge($data1, $data2);
            return $data;
        }else if(is_array($data1)){
            return $data1;
        }else if(is_array($data2)){
            return $data2;
        }
    }
    
	

   /**
     * get_todaybirthday_details
     * get user info which have birthday on today
     * 
     * retrieve data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author Ashok Jadhav
     * 
     */
	function get_todaybirthday_details($newsfeedId = 0){
		$arrData = array();
		$query=$this->db->query("SELECT employees.*,company_loc.location_name AS location FROM employees JOIN company_loc ON employees.location_id = company_loc.id WHERE DATE_FORMAT(dob,'%m-%d')= DATE_FORMAT(NOW(),'%m-%d') AND employees.status='1'");
		return $query->result_array();

	}


 /**
     * record_count
     * get total no of users which have birthday on today
     * 
     * retrieve data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author Ashok Jadhav
     * 
     */
	    public function record_count() {
			$query=$this->db->query("SELECT employees.*,company_loc.location_name AS location 
            FROM  employees JOIN company_loc ON employees.location_id = company_loc.id                      
            WHERE  DATE_ADD(employees.dob,INTERVAL YEAR(CURDATE())-YEAR(dob)+                                           IF(DAYOFYEAR(CURDATE()) >= DAYOFYEAR(dob),1,0)YEAR)  
                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 MONTH) AND employees.status='1' ORDER BY MONTH(dob), DAYOFMONTH(dob) asc");
			return $query->result();
			
    }
    
   
}

?>