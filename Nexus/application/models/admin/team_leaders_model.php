<?php
/**
 * team_leaders_model Class
 *
 * @author Ketan Sangani
 * @package CI_team_leaders_model
 * @subpackage Model
 *
 */

class team_leaders_model extends CI_Model{

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
   * save_team_leaderdetails
   *
   * This is used to save team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_team_leaderdetails($arrData){

    if($this->db->insert('team_leaders', $arrData)){
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_team_leaders_details
   *
   * This is used to fetches team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_team_leaders_details($newsfeedId = 0){

    $this->db->select('team_leaders.*,employees.id as emp_id,employees.name as emp_name');
        $this->db->from('team_leaders');
        $this->db->join('employees','team_leaders.name = employees.email','full outer');
		$query = $this->db->get();
		return $query->result_array();
  }
   /**
   * get_team_leaders_details
   *
   * This is used to fetches team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_user_id($newsfeedId){

    $this->db->select('team_leaders.user_id,team_leaders.id');
    $this->db->where_in('id', $newsfeedId);
    $query = $this->db->get('team_leaders');
    return $query->result_array();
  }
    /**
   * already_tl
   *
   * This is used to check already tl or not
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $name
   * @return array
   */
  function already_tl($name){

    $arrData = array();

    $this->db->select('*');
	$this->db->where('name',$name);
    //$this->db->order_by('name','DESC');

    $objQuery = $this->db->get('team_leaders');
    if($objQuery->num_rows>0){
		return true;
	}else{
    return false;}

  }
  /**
   * get_juniors_details
   *
   * This is used to fetches juniors details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_juniors_details($newsfeedId){

    $arrData = array();


    $this->db->select('id,name');
	$this->db->where('tl_id',$newsfeedId);
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('employees');
    if($objQuery->num_rows>0){
		return $objQuery->result_array();
	}else{
	return false;}
    //$this->db->last_query();



  }

  /**
   * update_team_leaderdetails
   *
   * This is used to update team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_team_leaderdetails($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('team_leaders', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * update_employeesdetails
   *
   * This is used to update junior details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_employeesdetails($employeename,$arrData){

    $this->db->where('email',$employeename);
    if($this->db->update('employees', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }


 /**
   * multi_delete_team_leaders
   *
   * This is used to delete multiple team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_team_leaders($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('team_leaders'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
    /**
   * remove_junior
   *
   * This is used to remove junior details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function remove_junior($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE employees SET tl_id='0' WHERE id='$iNewfeedId'");
	if($query){
	return true;}
	else{return false;}
  }
     /**
   * set_team_leader
   *
   * This is used to publish team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_team_leader($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE team_leaders SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_team_leader
   *
   * This is used to unpublish team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_team_leader($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE team_leaders SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_team_leader
   *
   * This is used to delete team leader details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_team_leader($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('team_leaders', array('id' => $iNewfeedId)))
    {
		 $this->db->query("UPDATE employees SET tl_id = '0' WHERE id ='$iNewfeedId'");
        return true;
    }
    else
    {
        return false;
    }
  }
}

?>