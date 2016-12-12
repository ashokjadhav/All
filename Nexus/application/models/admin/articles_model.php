<?php
/**
 * Articles_model Class
 *
 * @author Ketan Sangani
 * @package CI_Articles_model
 * @subpackage Model
 *
 */
class Articles_model extends CI_Model{

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
   * save_articlesdetails
   *
   * This is used to save articles details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_articlesdetails($arrData){

    if($this->db->insert('elearning_articles', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_articles_details
   *
   * This is used to fetches Articles details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_articles_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('elearning_articles.id', $newsfeedId);
    }

    $this->db->select('elearning_articles.*,elearning_category.name');
  $this->db->from('elearning_articles');
  $this->db->join('elearning_category','elearning_category.id=elearning_articles.categoryid','full outer');

    $this->db->order_by('elearning_articles.id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_articles
   *
   * This is used to update article details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_articles($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('elearning_articles', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_articles
   *
   * This is used to delete multiple article details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_articles($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_articles'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_articles
   *
   * This is used to delete article details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_articles($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('elearning_articles', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * set_article
   *
   * This is used to publish article details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_article($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_articles SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_article
   *
   * This is used to unpublish article details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_article($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_articles SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>