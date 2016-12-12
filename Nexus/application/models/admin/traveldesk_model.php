<?php
/**
 * traveldesk_model Class
 *
 * @author Ketan Sangani
 * @package CI_traveldesk_model
 * @subpackage Model
 *
 */

class traveldesk_model extends CI_Model{

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
   * save_airlinesdetails
   *
   * This is used to save travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_airlinesdetails($arrData){

    if($this->db->insert('travel_airlines', $arrData)){

      return true;
    }else{
      return false;
    }

  }

    /**
   * get_airlines_details
   *
   * This is used to fetches travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_airlines_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('travel_airlines');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_airline
   *
   * This is used to update travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_airline($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('travel_airlines', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_airlines
   *
   * This is used to delete multiple travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_airlines($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('travel_airlines'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_airline
   *
   * This is used to publish travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_airline($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE travel_airlines SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_airline
   *
   * This is used to unpublish travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_airline($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE travel_airlines SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_airline
   *
   * This is used to delete travel airlines details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_airline($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_airlines', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * save_locationsdetails
   *
   * This is used to save travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_locationsdetails($arrData){

    if($this->db->insert('travel_locations', $arrData)){

      return true;
    }else{
      return false;
    }

  }

    /**
   * get_locations_details
   *
   * This is used to fetches travel locations details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_locations_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('travel_locations');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_location
   *
   * This is used to update travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_location($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('travel_locations', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_locations
   *
   * This is used to delete multiple travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_locations($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('travel_locations'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_location
   *
   * This is used to publish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE travel_locations SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_location
   *
   * This is used to unpublish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_location($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE travel_locations SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_location
   *
   * This is used to delete travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_location($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_locations', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  /**
   * save_authoritydetails
   *
   * This is used to save approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_authoritydetails($arrData){

    if($this->db->insert('travel_authorities', $arrData)){

      return true;
    }else{
      return false;
    }

  }

   /**
   * get_authority_details
   *
   * This is used to fetches approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_authority_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('travel_authorities.id', $newsfeedId);
    }

    $this->db->select('travel_authorities.*,employees.name');
  $this->db->from('travel_authorities');
  $this->db->join('employees','employees.id=travel_authorities.user_id','full outer');

    $this->db->order_by('id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }


  /**
   * update_authority
   *
   * This is used to update approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_authority($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('travel_authorities', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_authority
   *
   * This is used to delete multiple approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_authority($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('travel_authorities'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_authority
   *
   * This is used to publish approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_authority($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE travel_authorities SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_authority
   *
   * This is used to unpublish approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_authority($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE travel_authorities SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_authority
   *
   * This is used to delete approving authority details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_authority($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_authorities', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * get_hotelrequests_management_details
   *
   * This is used to fetches hotel and guesthouse booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_hotelrequests_management_details($newsfeedId = 0,$table){



		//$status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$this->db->select('employees.name as name,employees.department as department,employees.designation as designation,'.$table.'.*');
        //$this->db->from('book_flight');
		$this->db->join('employees','employees.id = '.$table.'.user_id','full outer');
		$this->db->where(''.$table.'.status','0');
		$this->db->order_by(''.$table.'.id','ASC');
        $query = $this->db->get($table);

        return $query->result_array();

  }
  /**
   * multi_delete__hotelrequests
   *
   * This is used to delete multiple hotel and guesthouse booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId,$table
   * @return void
   */
  function multi_delete__hotelrequests($table,$arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete($table))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  /**
   * get_travelrequests_management_details
   *
   * This is used to fetches travel booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_travelrequests_management_details($newsfeedId = 0,$table){



		$status="(travel_desk.book_status = '0' OR travel_desk.book_status = '1')";
		$this->db->select('employees.name as name,employees.department as department,employees.designation as designation,travel_desk.*,book_hotel.stayplace,book_hotel.checkin_date,book_hotel.checkout_date,book_hotel.instructions,book_guesthouse.stayplace as guest_place,book_guesthouse.checkin_date as guest_checkin,book_guesthouse.checkout_date as guest_checkout,book_guesthouse.instructions as guest_instr');
    $this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->join('book_hotel','travel_desk.hotel = book_hotel.id','left');
		$this->db->join('book_guesthouse','travel_desk.guesthouse = book_guesthouse.id','left');
		$this->db->where('mode',$table);
    $this->db->where('request_status','0');
		$this->db->where($status);
		$this->db->order_by('travel_desk.id','ASC');
    $query = $this->db->get('travel_desk');
    //echo $this->db->last_query();
    //exit;
    return $query->result_array();

  }
   /* get_emailofhod
   *
   * This is used to fetches email id of hod
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$userid
   * @return array
   */
  function get_emailofhod($userid){



		
		$this->db->select('employees.email ');
               
		$this->db->where('id',$userid);
		//$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('employees');
//echo $this->db->last_query();exit;
        return $query->result_array();

  }

   /**
   * delete_travelrequest
   *
   * This is used to delete travel booking request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_travelrequest($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * get_modifiedtickets_management_details
   *
   * This is used to fetches modified travel booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_modifiedtickets_management_details($newsfeedId = 0,$table){

		$status="(travel_desk.book_status = '0' OR travel_desk.book_status = '1')";
		$this->db->select('employees.name as name,employees.department as department,employees.designation as designation,travel_desk.*,book_hotel.stayplace,book_hotel.checkin_date,book_hotel.checkout_date,book_hotel.instructions,book_hotel.ticket_number as hotel_ticketno,book_guesthouse.stayplace as guest_place,book_guesthouse.checkin_date as guest_checkin,book_guesthouse.checkout_date as guest_checkout,book_guesthouse.instructions as guest_instr,,book_guesthouse.ticket_number as guest_ticketno');
        //$this->db->from('book_flight');
		$this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->join('book_hotel','travel_desk.hotel = book_hotel.id','left');
		$this->db->join('book_guesthouse','travel_desk.guesthouse = book_guesthouse.id','left');
		$this->db->where('mode',$table);
                                $this->db->where('request_status','1');
		$this->db->where('travel_desk.book_status','0');
		$this->db->order_by('travel_desk.id','ASC');
                                $query = $this->db->get('travel_desk');

                        return $query->result_array();
  }
   /**
   * delete_modifiedtravelrequest
   *
   * This is used to delete modified travel booking request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_modifiedtravelrequest($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * get_cancelledtickets_management_details
   *
   * This is used to fetches cancelled travel booking request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_cancelledtickets_management_details($newsfeedId = 0,$table){

		//$status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$this->db->select('employees.name as name,employees.department as department,employees.designation as designation,travel_desk.*,book_hotel.stayplace,book_hotel.checkin_date,book_hotel.checkout_date,book_hotel.instructions,book_hotel.ticket_number as hotel_ticketno,book_guesthouse.stayplace as guest_place,book_guesthouse.checkin_date as guest_checkin,book_guesthouse.checkout_date as guest_checkout,book_guesthouse.instructions as guest_instr,,book_guesthouse.ticket_number as guest_ticketno');
        //$this->db->from('book_flight');
		$this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->join('book_hotel','travel_desk.hotel = book_hotel.id','left');
		$this->db->join('book_guesthouse','travel_desk.guesthouse = book_guesthouse.id','left');
		$this->db->where('mode',$table);
                                $this->db->where('request_status','2');
		//$this->db->where($status);
		$this->db->order_by('travel_desk.id','ASC');
                                $query = $this->db->get('travel_desk');

                                return $query->result_array();
  }
  /**
   * delete_cancelledtravelrequest
   *
   * This is used to delete cancelled travel booking request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_cancelledtravelrequest($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * get_approvedtickets_management_details
   *
   * This is used to fetches approved travel booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId,$table
   * @return array
   */
  function get_approvedtickets_management_details($newsfeedId = 0,$table){

		//$status="travel_desk.book_status = '2')";
		$this->db->select('employees.name as name,employees.department as department,employees.designation as designation,travel_desk.*,book_hotel.stayplace,book_hotel.checkin_date,book_hotel.checkout_date,book_hotel.instructions,book_hotel.ticket_number as hotel_ticketno,book_guesthouse.stayplace as guest_place,book_guesthouse.checkin_date as guest_checkin,book_guesthouse.checkout_date as guest_checkout,book_guesthouse.instructions as guest_instr,,book_guesthouse.ticket_number as guest_ticketno');
        //$this->db->from('book_flight');
		$this->db->join('employees','employees.id = travel_desk.user_id','full outer');
		$this->db->join('book_hotel','travel_desk.hotel = book_hotel.id','left');
		$this->db->join('book_guesthouse','travel_desk.guesthouse = book_guesthouse.id','left');
		$this->db->where('mode',$table);
                                $this->db->where('approved_status','1');
		$this->db->where('travel_desk.book_status',2);
		$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('travel_desk');
         //echo $this->db->last_query();exit;
        return $query->result_array();
  }
   /**
   * delete_approvedtravelrequest
   *
   * This is used to delete approved travel booking request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_approvedtravelrequest($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('travel_desk', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * multi_delete_ticketsapproved
   *
   * This is used to delete multiple approved travel booking requests details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_ticketsapproved($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('travel_desk'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
/**
   * update_request
   *
   * This is used to update status and pnr of travel request
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$iNewfeedId
   * @return boolean
   */
   function update_request($arrData,$table,$id){

	 $this->db->where('id',$id);
	 $this->db->where('mode',$table);

   if($this->db->update('travel_desk', $arrData))
    {

        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * update_hotelrequest
   *
   * This is used to update status and code of travel request
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData,$table,integer-$id
   * @return boolean
   */
   function update_hotelrequest($arrData,$id){

	 $this->db->where('id',$id);


   if($this->db->update('book_hotel', $arrData))
    {

        return true;
    }
    else
    {
        return false;
    }
  }
    /**
   * update_hotelrequest
   *
   * This is used to update status and code of travel request
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData,$table,integer-$id
   * @return boolean
   */
   function update_guesthouserequest($arrData,$id){

	 $this->db->where('id',$id);


   if($this->db->update('book_guesthouse', $arrData))
    {

        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * get_requestdetails
   *
   * This is used to fetches updated travel request details for send mail
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$id,$table
   * @return array
   */
  function get_requestdetails($table,$id){



		//$status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$this->db->select('employees.email as email,employees.name as name,employees.department as department,employees.designation as designation,travel_desk.*');
        //$this->db->from('travel_desk');
		$this->db->join('employees','employees.id = travel_desk.user_id','full outer');
        $this->db->where('mode',$table);
		$this->db->where('travel_desk.id',$id);
		//$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('travel_desk');
//echo $this->db->last_query();exit;
        return $query->result_array();

  }
   /**
   * get_hotelrequestdetails
   *
   * This is used to fetches updated hotel request details for send mail
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$id,$table
   * @return array
   */
  function get_hotelrequestdetails($id){



		//$status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$this->db->select('*');
        //$this->db->from('travel_desk');
		//$this->db->join('employees','employees.id = book_hotel.user_id','full outer');
		$this->db->where('book_hotel.id',$id);
		//$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('book_hotel');
//echo $this->db->last_query();exit;
        return $query->result_array();

  }
   /**
   * get_hotelrequestdetails
   *
   * This is used to fetches updated hotel request details for send mail
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$id,$table
   * @return array
   */
  function get_guesthouserequestdetails($id){



		//$status="(travel_desk.approved_status = '0' OR travel_desk.approved_status = '2')";
		$this->db->select('*');
        //$this->db->from('travel_desk');
		//$this->db->join('employees','employees.id = book_hotel.user_id','full outer');
		$this->db->where('book_guesthouse.id',$id);
		//$this->db->order_by('travel_desk.id','ASC');
        $query = $this->db->get('book_guesthouse');
//echo $this->db->last_query();exit;
        return $query->result_array();

  }
     /**
   * delete_hotel_request
   *
   * This is used to delete hotel or guesthouse request details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$id,$table
   * @return boolean
   */
function delete_hotel_request($id,$table){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete($table, array('id' => $id)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * save_locationsdetails
   *
   * This is used to save travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_guesthousedetails($arrData){

    if($this->db->insert('guesthouse_locations', $arrData)){

      return true;
    }else{
      return false;
    }

  }

    /**
   * get_locations_details
   *
   * This is used to fetches travel locations details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_guesthouse_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('guesthouse_locations');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_location
   *
   * This is used to update travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_guesthouse($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('guesthouse_locations', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_locations
   *
   * This is used to delete multiple travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_guesthouse($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('guesthouse_locations'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_location
   *
   * This is used to publish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_guesthouse($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE guesthouse_locations SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_location
   *
   * This is used to unpublish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_guesthouse($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE guesthouse_locations SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_location
   *
   * This is used to delete travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_guesthouse($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('guesthouse_locations', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }





   /**
   * save_locationsdetails
   *
   * This is used to save travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_hoteldetails($arrData){

    if($this->db->insert('hotel_locations', $arrData)){

      return true;
    }else{
      return false;
    }

  }

    /**
   * get_locations_details
   *
   * This is used to fetches travel locations details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_hotel_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('hotel_locations');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_location
   *
   * This is used to update travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_hotel($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('hotel_locations', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_locations
   *
   * This is used to delete multiple travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_hotel($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('hotel_locations'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_location
   *
   * This is used to publish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_hotel($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE hotel_locations SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_location
   *
   * This is used to unpublish travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_hotel($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE hotel_locations SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_location
   *
   * This is used to delete travel location details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_hotel($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('hotel_locations', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
}

?>