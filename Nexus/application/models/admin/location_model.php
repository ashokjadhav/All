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
 * This is location Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class location_model extends CI_Model{

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
   * save_locationdetails
   *
   * This is used to save location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_locationdetails($arrData){

    if($this->db->insert('location', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_location_details
   *
   * This is used to fetches location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_location_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('location');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_location
   *
   * This is used to update location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_location($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('location', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_location
   *
   * This is used to delete multiple location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_location($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('location'))
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
  function delete_location($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('location', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
/**
   * set_location
   *
   * This is used to publish location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE location SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_location
   *
   * This is used to unpublish location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE location SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>