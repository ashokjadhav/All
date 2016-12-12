<?php
/**
 *
 * This is Medals_model Model
 *
 * @author    Ketan Sangani
 * @package   Safe Doc
 * @subpackage  Model
 */

class Medals_model extends CI_Model{

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
   * save_medaldetails
   *
   * This is used to save medals details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_medaldetails($arrData){

    if($this->db->insert('medals', $arrData)){
      return true;
    }else{
      return false;
    }

  }
   /**
   * get_medals_details_user
   *
   * This is used to fetches medals details for existing user which have already medals
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_medals_details_user($id){

    //$arrData = array();



    $this->db->select('*');
	$this->db->where('user_id',$id);
    //$this->db->order_by('id','DESC');

    $objQuery = $this->db->get('medals');

	if($objQuery->num_rows>0){
	return true;
		}
		else{
		return false;}

  }

    /**
   * get_medals_details
   *
   * This is used to fetches medals details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_medals_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('medals.id', $newsfeedId);
    }
 $this->db->select('medals.*,employees.name');
  $this->db->from('medals');
  $this->db->join('employees','employees.id=medals.user_id','full outer');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get();


    return $objQuery->result_array();

  }

  /**
   * update_medals
   *
   * This is used to update medals details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_medals($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('medals', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * update_medals_details
   *
   * This is used to update medals details if medals details already exists
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_medals_details($iNewfeedId,$arrData){

    $this->db->where('name',$iNewfeedId);
    if($this->db->update('medals', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_medals
   *
   * This is used to delete multiple medals details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_medals($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('medals'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_medal
   *
   * This is used to delete medals details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_medal($iNewfeedId){

    // $this->db->where('user_id',$iNewfeedId);
    if($this->db->delete('medals', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


  /* * set_medal
   *
   * This is used to publish medals details of employees
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_medal($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE medals SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_medal
   *
   * This is used to unpublish medals details of employees
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_medal($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE medals SET status='0' WHERE id='$iNewfeedId'");
  }
}

?>