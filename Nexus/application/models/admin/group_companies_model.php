<?php
 /**
 * group_companies_model Class
 *
 * @author Ashok Jadhav
 * @package CI_group_companies_model
 * @subpackage Model
 *
 */


class group_companies_model extends CI_Model{
  
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
   * save_group_companiesdetails
   *
   * This is used to save companies details
   *
   * @author Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_group_companiesdetails($arrData){
    
    if($this->db->insert('group_companies', $arrData)){
      
      return true;
    }else{
      
      return false;
    }

  }

    /**
   * get_group_companies_details
   *
   * This is used to fetches group_companies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId 
   * @return array
   */
  function get_group_companies_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
    $this->db->order_by('id','DESC');
    
    $objQuery = $this->db->get('group_companies');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  }           
       
  /**
   * update_group_companies
   *
   * This is used to update group_companies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_group_companies($iNewfeedId,$arrData){
    
    $this->db->where('id',$iNewfeedId);
    if($this->db->update('group_companies', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
            
 /**
   * multi_delete_group_companies
   *
   * This is used to delete multiple group_companies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_group_companies($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('group_companies'))
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
   * This is used to delete companies details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_group_companies($iNewfeedId){
    
    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('group_companies', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }
  /**
   * set_company
   *
   * This is used to publish company details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_company($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE group_companies SET status='1' WHERE id='$iNewfeedId'");
	
  }
     /**
   * unset_company
   *
   * This is used to unpublish company details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_company($iNewfeedId){
    
    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE group_companies SET status='0' WHERE id='$iNewfeedId'");
  }

  function edit_description($company_id,$arrData)
    {
        $this->db->where('id',$company_id);
        if($this->db->update('group_companies', $arrData)){
            return true;
        }
        else
        {
           return false;
        }
    }

    function get_description($newsfeedId = 0)
    {
        if($newsfeedId != 0 ){
            $this->db->where('id', $newsfeedId);
        }
        $this->db->select('*');
        $objQuery = $this->db->get('group_companies');
        return $objQuery->result_array();
    }
}

?>