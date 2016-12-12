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

class company_location_model extends CI_Model{

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
   * save_company_locationdetails
   *
   * This is used to save company location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_company_locationdetails($arrData){

    if($this->db->insert('company_loc', $arrData)){
      return true;
    }else{
      
      return false;
    }

  }

    /**
   * get_company_location_details
   *
   * This is used to fetches company location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_company_location_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('location_name','ASC');
    $objQuery = $this->db->get('company_loc');
    return $objQuery->result_array();

  }

  /**
   * update_company_location
   *
   * This is used to update company_location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_company_location($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('company_loc', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_company_location
   *
   * This is used to delete multiple company location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_company_location($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('company_loc'))
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
  function delete_company_location($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('company_loc', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
/**
   * set_company_location
   *
   * This is used to publish company location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_company_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE company_loc SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_company_location
   *
   * This is used to unpublish company location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_company_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE company_loc SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>