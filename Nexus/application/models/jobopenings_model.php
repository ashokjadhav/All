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
 * This is jobopenings Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class jobopenings_model extends CI_Model{
  
  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  zchngs
   * @access  public
   * @return  void
   */
  function __construct()
  {
    // Initialization of class
    parent::__construct();
  }
  


    /**
   * get_jobopenings_details
   *
   * This is used to fetches jobopenings details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
	function get_jobopenings_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}	
		$this->db->select('*');
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('jobopenings');
		return $objQuery->result_array();
	}           
}

?>