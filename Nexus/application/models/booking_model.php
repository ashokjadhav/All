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

class booking_model extends CI_Model{

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
     * get_flight_ticket
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_hod(){
		$this->db->select('travel_authorities.*,employees.name');
	    $this->db->from('travel_authorities');
	    $this->db->join('employees','employees.id=travel_authorities.user_id','full outer');

		$this->db->where('travel_authorities.status',1);
		$this->db->order_by('id','ASC');
		$objQuery = $this->db->get();
		return $objQuery->result_array();
  }

	/**
     * get_flight_ticket
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_emailofauthority($authority){
		$this->db->select('email,name');
        $this->db->where('id',$authority);
		$objQuery = $this->db->get('employees');
		return $objQuery->result_array();
  }

	/**
     * get_flight_ticket
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_detailsofuser($userid){
		$this->db->select('name,email,designation,department');
        $this->db->where('id',$userid);
		$objQuery = $this->db->get('employees');
		return $objQuery->result_array();
  }


  /**
     * Book  ticket
     *
     * saves data
     * @access public
     * @param $table,$data
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function book_ticket($arrData)
	{
		if($this->db->insert('travel_desk',$arrData))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	/**
     * Book  hotel
     *
     * saves data
     * @access public
     * @param $table,$data
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function book_extra($arrData)
	{
		if($this->db->insert('book_hotel',$arrData))
		{

			$this->db->select('id');
			$this->db->order_by('id','DESC');
			$this->db->limit(1);
			$objQuery = $this->db->get('book_hotel');
			return $objQuery->result_array();
		}
		else {
			return FALSE;
		}
	}
	/**
     * Book  guesthouse
     *
     * saves data
     * @access public
     * @param $table,$data
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function book_extra1($arrData)
	{
		if($this->db->insert('book_guesthouse',$arrData))
		{
			$this->db->select('id');
			$this->db->order_by('id','DESC');
			$this->db->limit(1);
			$objQuery = $this->db->get('book_guesthouse');
			return $objQuery->result_array();
		}
		else {
			return FALSE;
		}
	}

	/**
     * get_flight_ticket
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_ticket_details($id){
		$this->db->select('travel_desk.*,travel_airlines.type as flight_type,travel_airlines.name as flight_name,book_hotel.*,book_guesthouse.stayplace as			guest_place,book_guesthouse.checkin_date as											guest_checkin,book_guesthouse.checkout_date as										guest_checkout,book_guesthouse.instructions as guest_instr');
        $this->db->from('travel_desk');
		$this->db->join('travel_airlines','travel_desk.airlines_id = travel_airlines.id','left');
		$this->db->join('book_hotel','travel_desk.hotel = book_hotel.id','left');
		$this->db->join('book_guesthouse','travel_desk.guesthouse = book_guesthouse.id','left');

		$this->db->where('PNR',$id);
		$this->db->where('approved_status','1');
		$this->db->where_not_in('request_status','2');
		$objQuery = $this->db->get();
		//echo $this->db->last_query();exit;
		return $objQuery->result_array();
}




	/**
     * ticket cancellation
     *
     * update status
     * @access public
     * @param $pnr,$arrData
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function  set_cancel_status($pnr,$arrData){
		$this->db->where('PNR',$pnr);
		if($this->db->update('travel_desk',$arrData))
			{
				return TRUE;
			}
			else {
				return FALSE;
			}
	}

/**
     * Book Hotel
     *
     * saves data
     * @access public
     * @param $table,$data
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function save_hotel($arrData)
	{
		if($this->db->insert('book_hotel',$arrData))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}


	/**
     * get_flight_ticket
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_hotel(){
		$this->db->select('*');
		$this->db->where('status','1');
		$objQuery = $this->db->get('book_hotel');
		return $objQuery->result_array();

	}



   	function get_all_airlines($id){
		$this->db->select('*');
		$this->db->where('type',$id);
		$this->db->where('status','1');
		$objQuery = $this->db->get('travel_airlines');
		return $objQuery->result_array();

  }

  /**
     * ticket modify
     *
     * update status
     * @access public
     * @param $pnr,$arrData
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function  modify_ticket($pnr,$arrData){
		$this->db->where('PNR',$pnr);
		if($this->db->update('travel_desk',$arrData)){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
 /**
     * get_all_locations
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_all_locations(){
		$this->db->select('*');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('travel_locations');
		return $objQuery->result_array();
	}

	/**
     * get_all_locations
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_all_guesthouse(){
		$this->db->select('*');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('guesthouse_locations');
		return $objQuery->result_array();
	}

	/**
     * get_all_locations
     *
     * get flight ticket information
     * @access public
     * @param
     * @return array
     * @author Ashok Jadhav
     *
     */
   	function get_all_hotel(){
		$this->db->select('*');
        $this->db->where('status','1');
		$this->db->order_by('id','DESC');
		$objQuery = $this->db->get('hotel_locations');
		return $objQuery->result_array();
	}


}

?>