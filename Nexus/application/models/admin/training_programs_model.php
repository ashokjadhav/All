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
 * This is Training_programs_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Training_programs_model extends CI_Model{

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
   * save_programdetails
   *
   * This is used to save training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_programdetails($arrData){

    if($this->db->insert('training_programs', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_programs_details
   *
   * This is used to fetches training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_programs_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('training_programs.id', $newsfeedId);
    }
$this->db->select('training_programs.*,employees.name');
  $this->db->from('training_programs');
  $this->db->join('employees','employees.id=training_programs.user_id','full outer');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_programs
   *
   * This is used to update training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_programs($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('training_programs', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_programs
   *
   * This is used to delete multiple training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_programs($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('training_programs'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_program
   *
   * This is used to delete training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_program($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('training_programs', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  /* * set_program
   *
   * This is used to publish training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_program($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE training_programs SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_program
   *
   * This is used to unpublish training program details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_program($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE training_programs SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>