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
 * This is Special_assignments Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Special_assignments_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }

  /**
   * save_assignmentdetails
   *
   * This is used to save special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_assignmentdetails($arrData){

    if($this->db->insert('special_assignments', $arrData)){
      return true;
    }else{
      return false;
    }

  }
   /**
   * get_assignments_details_user
   *
   * This is used to fetches special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_assignments_details_user($name){

    //$arrData = array();



    $this->db->select('*');
	$this->db->where('name',$name);
    //$this->db->order_by('id','DESC');

    $objQuery = $this->db->get('special_assignments');

	if($objQuery->num_rows>0){
	return true;
		}
		else{
		return false;}
    //$this->db->last_query();



  }

    /**
   * get_assignments_details
   *
   * This is used to fetches special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_assignments_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('special_assignments.id', $newsfeedId);
    }
$this->db->select('special_assignments.*,employees.name');
  $this->db->from('special_assignments');
  $this->db->join('employees','employees.id=special_assignments.user_id','full outer');

    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get();


    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_assignments
   *
   * This is used to update special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_assignments($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('special_assignments', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * update_assignments_details
   *
   * This is used to update special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_assignments_details($iNewfeedId,$arrData){

    $this->db->where('name',$iNewfeedId);
    if($this->db->update('special_assignments', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_assignments
   *
   * This is used to delete multiple special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_assignments($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('special_assignments'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_assignment
   *
   * This is used to delete special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_assignment($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('special_assignments', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  /* * set_assignments
   *
   * This is used to publish special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_assignments($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE special_assignments SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_assignments
   *
   * This is used to unpublish special assignment details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_assignments($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE special_assignments SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>