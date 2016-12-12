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
 * This is noticeboard Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class history_milestones_model extends CI_Model{
  
  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  zchngs
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
   * @author  zchngs
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_milestonesdetails($arrData){
    
    if($this->db->insert('milestones', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_noticeboard_details
   *
   * This is used to fetches milestones details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
  function get_milestones_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
    $this->db->order_by('date','ASC');
    
    $objQuery = $this->db->get('milestones');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  }           
       
  /**
   * update_noticeboard
   *
   * This is used to update milestones details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_milestones($iNewfeedId,$arrData){
    
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('milestones', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
            
 /**
   * multi_delete_noticeboard
   *
   * This is used to delete multiple milestones details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_milestones($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('milestones'))
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
   * @author  zchngs
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_milestones($iNewfeedId){
    
    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('milestones', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
  /**
   * set_notice
   *
   * This is used to publish notice details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_milestones($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE milestones SET status='1' WHERE id='$iNewfeedId'");
	
  }
     /**
   * unset_category
   *
   * This is used to unpublish notice details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_milestones($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE milestones SET status='0' WHERE id='$iNewfeedId'");
  }

  function allMilestones(){
    
    
     $query=$this->db->query("SELECT * FROM milestones where status='1' ORDER BY UNIX_TIMESTAMP(DATE_FORMAT(date, '%Y-%m-%d')) ASC");
     return $query->result_array();
  }
}

?>