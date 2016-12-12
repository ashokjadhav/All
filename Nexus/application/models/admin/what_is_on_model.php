<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    Ketan Sangani
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is what_is_on Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class what_is_on_model extends CI_Model{

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
   * save_clientdetails
   *
   * This is used to save client details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_what_is_ondetails($arrData){

    if($this->db->insert('what_is_on', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_what_is_on_details
   *
   * This is used to fetches what_is_on details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_what_is_on_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('what_is_on');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_what_is_on
   *
   * This is used to update what_is_on details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_what_is_on($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('what_is_on', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_what_is_on
   *
   * This is used to delete multiple what_is_on details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_what_is_on($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('what_is_on'))
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
   * This is used to delete client details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_what_is_on($iNewfeedId){

    // $this->db->where('what_is_on_id',$iNewfeedId);
    if($this->db->delete('what_is_on', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
    /**
   * set_category
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_event($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE what_is_on SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_event($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE what_is_on SET status='0' WHERE id='$iNewfeedId'");
  }

}

?>