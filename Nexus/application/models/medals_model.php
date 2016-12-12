<?php
/**
 * Birth_day Class
 * @package CI_Admin
 * @subpackage Model
 * @author priyank jain
 *
 */

class Medals_model extends CI_Model{

	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	zchngs
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}



   /**
     * get user info which have birthday on today
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_medals_details($newsfeedId=0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId);
		}
		$this->db->select('dop,medalfor,email,contact,Resize,img');
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
		$objQuery = $this->db->get('user');
		return $objQuery->result_array();


	}
	function update_medals($user_id,$arrData){
		
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('medals');
		if($query->num_rows() == 1){
			$this->db->where('user_id',$user_id);
			if($this->db->update('medals', $arrData)){
				return true;
			}
			else
			{
				return false;
			}
		}
		else{
			if($this->db->insert('medals', $arrData)){
				return true;
			}
			else{
				return false;
			}
		}
	}



    function save_assignmentdetails($user_id,$arrData){
	    //$name = urldecode($name);
	    $this->db->where('user_id',$user_id);
		if($this->db->insert('special_assignments', $arrData)){
			return true;
		}
		else{
			return false;
		}
	}


    function save_kradetails($user_id,$arrData){
		//$name = urldecode($name);
		$this->db->where('user_id',$user_id);
		if($this->db->insert('kra', $arrData)){
			return true;
		}
		else{
			return false;
		}
	}

	function save_kpidetails($user_id,$arrData){
		//$name = urldecode($name);
		$this->db->where('user_id',$user_id);
		if($this->db->insert('kpi', $arrData)){
		  return true;
		}else{
		  return false;
		}

	}
	function save_programdetails($user_id,$arrData){
		//$name = urldecode($name);
		if($this->db->insert('training_programs', $arrData)){
		  return true;
		}else{
		  return false;
		}

  }

}

?>