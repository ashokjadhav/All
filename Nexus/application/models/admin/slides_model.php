<?php
/**
 *
 * This is Slides Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */
class Slides_model extends CI_Model{

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
   * save_slidesdetails
   *
   * This is used to save slides details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_slidesdetails($arrData){

    if($this->db->insert('elearning_files', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_slides_details
   *
   * This is used to fetches slides details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_slides_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('elearning_files.id', $newsfeedId);
    }

   $this->db->select('elearning_files.*,elearning_category.name');
  $this->db->from('elearning_files');
  $this->db->join('elearning_category','elearning_category.id=elearning_files.categoryid','full outer');

    $this->db->order_by('elearning_files.id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

 /**
   * multi_delete_slides
   *
   * This is used to delete multiple slides details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_slides($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_files'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_slide
   *
   * This is used to delete slide details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_slide($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('elearning_files', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * update_slide
   *
   * This is used to update  slide details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_slide($iNewfeedId,$arrData){
  ;
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('elearning_files', $arrData))
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
   * set_slide
   *
   * This is used to publish slide details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_slide($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_files SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_slide
   *
   * This is used to unpublish slide details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_slide($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_files SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>