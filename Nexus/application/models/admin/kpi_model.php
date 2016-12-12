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
 * This is Kpi_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Kpi_model extends CI_Model{

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
   * save_clientdetails
   *
   * This is used to save client details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_kpidetails($arrData){

    if($this->db->insert('kpi', $arrData)){
      return true;
    }else{
      return false;
    }

  }
   /**
   * get_group_companies_details
   *
   * This is used to fetches group_companies details
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
   * get_kpis_details
   *
   * This is used to fetches kpi details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_kpis_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('kpi.id', $newsfeedId);
    }

    $this->db->select('kpi.*,employees.name');
  $this->db->from('kpi');
  $this->db->join('employees','employees.id=kpi.user_id','full outer');

    $this->db->order_by('id','ASC');


    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_kpis
   *
   * This is used to update kpi details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_kpis($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('kpi', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


 /**
   * multi_delete_kpis
   *
   * This is used to delete multiple kpi details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_kpis($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('kpi'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_kpi
   *
   * This is used to delete kpi details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_kpi($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('kpi', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  /* * set_employee
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_kpi($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE kpi SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_employee
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_kpi($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE kpi SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>