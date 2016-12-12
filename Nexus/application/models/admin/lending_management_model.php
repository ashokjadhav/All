<?php

/**
 * lending_management_model Class
 *
 * @author Ashok Jadhav
 * @package CI_lending_management_model
 * @subpackage Model
 *
 */
class lending_management_model extends CI_Model{

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
   * get_lending_management_details
   *
   * This is used to fetches lending_management details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_lending_management_details($newsfeedId = 0,$table){

	$status="(lending_management.borrow_status = 'request' OR lending_management.borrow_status = 'pending')";
		$this->db->select('employees.name as subscriber,employees.department as department,lending_management.category as category,lending_management.dos as dos,lending_management.due_date as due_date,lending_management.resource_id as resource_id,lending_management.user_id as user_id,lending_management.id as id,'.$table.'.name as name,'.$table.'.sub_category as subcategory,'.$table.'.code as code');
        $this->db->from($table);
        $this->db->join('lending_management',$table.'.id = lending_management.resource_id','full outer');
		$this->db->join('employees','employees.id = lending_management.user_id','full outer');
		$this->db->where('category',$table);
		$this->db->where($status);

		$this->db->order_by('lending_management.id','ASC');
        $query = $this->db->get();
		//echo $this->db->last_query();
		//exit;
        return $query->result_array();

  }
 /**
   * get_resourceid
   *
   * This is used to fetches data to update status
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */

function get_resourceid($newsfeedId){

    $arrData = array();


    $this->db->select('*');
	//$this->db->where('borrow_status','request');
    $this->db->where('id',$newsfeedId);
    $objQuery = $this->db->get('lending_management');



    return $objQuery->result_array();

  }
   /**
   * get_resourceid
   *
   * This is used to fetches data to update status
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */

function checkanyrequestornot($category,$resource_id){


    $this->db->select('*');
	//$this->db->where('borrow_status','request');
    $this->db->where('resource_id',$resource_id);
	$this->db->where('category',$category);
	$this->db->where('borrow_status','request');
    $objQuery = $this->db->get('lending_management');
	if($objQuery->num_rows>0){
	return false;
	}
	else{

		$query1 = $this->db->query("UPDATE $category SET borrow_status='' WHERE id='$resource_id'");
		//echo $this->db->last_query();exit;

	}
  }

/**
   * delete_questions
   *
   * This is used to delete Question details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_lending_management($iNewfeedId){

   $query =  $this->db->where('borrow_status','request');

    if($this->db->delete('lending_management', array('id' => $iNewfeedId)))
    {
        return $this->db->affected_rows();
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



    return $objQuery->result_array();

  }
 /**
   * update_lending_management
   *
   * This is used to update borrow status for request for reosurce of library
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$resource_id,integer-$user_id,string-$category,array-$UpdateData
   * @return boolean
   */

 function update_lending_management($id,$category,$user_id,$resource_id,$UpdateData){

    
	  $this->db->where('id',$id);
    if($this->db->update('lending_management', $UpdateData))
    {
		$query1 = $this->db->query("UPDATE $category SET borrow_status='pending' WHERE id='$resource_id'");
        return true;
    }
    else
    {
        return false;
    }
  }




}

?>