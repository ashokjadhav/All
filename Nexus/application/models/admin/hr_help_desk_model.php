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
 * This is Hr_help_desk_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Hr_help_desk_model extends CI_Model{

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
   * save_hrdetails
   *
   * This is used to save hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_hrdetails($arrData){

    if($this->db->insert('hr_help_desk', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_hr_details
   *
   * This is used to fetches hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_hr_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('hr_help_desk.id', $newsfeedId);
    }

    $this->db->select('hr_help_desk.*,employees.name,employees.designation,employees.extn');
	$this->db->from('hr_help_desk');
	$this->db->join('employees','employees.id=hr_help_desk.user_id','FULL OUTER');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get('');

    //echo $this->db->last_query();
//exit;
    return $objQuery->result_array();

  }

  /**
   * update_hr
   *
   * This is used to update hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_hr($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('hr_help_desk', $arrData))
    {
      
        return true;
    }
    else
    {
        return false;
    }

  }

 /**
   * multi_delete_hr
   *
   * This is used to delete multiple hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_hr($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('hr_help_desk'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_hr
   *
   * This is used to delete hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_hr($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('hr_help_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * set_hr
   *
   * This is used to publish hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_hr($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE hr_help_desk SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_hr
   *
   * This is used to unpublish hr person details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_hr($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE hr_help_desk SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>