<?php
/**
 * Book_summary_model Class
 *
 * @author Ketan Sangani
 * @package CI_Book_summary_model
 * @subpackage Model
 *
 */
class Book_summary_model extends CI_Model{

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
   * save_summariesdetails
   *
   * This is used to save book_summary details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_summariesdetails($arrData){

    if($this->db->insert('elearning_summaries', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_summaries_details
   *
   * This is used to fetches book_summaries details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_summaries_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('elearning_summaries.id', $newsfeedId);
    }
$this->db->select('elearning_summaries.*,elearning_category.name');
  $this->db->from('elearning_summaries');
  $this->db->join('elearning_category','elearning_category.id=elearning_summaries.categoryid','full outer');

    $this->db->order_by('elearning_summaries.id','ASC');
    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_summaries
   *
   * This is used to update book_summaries details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_summaries($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('elearning_summaries', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_summaries
   *
   * This is used to delete multiple book_summaries details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_summaries($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_summaries'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_summaries
   *
   * This is used to delete book_summary details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_summaries($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('elearning_summaries', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * set_summary
   *
   * This is used to publish book_summary details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_summary($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_summaries SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_summary
   *
   * This is used to unpublish book_summary details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_summary($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_summaries SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>