<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    Ashok Jadhav
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is thought Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class thought_model extends CI_Model{

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
   * save_thoughtdetails
   *
   * This is used to save thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_thoughtdetails($arrData){

    if($this->db->insert('thought', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_thought_details
   *
   * This is used to fetches thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_thought_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('thought');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_thought
   *
   * This is used to update thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_thought($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('thought', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_thought
   *
   * This is used to delete multiple thoughts details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_thought($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('thought'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_client
   *
   * This is used to delete thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_thought($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('thought', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

/**
   * set_thought
   *
   * This is used to publish thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_thought($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE thought SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_thought
   *
   * This is used to unpublish thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_thought($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE thought SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>