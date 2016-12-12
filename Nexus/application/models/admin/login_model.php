<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the admin table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to admin are performed here.
 *
 * @package		Safe Doc
 * @subpackage  Model
 * @author		Manish Dubey
 * @copyright	Copyright (c) 2012 - 2013
 * @since		Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is Admin Model
 *
 * @author		Ashok Jadhav
 * @package		Safe Doc
 * @subpackage	Model
 */

class Login_model extends CI_Model{

	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Ashok Jadhav
	 * @access	public
	 * @return	void
	 */
	function __construct()
	{
		// Initialization of class
		parent::__construct();
	}



	/**
	 * verifyUser
	 *
	 * This is for Verification of the User
	 *
	 * @author	Ashok Jadhav
	 * @access	public
	 * @param   string $u, string $pw
	 * @return	void
	 */
	function verifyUser($u,$pw){

		// Set the Select parameter to return adminID and adminName column values of admin table
		$this->db->select('id,username,password');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user
		$this->db->where('username',$u);

		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		//$this->db->where('adminUserPassword',MD5($pw));

		$this->db->where('password',$pw);

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('user_master2');

		// Count if there are any rows returned
		if ($Q->num_rows() > 0){

			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			$ses_user = array("username1"=>$row['username'],"password"=>$row['password'], "id"=>$row['id'],"logged_in"=>TRUE,"privileges"=>'All');
			$this->session->set_userdata($ses_user);
			//print_r($this->session->userdata('logged_in'));exit;
		}else{
			$this->db->select('subuser.id as id,username,password,role.privileges');
				$this->db->where('username',$u);
                $this->db->where('password',$pw);
                $this->db->join('role','subuser.role_id=role.id');
				$Q = $this->db->get('subuser');
				
				//echo $this->db->last_query();
				//exit;
		if($Q->num_rows() > 0){
				$row = $Q->row_array();

				$ses_user = array("username1"=>$row['username'],"id"=>$row['id'],"password"=>$row['password'],"logged_in"=>TRUE ,"privileges"=>  unserialize($row['privileges']));
				
				$this->session->set_userdata($ses_user);
				
				$this->session->set_flashdata('Success', 'Successful Login!!!');
                }
		
		
		else{

			// This will give an error message to the user for incorrect login or password details.
			$ses_user = array("username1"=>"","id"=>0,"logged_in"=>FALSE);
			$this->session->set_userdata($ses_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
	}
	}
/**
	 * change_password
	 *
	 * This is for Change password of the admin
	 *
	 * @author	Ashok Jadhav
	 * @access	public
	 * @param   string $table,array $data,integer $id
	 * @return	void
	 */
function change_password($table,$data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update($table,$data);

		if($this->db->affected_rows() == 1)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}





}


?>