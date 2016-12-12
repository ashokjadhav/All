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

class It_help_desk_model extends CI_Model{

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
  function get_it_details($id,$limit,$start){
            $arrData = array();
          	$this->db->select('it_help_desk.*,employees.name,employees.designation,employees.extn,employees.location_id');
          	$this->db->from('it_help_desk');
          	$this->db->join('employees','employees.id=it_help_desk.user_id','FULL OUTER');
            if($id!=null){
                $this->db->where('employees.location_id',$id);
            }
          	$this->db->order_by('id','ASC');
          	//$this->db->limit($limit,$start);

    $query = $this->db->get();

		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;



  }
      function record_count(){

   $query=$this->db->query("SELECT * FROM  it_help_desk");

		//var_dump($this->db->last_query());


		//return $query->result_array();
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;


  }


}

?>