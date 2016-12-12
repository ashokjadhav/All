<?php
/**
 * what_is_on_today_model Class
 *
 * @author Ashok Jadhav
 * @package CI_what_is_on_today_model
 * @subpackage Model
 *
 */

class Dashboard_posting_model extends CI_Model{

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
	 * get_juniors
	 *
	 * Get details of juniors
	 * @author Ashok Jadhav
	 * @access public
	 * @param $id - Team Lead id
	 * @return void
	 *
	 */
   	function get_juniors($id){
		$this->db->select('id,name,tl_id');
		$this->db->where('tl_id', $id);
		$objQuery = $this->db->get('employees');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}

  }

  function verifyEmploy($u,$pw){

		// Set the Select parameter to return adminID and adminName column values of admin table
		$this->db->select('id,name,password,username');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user
		$this->db->where('username',$u);
		$this->db->where('name',$this->session->userdata('site_useremail'));
		//$this->db->where('username',$u);

		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		//$this->db->where('adminUserPassword',MD5($pw));

		$this->db->where('password',$pw);

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('team_leaders');

		// Count if there are any rows returned
		if ($Q->num_rows() > 0){

			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			$login_user = array("dpname" => $row['name'], "dpuser"=>$row['username'],"dpuserid"=>$row['id'],"dplogin"=>TRUE);
			//var_dump($login_user);exit;
			$this->session->set_userdata($login_user);
		}else{

			// This will give an error message to the user for incorrect login or password details.
			$login_user = array("dpname" => "" ,"dpuser"=>"","dpuserid"=>0,"dplogin"=>FALSE);
			$this->session->set_userdata($login_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
	}


	/**
     * get all Medal Deatils
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_allmedals_details($user_id){
		//$name=urldecode($name);
		$this->db->select('gold,silver,bronze,medalfor,dop,from_date,to_date,user_id');
		$this->db->where('user_id',$user_id);
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
     * get all assignments details
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_allassignments_details($user_id){
        //$name=urldecode($name);
		$this->db->select('id,user_id,subject,details,comments,deadline');
		$this->db->where('user_id',$user_id);
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
     * get all kra details
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_allkras_details($user_id){
        //$name=urldecode($name);
		$this->db->select('id,details,user_id');
		$this->db->where('user_id',$user_id);
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
     * get all kpis details
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_allkpis_details($user_id){
        //$name=urldecode($name);
		//$name=$this->session->userdata('dashname');
		$this->db->select('id,details,user_id');
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('kpi');
		if($objQuery->num_rows>0){

		return $objQuery->result_array();
		}
		else{return false;
		}

	}


	/**
     * get all training programs details
     *
     * saves data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author priyank jain
     *
     */
	function get_alltraining_details($user_id){
        //$name=urldecode($name);
		$this->db->select('*');
		$this->db->where('user_id',$user_id);
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



}

?>