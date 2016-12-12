<?php
/**
 *
 * This is lost Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class lost_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }



    /**
   * get_losted_details
   *
   * This is used to fetches losted resources details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_losted_details($newsfeedId = 0,$table){

     $this->db->select('employees.name as subscriber,employees.department as department,lending_management.category as category,lending_management.dos as dos,lending_management.due_date as due_date,lending_management.resource_id as resource_id,lending_management.user_id as user_id,lending_management.id as id,lending_management.returned_date as returned_date,lending_management.borrow_status,'.$table.'.name as name,'.$table.'.sub_category as subcategory,'.$table.'.code as code,'.$table.'.price as price');
        $this->db->from($table);
        $this->db->join('lending_management',$table.'.id = lending_management.resource_id','full outer');
		$this->db->where('category',$table);
		$this->db->where('lending_management.borrow_status','lost');
		$this->db->join('employees','employees.id = lending_management.user_id','full outer');
        $query = $this->db->get();
        return $query->result_array();
  }



 /**
   * multi_delete_lost_management
   *
   * This is used to delete multiple losted resources details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_lost_management($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('lending_management'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * get_category_details
   *
   * This is used to fetches category  details of library
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */

  function get_category_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
	$this->db->where('status',1);
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

}

?>