<?php
/**
 * Branding_template_model Class
 *
 * @author Ketan Sangani
 * @package CI_Branding_template_model
 * @subpackage Model
 *
 */

class Branding_template_model extends CI_Model{

  /**
	 * construct
	 *
	 * initializes
	 * @author Ketan Sangani
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
   * save_brandingdetails
   *
   * This is used to save branding details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_brandingdetails($arrData){

    if($this->db->insert('branding_template', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_branding_details
   *
   * This is used to fetches thought details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_branding_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('branding_template');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_branding
   *
   * This is used to update branding details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_branding($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('branding_template', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_branding
   *
   * This is used to delete multiple branding details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_branding($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('branding_template'))
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
   * This is used to delete client details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_branding($iNewfeedId){

    // $this->db->where('thought_id',$iNewfeedId);
    if($this->db->delete('branding_template', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * set_brand
   *
   * This is used to publish branding_template details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_brand($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE branding_template SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_brand
   *
   * This is used to unpublish branding_template details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_brand($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE branding_template SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>