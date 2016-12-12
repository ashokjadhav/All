<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    Ashok Jadhav(AJ)
 * @copyright Copyright (c) 2015 - 2016
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is boardDirectors Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class boarddirectors_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  Ashok Jadhav(AJ)
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
  function save_Directorsdetails($arrData){

    if($this->db->insert('boardDirectors', $arrData)){
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
   * @author  Ashok Jadhav(AJ)
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_Directors_details($newsfeedId = 0){
    
    $this->db->select('employees.name,employees.designation,employees.department,employees.extn,group_companies.name AS company,boardDirectors.id AS id,boardDirectors.status AS status,group_companies.id AS company_id');
	$this->db->from('employees');
	$this->db->join('boardDirectors','employees.id=boardDirectors.user_id','FULL OUTER');
    $this->db->join('group_companies','boardDirectors.company_id=group_companies.id','FULL OUTER');
    if($newsfeedId != 0 ){
      $this->db->where('group_companies.id', $newsfeedId);
    }
    $this->db->order_by('group_companies.name','ASC');
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
   * @author  Ashok Jadhav(AJ)
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_Directors($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('boardDirectors', $arrData))
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
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_Directors($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('boardDirectors'))
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
   * @author  Ashok Jadhav(AJ)
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_Directors($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('boardDirectors', array('id' => $iNewfeedId)))
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
   * @author  Ashok Jadhav(AJ)
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_Directors($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE boardDirectors SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_hr
   *
   * This is used to unpublish hr person details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_Directors($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE boardDirectors SET status='0' WHERE id='$iNewfeedId'");
  }

  function get_company_details($newsfeedId=null){
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('id,name');
    $this->db->where('status','1');
    $this->db->order_by('name','ASC');
    $objQuery = $this->db->get('group_companies');
    return $objQuery->result_array();

  }


  function get_editDirectors_details($newsfeedId = 0){
    
    $this->db->select('employees.name,group_companies.name AS company,boardDirectors.*,group_companies.id AS company_id');
    $this->db->from('employees');
    $this->db->join('boardDirectors','employees.id=boardDirectors.user_id','FULL OUTER');
    $this->db->join('group_companies','boardDirectors.company_id=group_companies.id','FULL OUTER');
    if($newsfeedId != 0 ){
      $this->db->where('boardDirectors.id', $newsfeedId);
    }
    $objQuery = $this->db->get('');
    //echo $this->db->last_query();
    //exit;
    return $objQuery->result_array();

  }
}

?>