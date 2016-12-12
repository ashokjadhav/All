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
 * This is holiday_list Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class holiday_list_model extends CI_Model{

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
  function save_holiday_listdetails($arrData){

    if($this->db->insert('holiday_list', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_holiday_list_details
   *
   * This is used to fetches holiday_list details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_holiday_list_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
	$this->db->order_by('city','ASC');
    $this->db->order_by('holiday_date','ASC');

    $objQuery = $this->db->get('holiday_list');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_holiday_list
   *
   * This is used to update holiday_list details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_holiday_list($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('holiday_list', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_holiday_list
   *
   * This is used to delete multiple holiday_list details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_holiday_list($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('holiday_list'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_holiday_list
   *
   * This is used to delete client details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_holiday_list($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('holiday_list', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * set_holiday
   *
   * This is used to publish holiday details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function set_holiday($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE holiday_list SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_holiday
   *
   * This is used to unpublish holiday details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_holiday($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE holiday_list SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>