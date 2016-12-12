<?php
/**
 * Hr_forms_model Class
 *
 * @author Ketan Sangani
 * @package CI_Hr_forms_model
 * @subpackage Model
 *
 */
class Utsav_model extends CI_Model{

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
  function save_utsavdetails($arrData){

    if($this->db->insert('utsav', $arrData)){
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
  function get_utsav_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('utsav');

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
  function update_utsav($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('utsav', $arrData))
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
  function multi_delete_utsav($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('utsav'))
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
  function delete_utsav($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('utsav', array('id' => $iNewfeedId)))
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
  function set_utsav($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE utsav SET status='1' WHERE id='$iNewfeedId'");

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
   function unset_utsav($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE utsav SET status='0' WHERE id='$iNewfeedId'");
  }

  function getAllUtsav($newsfeedId = 0){
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->where('status','1');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('utsav');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  function get_form_details($id){
    $arrData = array();
    $query=$this->db->query("SELECT id,name,form FROM utsav where id='$id'");
    return $query->result_array();
       
 
  }

}

?>