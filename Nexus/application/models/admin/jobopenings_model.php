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
 * This is jobopenings Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class jobopenings_model extends CI_Model{

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
   * save_clientdetails
   *
   * This is used to save client details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_jobopeningsdetails($arrData){

    if($this->db->insert('jobopenings', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_jobopenings_details
   *
   * This is used to fetches jobopenings details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_jobopenings_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('jobopenings');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_jobopenings
   *
   * This is used to update jobopenings details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_jobopenings($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('jobopenings', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_jobopenings
   *
   * This is used to delete multiple jobopenings details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_jobopenings($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('jobopenings'))
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
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_jobopenings($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('jobopenings', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  /**
   * set_job
   *
   * This is used to publish job openings details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_job($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE jobopenings SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish job openings details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_job($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE jobopenings SET status='0' WHERE id='$iNewfeedId'");
  }

}

?>