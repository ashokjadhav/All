<?php
/**
 * Birth_day Class
 * @package CI_Admin
 * @subpackage Model
 * @author priyank jain
 *
 */

class My_dashboard_model extends CI_Model{

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

	function verifyEmploy($u,$pw){

		// Set the Select parameter to return adminID and adminName column values of admin table
		$this->db->select('id,name,password,username');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user
		$this->db->where('username',$u);
		$this->db->where('username',$this->session->userdata('site_user'));
		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		//$this->db->where('adminUserPassword',MD5($pw));

		$this->db->where('password',$pw);

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('employees');

		// Count if there are any rows returned
		if ($Q->num_rows() > 0){

			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			$login_user = array("dashname" => $row['name'], "dashuser"=>$row['username'],"dashuserid"=>$row['id'],"dashlogin"=>TRUE);
			//var_dump($login_user);exit;
			$this->session->set_userdata($login_user);
		}else{

			// This will give an error message to the user for incorrect login or password details.
			$login_user = array("dashname" => "" ,"dashuser"=>"","dashuserid"=>0,"dashlogin"=>FALSE);
			$this->session->set_userdata($login_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
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
	function get_allmedals_details(){
		$id=$this->session->userdata('site_userid');
		$this->db->select('gold,silver,bronze,medalfor,dop,from_date,to_date');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('medals');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}


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
	function get_allassignments_details(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('subject,details,comments,deadline');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('special_assignments');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}

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
	function get_allkras_details(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('details');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('kra');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}

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
	function get_allkpis_details(){
		$id=$this->session->userdata('site_userid');
		$this->db->select('details');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('kpi');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
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
	function get_alltraining_details(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('*');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('training_programs');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}

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
	function get_elearningtime_details(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('*');
		$this->db->where('user_id',$id);
        $this->db->where('status','1');
		$objQuery = $this->db->get('elearning_spenttime');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
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
	function get_quizscores_details(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('*');
		$this->db->where('user_id',$id);
		$this->db->where('status','1');
		$objQuery = $this->db->get('quiz_scores');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}

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
	function check_travelauthorityornot(){

		$id=$this->session->userdata('site_userid');
		$this->db->select('*');
		$this->db->where('user_id',$id);
		$objQuery = $this->db->get('travel_authorities');
		if($objQuery->num_rows>0){
			return true;
		}
		else{
			return false;
		}

	}
}
?>