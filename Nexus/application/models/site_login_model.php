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
 * @author		Manish Dubey
 * @package		Safe Doc
 * @subpackage	Model
 */

class Site_login_model extends CI_Model{

	// --------------------------------------------------------------------

	/**
	 * __construct
	 *
	 * Calls parent constructor
	 * @author	Manish Dubey
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
		$this->db->select('id,name,password,username,img,email');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user
		$this->db->where('username',$u);

		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		//$this->db->where('adminUserPassword',MD5($pw));

		$this->db->where('password',$pw);

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('employees');

		// Count if there are any rows returned
		if ($Q->num_rows() > 0){
			$query=$this->db->query("Update employees SET online='1' where username='$u' AND password='$pw'");

			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			$login_user = array("site_name" => $row['name'],"site_pic" => $row['img'], "site_user"=>$row['username'],"site_user1"=>str_replace('.','_',$row['username']),"site_userid"=>$row['id'],"site_useremail"=>$row['email'],"site_login"=>TRUE);
			//var_dump($login_user);exit;
			$this->session->set_userdata($login_user);
		}else{

			// This will give an error message to the user for incorrect login or password details.
			$login_user = array("site_name" => "" ,"site_user"=>"","site_user1"=>"","site_userid"=>0,"site_useremail"=>"","site_login"=>FALSE);
			$this->session->set_userdata($login_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
	}






}


?>
