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
 * This is Kra_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Kra_model extends CI_Model{

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
   * save_kradetails
   *
   * This is used to save kra details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_kradetails($arrData){

    if($this->db->insert('kra', $arrData)){
      return true;
    }else{
      return false;
    }

  }
   /**
   * get_assignments_details_user
   *
   * This is used to fetches get assignments details of user
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_assignments_details_user($name){

    //$arrData = array();



    $this->db->select('*');
	$this->db->where('name',$name);
    //$this->db->order_by('id','DESC');

    $objQuery = $this->db->get('special_assignments');

	if($objQuery->num_rows>0){
	return true;
		}
		else{
		return false;}
    //$this->db->last_query();



  }

    /**
   * get_kras_details
   *
   * This is used to fetches kra details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_kras_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('kra.id', $newsfeedId);
    }
 $this->db->select('kra.*,employees.name');
  $this->db->from('kra');
  $this->db->join('employees','employees.id=kra.user_id','full outer');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_kras
   *
   * This is used to update kras details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_kras($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('kra', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * update_assignments_details
   *
   * This is used to update update assignments details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_assignments_details($iNewfeedId,$arrData){

    $this->db->where('name',$iNewfeedId);
    if($this->db->update('special_assignments', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_kras
   *
   * This is used to delete multiple kras details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_kras($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('kra'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_kra
   *
   * This is used to delete kra details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_kra($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('kra', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  /* * set_kras
   *
   * This is used to publish kra details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_kras($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE kra SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_kras
   *
   * This is used to unpublish kra details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_kras($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE kra SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>