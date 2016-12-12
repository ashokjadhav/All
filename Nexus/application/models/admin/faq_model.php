<?php
/**
 * Faq_model Class
 *
 * @author Ketan Sangani
 * @package CI_Faq_model
 * @subpackage Model
 *
 */

class Faq_model extends CI_Model{
  
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
   * save_faqdetails
   *
   * This is used to save faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_faqdetails($arrData){
    
    if($this->db->insert('faqs', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_faq_details
   *
   * This is used to fetches faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
  function get_faq_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
    $this->db->order_by('id','DESC');
    
    $objQuery = $this->db->get('faqs');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  }           
       
  /**
   * update_faq
   *
   * This is used to update faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_faq($iNewfeedId,$arrData){
    
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('faqs', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
            
 /**
   * multi_delete_faqs
   *
   * This is used to delete multiple faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_faqs($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('faqs'))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
     /**
   * delete_faq
   *
   * This is used to delete faq details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_faq($iNewfeedId){
    
    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('faqs', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
  /**
   * set_faq
   *
   * This is used to publish faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_faq($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE faqs SET status='1' WHERE id='$iNewfeedId'");
	
  }
     /**
   * unset_faq
   *
   * This is used to unpublish faqs details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_faq($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE faqs SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>