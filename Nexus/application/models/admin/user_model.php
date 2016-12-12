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
 * This is user Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class user_model extends CI_Model{
  
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
     * add_data
     * 
     * saves data
     * @access public
     * @param $table,$data
     * @return status
     * @author priyank jain
     * 
     */
	function add_data($table,$data)
	{
            
		if($this->db->insert($table,$data))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
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
  function save_userdetails($arrData){
    
    if($this->db->insert('user', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_user_details
   *
   * This is used to fetches user details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
  function get_user_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
    $this->db->order_by('id','DESC');
    
    $objQuery = $this->db->get('user');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  }           
       
  /**
   * update_user
   *
   * This is used to update user details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_user($iNewfeedId,$arrData){
    
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('user', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
            
 /**
   * multi_delete_user
   *
   * This is used to delete multiple user details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_user($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('user'))
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
  function delete_user($iNewfeedId){
    
    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('user', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
}

?>