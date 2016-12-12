<?php
/**
 * Hr_help_desk_model Class
 *
 * @author Ketan Sangani
 * @package CI_Hr_help_desk_model
 * @subpackage Model
 *
 */

class Hr_help_desk_model extends CI_Model{

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
	function get_hr_details($id=null,$limit,$start){
            $arrData = array();
            $this->db->select('hr_help_desk.*,employees.name,employees.designation,employees.extn,employees.location_id AS location');
        	$this->db->from('hr_help_desk');
        	$this->db->join('employees','employees.id=hr_help_desk.user_id','FULL OUTER');
            if($id!=null){
                $this->db->where('employees.location_id',$id);
            }
        	$this->db->order_by('id','ASC');
        	//$this->db->limit($limit,$start);
            $query = $this->db->get('');
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
		$query=$this->db->query("SELECT * FROM  hr_help_desk");
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