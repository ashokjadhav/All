<?php
/**
 * Branding_template_model Class
 *
 * @author Ketan Sangani
 * @package CI_Branding_template_model
 * @subpackage Model
 *
 */

class Branding_template_model extends CI_Model{

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
     * get_branding_details
     * get branding details of company
     *
     * retrieve data
     * @access public
     * @param $newsfeedId
     * @return array
     * @author Ketan Sangani
     *
     */
	function get_branding_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId);
		}
		$this->db->select('*');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('branding_template');
		return $objQuery->result_array();

	}


}

?>