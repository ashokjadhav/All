<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    Ashok Jadhav
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is Sub_category Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class Sub_category_model extends CI_Model{

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
   * save_subcategorydetails
   *
   * This is used to save sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_subcategorydetails($arrData){

    if($this->db->insert('subcategory', $arrData)){
	return true;}
	else{
	return false;}


  }

   /**
   * get_category_details
   *
   * This is used to fetches category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_category_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }
	/**
   * get_subcategory_details
   *
   * This is used to fetches sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_subcategory_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('subcategory');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_subcategory
   *
   * This is used to update sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_subcategory($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('subcategory', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_subcategory
   *
   * This is used to delete multiple sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_subcategory($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('subcategory'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_subcategory
   *
   * This is used to publish sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE subcategory SET status='1' WHERE id='$iNewfeedId'");

  }
    /**
   * unset_subcategory
   *
   * This is used to unpublish sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
   function unset_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE subcategory SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_subcategory
   *
   * This is used to delete sub category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_subcategory($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('subcategory', array('id' => $iNewfeedId)))
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