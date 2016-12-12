<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    zchngs
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is Return Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class Return_model extends CI_Model{

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
   * get_returned_details
   *
   * This is used to fetches returned library resources details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_returned_details($newsfeedId = 0,$table){

     $this->db->select('employees.name as subscriber,employees.department as department,lending_management.category as category,lending_management.dos as dos,lending_management.due_date as due_date,lending_management.resource_id as resource_id,lending_management.user_id as user_id,lending_management.id as id,lending_management.returned_date as returned_date,lending_management.fine as fine,lending_management.borrow_status,'.$table.'.name as name,'.$table.'.sub_category as subcategory,'.$table.'.code as code');
        $this->db->from($table);
        $this->db->join('lending_management',$table.'.id = lending_management.resource_id','full outer');
		$this->db->where('category',$table);
		$this->db->where('lending_management.borrow_status','return');
		$this->db->join('employees','employees.id = lending_management.user_id','full outer');
        $query = $this->db->get();
        return $query->result_array();
  }



 /**
   * multi_delete_borrowed
   *
   * This is used to delete multiple borrowed details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_returned($arriNewfeedId){

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
   * calculate_fine
   *
   * This is used to calculate fine for resources of library
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function calculate_fine($fine,$id){

    // $this->db->where('borrowed_id',$iNewfeedId);
    $query=$this->db->query("UPDATE lending_management SET fine='$fine' WHERE id='$id'");

  }

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