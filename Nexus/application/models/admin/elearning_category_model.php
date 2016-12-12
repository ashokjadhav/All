<?php
/**
 * Elearning_category_model Class
 *
 * @author Ketan Sangani
 * @package CI_Elearning_category_model
 * @subpackage Model
 *
 */

class Elearning_category_model extends CI_Model{

 /**
	 * construct
	 *
	 * initializes
	 * @author Ketan Sangani
	 * @access public
	 * @param none
	 * @return void
	 *
	 */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }

/**
   * save_categorydetails
   *
   * This is used to save elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_categorydetails($arrData,$category){

    if($this->db->insert('elearning_category', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_category_details
   *
   * This is used to fetches elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_category_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get('elearning_category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_category
   *
   * This is used to update elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_category($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('elearning_category', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_category
   *
   * This is used to delete multiple elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_category($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_category'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_category
   *
   * This is used to publish elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_category($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_category SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_category($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_category SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_category
   *
   * This is used to delete elearning category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_category($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('elearning_category', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * save_subcategorydetails
   *
   * This is used to save elearning subcategory details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_subcategorydetails($arrData){

    if($this->db->insert('elearning_subcategory', $arrData)){
  return true;}
  else{
  return false;}


  }


  /**
   * get_subcategory_details
   *
   * This is used to fetches elearning subcategory details
   *
   * @author  Ketan Sangani
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

    $objQuery = $this->db->get('elearning_subcategory');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_subcategory
   *
   * This is used to update elearning subcategory details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_subcategory($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('elearning_subcategory', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_category
   *
   * This is used to delete multiple elearning subcategories details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_subcategory($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_subcategory'))
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
   * This is used to publish elearning subcategory details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_subcategory SET status='1' WHERE id='$iNewfeedId'");

  }
    /**
   * unset_subcategory
   *
   * This is used to unpublish elearning subcategory details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_subcategory SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_subcategory
   *
   * This is used to delete elearning subcategory details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_subcategory($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('elearning_subcategory', array('id' => $iNewfeedId)))
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