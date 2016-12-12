<?php
/**
 * Hr_forms_model Class
 *
 * @author Ketan Sangani
 * @package CI_Hr_forms_model
 * @subpackage Model
 *
 */
class Hr_forms_model extends CI_Model{

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
   * save_hrdetails
   *
   * This is used to save HR Form details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_hrdetails($arrData){

    if($this->db->insert('hr_forms', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_hr_details
   *
   * This is used to fetches hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_hr_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('hr_forms');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_hr
   *
   * This is used to update hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_hr($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('hr_forms', $arrData))
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
   * This is used to delete multiple hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_hr($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('hr_forms'))
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
   * This is used to delete hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_hr($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('hr_forms', array('id' => $iNewfeedId)))
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
   * This is used to publish hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_hr($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE hr_forms SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_hr
   *
   * This is used to unpublish hr forms details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_hr($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE hr_forms SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>