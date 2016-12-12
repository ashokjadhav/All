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
 * This is It_help_desk_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class It_help_desk_model extends CI_Model{

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
   * save_itdetails
   *
   * This is used to save it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_itdetails($arrData){

    if($this->db->insert('it_help_desk', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_it_details
   *
   * This is used to fetches it persons details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_it_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('it_help_desk.id', $newsfeedId);
    }

   $this->db->select('it_help_desk.*,employees.name,employees.designation,employees.extn');
	$this->db->from('it_help_desk');
	$this->db->join('employees','employees.id=it_help_desk.user_id','full outer');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_it
   *
   * This is used to update it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_it($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('it_help_desk', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_it
   *
   * This is used to delete multiple it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_it($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('it_help_desk'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_it
   *
   * This is used to delete it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_it($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('it_help_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * set_it
   *
   * This is used to publish it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function set_it($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE it_help_desk SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_it
   *
   * This is used to unpublish it person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_it($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE it_help_desk SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>