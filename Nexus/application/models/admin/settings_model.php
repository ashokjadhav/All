<?php
/**
 * Safe Doc
 *
 * @Description  This class is used to interact with the Newsfeed table using Codeignitor db core class. All the Data Insert,Retrival and Update operations related to country are performed here.
 *
 * @package   Safe Doc
 * @subpackage  Model
 * @author    zchngs
 * @copyright Copyright (c) 2012 - 2013
 * @since   Version 1.0
 */

// ------------------------------------------------------------------------

/**
 *
 * This is thought Model
 *
 * @author    Ashok Jadhav
 * @package   Safe Doc
 * @subpackage  Model
 */

class settings_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  Ashok Jadhav
   * @access  public
   * @return  void
   */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }

  /**
   * set_password
   *
   * This is used to fetches thought details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function set_password($id,$password,$cn_password){
	 $this->db->select('password');
	 $this->db->where('id',$id);
	 $this->db->where('password',$password);
	  $objQuery = $this->db->get('user_master2');
	  if($objQuery->num_rows()>0){
		$Q=$this->db->query("UPDATE user_master2 SET password='$cn_password' WHERE id='$id'");
		return true;
	  }
		else{
			$this->db->select('password');
			$this->db->where('id',$id);
			$this->db->where('password',$password);
			$objQuery = $this->db->get('subuser');
			//echo $this->db->last_query();
		//exit;
			if($objQuery->num_rows()>0){
				$Q=$this->db->query("UPDATE subuser SET password='$cn_password' WHERE id='$id'");
				return true;
			}
			else{
			  return false;
			}
		
		
		}
			  


  }


}

?>