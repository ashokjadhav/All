<?php
/**
 * employee_model Class
 *
 * @author Ketan Sangani
 * @package CI_employee_model
 * @subpackage Model
 *
 */

class employee_model extends CI_Model{

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
     * add_data
     *
     * saves data
     * @access public
     * @param $table,$data
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function add_data($data)
	{
        //print_r($data);
		if($this->db->insert('employees',$data))
		{


      $query=$this->db->query("DELETE FROM employees where name='name'");

			return TRUE;
		}
		else {
			return FALSE;
		}

	}
		/**
     * update_data
     *
     * updates data as per table and id
     * @access public
     * @param $table,$data,$id
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function update_data($data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update('employees',$data))
		{
			//echo $this->db->last_query();
			if($this->db->affected_rows() == 1)
			{
				return TRUE;
			}

		}
		else {
			return FALSE;
		}
	}

  /**
   * save_employeedetails
   *
   * This is used to save employees details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_employeedetails($arrData){

    if($this->db->insert('employees', $arrData)){
      return true;
    }else{
      return false;
    }

  }
  /**
     * read_fields
     *
     * fetches table columns along with information
     * @access public
     * @param $table
     * @return fields array
     * @author Ashok Jadhav
     *
     */
	function read_fields()
	{
		
		$fields = $this->db->field_data();
		array_shift($fields);
		return $fields;
//echo "<pre>";print_r($fields);exit;


	}
	/**
     * get_data
     *
     * fetches data
     * @access public
     * @param $table,$id,$offset,$limit
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function get_data($id=null)
	{

    $this->db->select(
      'employees.id AS id,
      employees.emp_id AS emp_id,
      employees.name AS name,
      employees.username AS username,
      employees.password AS password,
      employees.email AS email,
      employees.dob AS dob,
      employees.department AS department,
      employees.designation AS designation,
      employees.description AS description,
      employees.company AS company,
      employees.floor AS floor,
      employees.extn AS extn,
      employees.img AS img,
      employees.Resize AS Resize,
      employees.location_id AS location_id,
      employees.type AS type,
      employees.status AS status,
      employees.joining_date AS joining_date,
      company_loc.location_name as location'
    );
    $this->db->from('employees');
    $this->db->join('company_loc','employees.location_id = company_loc.id','full outer');
		if($id!=null){
		  $this->db->where('employees.id',$id);
		}

		$objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

		}

	function list_juniors()
	{
		$condition = "(tl_id = '0' OR tl_id = '')";
		$this->db->select('email');
		$this->db->where($condition);
		$this->db->where('status','1');
		$objQuery = $this->db->get('employees');

		return $objQuery->result_array();

		}


	function list_name()
	{

		$this->db->select('name');
		//$this->db->where($condition);
		$this->db->where('status','1');
		$objQuery = $this->db->get('employees');

		return $objQuery->result_array();

		}

   /* multi_delete_employees
   *
   * This is used to delete multiple employees details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_employees($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('employees'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_employee
   *
   * This is used to delete employee details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  $id,$table
   * @return boolean
   */
  function delete_employee($id){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('employees', array('id' => $id)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

   /**
   * set_employee
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_employee($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE employees SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_employee
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_employee($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE employees SET status='0' WHERE id='$iNewfeedId'");
  }
  /**
   * get_employeename
   *
   * This is used to access name from email
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function get_employeename($id){

    // $this->db->where('category_id',$iNewfeedId);

		$this->db->select('name');
		$this->db->where('id',$id);
		//$this->db->where('status','1');
		$objQuery = $this->db->get('employees');

		return $objQuery->result_array();
  }
   /**
   * get_name
   *
   * This is used to access name from email
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
    function get_name($email){
        
    $this->db->select('name,id');
		$this->db->where('email',$email);
		$this->db->where('status','1');
		$objQuery = $this->db->get('employees');

		return $objQuery->result_array();
    }

    public function get_emp_id($name) {
		
        $query = $this->db->select('id')->where('name',$name)->get('employees');
        return $query->result_array();
    }

    public function get_user_id($email) {
        
        $query = $this->db->select('id')->where('email',$email)->get('employees');
        return $query->result_array();
    }
    public function get_location_id($location) {
        $location = ucfirst(strtolower($location));
        $query = $this->db->select('id')->where('location_name',$location)->get('company_loc');
        $location_id = $query->result_array();
        return $location_id[0]['id'];
    }


}

?>