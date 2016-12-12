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
 * This is resource_management Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class resource_management_model extends CI_Model{

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
  function save_resource_managementdetails($arrData,$table){

    if($this->db->insert($table, $arrData)){
      return true;
    }else{
      return false;
    }

  }
  /**
   * get_resource_management_details
   *
   * This is used to fetches resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_subcategory($newsfeedId,$table){

    $arrData = array();
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
	$this->db->where('category',$table);
	$this->db->where('status','1');

	$this->db->from('subcategory');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

    /**
   * get_resource_management_details
   *
   * This is used to fetches resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_resource_management_details($newsfeedId,$table){

    $arrData = array();
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get($table);

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_resource_management
   *
   * This is used to update resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_resource_management($iNewfeedId,$table,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update($table, $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_resource_management
   *
   * This is used to delete multiple resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_resource_management($table,$arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete($table))
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
function delete_resource_management($id,$table){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete($table, array('id' => $id)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  function set_resource_management($iNewfeedId,$table){

    // $this->db->where('resource_management_id',$iNewfeedId);
    $query=$this->db->query("UPDATE $table SET status='1' WHERE id='$iNewfeedId'");

  }
   function unset_resource_management($iNewfeedId,$table){

    // $this->db->where('resource_management_id',$iNewfeedId);
     $query=$this->db->query("UPDATE $table SET status='0' WHERE id='$iNewfeedId'");
  }
   function get_category_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
	$this->db->where('status',1);
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }
}

?>