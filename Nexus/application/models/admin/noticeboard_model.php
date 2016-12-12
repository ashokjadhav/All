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

class noticeboard_model extends CI_Model{
  
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
  function save_noticeboarddetails($arrData){
    
    if($this->db->insert('noticeboard', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_noticeboard_details
   *
   * This is used to fetches noticeboard details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
  function get_noticeboard_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
    $this->db->order_by('from_date','ASC');
    
    $objQuery = $this->db->get('noticeboard');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  }           
       
  /**
   * update_noticeboard
   *
   * This is used to update noticeboard details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_noticeboard($iNewfeedId,$arrData){
    
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('noticeboard', $arrData))
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
   * This is used to delete multiple noticeboard details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_noticeboard($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('noticeboard'))
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
  function delete_noticeboard($iNewfeedId){
    
    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('noticeboard', array('id' => $iNewfeedId)))
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
  function set_notice($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE noticeboard SET status='1' WHERE id='$iNewfeedId'");
	
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
   function unset_notice($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE noticeboard SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>