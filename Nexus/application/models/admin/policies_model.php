<?php
/**
 *
 * This is policies_model Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class policies_model extends CI_Model{

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
   * save_policiesdetails
   *
   * This is used to save policies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_policiesdetails($arrData){

    if($this->db->insert('policies', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_policies_details
   *
   * This is used to fetches policies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_policies_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get('policies');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_policies
   *
   * This is used to update policies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_policies($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('policies', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_policies
   *
   * This is used to delete multiple policies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_policies($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('policies'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_policies
   *
   * This is used to delete policies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_policies($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('policies', array('id' => $iNewfeedId)))
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