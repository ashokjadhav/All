<?php
/**
 * Leadership_model Class
 *
 * @author Ashok Jadhav
 * @package CI_Leadership_model
 * @subpackage Model
 *
 */

class Leadership_model extends CI_Model{

  /**
	 * construct
	 *
	 * initializes
	 * @author Ashok Jadhav
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
   * save_leaderdetails
   *
   * This is used to save leaders details
   *
   * @author  Ashok Jadha
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_leaderdetails($arrData){

    if($this->db->insert('leaders', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_leader_details
   *
   * This is used to fetches leaders details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_leader_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('leaders.id', $newsfeedId);
    }

    $this->db->select('leaders.*,employees.name');
	$this->db->from('leaders');
	$this->db->join('employees','employees.id=leaders.user_id','full outer');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_leader
   *
   * This is used to update leader details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_leader($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('leaders', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_leader
   *
   * This is used to delete multiple leader details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_leaders($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('leaders'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_leader
   *
   * This is used to delete leader details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_leader($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('leaders', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
/**
   * set_leader
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_leader($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE leaders SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_leader
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_leader($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE leaders SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>