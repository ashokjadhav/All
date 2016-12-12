<?php
/**
 * department_model Class
 *
 * @author Ketan Sangani
 * @package CI_department_model
 * @subpackage Model
 *
 */
class department_model extends CI_Model{
  
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
   * get_company_details
   *
   * This is used to fetches companies details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$limit,$start
   * @return array
   */
  function get_company_details($limit,$start){
		$query=$this->db->query("SELECT * FROM  group_companies WHERE status='1' ORDER BY name asc LIMIT $limit,$start");
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
   *
   * This is used to count companies 
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   none
   * @return array
   */

      function record_count(){
			$query=$this->db->query("SELECT name,address,contact FROM  group_companies");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
            return $data;
			 }
			return false;
       

		}

    function get_all_details($id){
      if($id != 0 ){
        $this->db->where('id', $id);
      }
        $this->db->where('status','1');
        $objQuery = $this->db->get('group_companies');
      return $objQuery->result_array();
    }

    function get_employees_details($id){
        $this->db->select('employees.name AS name,employees.department AS department,employees.designation AS designation,employees.email AS email,employees.extn AS extn,company_loc.location_name AS location');
        $this->db->from('employees');
        $this->db->join('company_loc','employees.location_id = company_loc.id');
        $this->db->join('boardDirectors','boardDirectors.user_id = employees.id');
        $this->db->join('group_companies','boardDirectors.company_id = group_companies.id');
        $this->db->where('boardDirectors.status','1');
        if($id != '' ){
            $this->db->where('group_companies.id', $id);
        }
        $objQuery = $this->db->get();
        //echo $this->db->last_query();
        //exit;
        return $objQuery->result_array();
    }


    }

?>