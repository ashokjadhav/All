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

class library_model extends CI_Model{

  // --------------------------------------------------------------------

  /**
   * __construct
   *
   * Calls parent constructor
   * @author  zchngs
   * @access  public
   * @return  void
   */
  function __construct(){
    // Initialization of class
    parent::__construct();
  }


/**
   * get_category_details
   *
   * This is used to fetches category details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_category_details($newsfeedId = 0){
	$arrData = array();
    if($newsfeedId != 0 ){
		$this->db->where('id', $newsfeedId);
    }
    $this->db->select('*');
    $this->db->order_by('id','ASC');
    $objQuery = $this->db->get('category');
    return $objQuery->result_array();

  }

  /**
   * get_borrowed_details
   *
   * This is used to fetches borrowed details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function hire($arrData){
	if($this->db->insert('lending_management', $arrData)){
		return true;
    }
	else{
		return false;
    }
  }

   function request_status($iNewfeedId,$category){
		$query1 = $this->db->query("UPDATE $category SET borrow_status='request' WHERE												id='$iNewfeedId'");
		if($query1){
			return true;
		}
		else{
			return false;
		}
	}
  /**
   * get_borrowed_details
   *
   * This is used to fetches borrowed details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
	function get_subcategory($table){
		$this->db->select('sub_category');
		$this->db->where('category',$table);
        $this->db->from('subcategory');
		$query = $this->db->get();
		return $query->result_array();
	}

    /**
   * get_borrowed_details
   *
   * This is used to fetches borrowed details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
	function get_items($category1,$table,$subcat,$search=null){
		$category=urldecode($category1);
		$strict=false;
		foreach($subcat as $item) {
		  if($item['sub_category'] ==$category)
			  $strict=true;
		}
		if($category==''){
			$this->db->select('*');
			$this->db->where('status','1');
			if($search!=null){
				$this->db->like('name',$search);
			}
			$query2 = $this->db->get($table);
			return $query2->result_array();
			}
		else if($strict){
			$this->db->select('*');
			$this->db->where('sub_category',$category);
			$this->db->where('status','1');
			$query2 = $this->db->get($table);
			return $query2->result_array();
		}
		else{
			$this->db->select('*');
			$this->db->where('status','1');
			$query2 = $this->db->get($table);
			return $query2->result_array();
		}
	}
	function get_categoryitems($table){
		$this->db->select('*');
		$query2 = $this->db->get($table);
		if($query2->num_rows()>0){
			return $query2->result_array();
		}
		else{
			return false;
		}
	}

    /**
   * get_borrowed_details
   *
   * This is used to fetches borrowed details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
	function get_status($resource_id,$category,$userid){
		$this->db->select('resource_id,category,borrow_status,user_id');
        $this->db->from('lending_management');
		$this->db->where('lending_management.resource_id',$resource_id);
		$this->db->where('lending_management.user_id',$userid);
		$this->db->where('lending_management.category',$category);
	    $this->db->where('lending_management.borrow_status','request');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//exit;
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return false;
		}


	}
}

?>