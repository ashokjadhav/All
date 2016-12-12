<?php
class Vision_mission_model extends CI_Model{

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
   * save_videodetails
   *
   * This is used to save elearning videos details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_videodetails($arrData){

    if($this->db->insert('vision_mission', $arrData)){
      return true;
    }else{
      return false;
    }

  }
   /**
   * update_video
   *
   * This is used to update elearning videos details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_video($iNewfeedId,$arrData){
   //var_dump($arrData);exit;
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('vision_mission', $arrData))
    {
		//$this->db->last_query();exit;
        return true;
    }
    else
    {
        return false;
    }
  }

    /**
   * get_videos_details
   *
   * This is used to fetches elearning videos details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_videos_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }
    $objQuery = $this->db->get('vision_mission');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

 /**
   * multi_delete_videos
   *
   * This is used to delete multiple elearning videos details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_videos($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('vision_mission'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_videos
   *
   * This is used to delete elearning video details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_videos($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('vision_mission', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * set_video
   *
   * This is used to publish elearning video details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_video($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE vision_mission SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_video
   *
   * This is used to unpublish elearning video details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_video($iNewfeedId){
    $query=$this->db->query("UPDATE vision_mission SET status='0' WHERE id='$iNewfeedId'");
  }

  function get_single_videos_details($newsfeedId = 0){
      $this->db->where('status',1);
      $this->db->order_by('id','DESC');
      $this->db->limit(1);
      $objQuery = $this->db->get('vision_mission');
      return $objQuery->result_array();

    }
}

?>