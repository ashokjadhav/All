<?php
/**
 * borrow_model Class
 *
 * @author Ashok Jadhav
 * @package CI_borrow_model
 * @subpackage Model
 *
 */

class borrow_model extends CI_Model{
  
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
   * get_borrowed_details
   *
   * This is used to fetches borrowed details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId 
   * @return array
   */
  function get_borrowed_details($newsfeedId = 0,$table){
    
     $this->db->select('employees.name as subscriber,employees.department as department,lending_management.category as category,lending_management.dos as dos,lending_management.due_date as due_date,lending_management.resource_id as resource_id,lending_management.user_id as user_id,lending_management.id as id,lending_management.returned_date as returned_date,lending_management.borrow_status,'.$table.'.name as name,'.$table.'.sub_category as subcategory,'.$table.'.code as code');
        $this->db->from($table);
        $this->db->join('lending_management',$table.'.id = lending_management.resource_id','full outer');
		$this->db->where('category',$table);
		$this->db->where('lending_management.borrow_status','pending');
		$this->db->join('employees','employees.id = lending_management.user_id','full outer');
        $query = $this->db->get();
        return $query->result_array();
  }           
       

            
 /**
   * multi_delete_borrowed
   *
   * This is used to delete multiple borrowed details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_borrowed($arriNewfeedId){
    
    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('borrowed'))
    {
        return true;
    }
    else
    {
        return false;
    } 
  }

              
 /**
   * set_status
   *
   * This is used to set return status for resource details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$iNewfeedId,$resource_id,string-$category
   * @return result_array
   */  
  function set_status($iNewfeedId,$category,$resource_id){
    
   
    $query=$this->db->query("UPDATE lending_management SET borrow_status='return',returned_date=NOW() WHERE id='$iNewfeedId'");
	
	if($query){
		$this->db->select('category,resource_id,user_id');
		$this->db->from('lending_management');
		$this->db->where('resource_id',$resource_id);
		$this->db->where('category',$category);
		$this->db->where('borrow_status','request');
		$q = $this->db->get();
        if($q->num_rows()>0){
			$query1= $this->db->query("UPDATE $category SET borrow_status='request' WHERE id='$resource_id'");
   
		}else{
			$query1 = $this->db->query("UPDATE $category SET borrow_status='return' WHERE id='$resource_id'");
		
		}
		
	$q=$this->db->query("SELECT id,DATEDIFF(returned_date,dos) as 'Duration' FROM lending_management WHERE id='$iNewfeedId'");
	return $q->result_array();
	}
	else{
	return false;}

	
	
  }
   /**
   * get_userid
   *
   * This is used to get userid for next request details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$resource_id,string-$category
   * @return result_array or false
   */  

  function get_userid($category,$resource_id){
        $this->db->select('category,resource_id,user_id');
		$this->db->from('lending_management');
		$this->db->where('resource_id',$resource_id);
		$this->db->where('category',$category);
		$this->db->where('borrow_status','request');
		$this->db->limit(1);
		$query3 = $this->db->get();
		if($query3->num_rows()>0){
			return $query3->result_array();
		}
		else{return false;}


  }
   /**
   * get_emailid
   *
   * This is used to get emailid for next request
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$userid
   * @return result_array
   */  

   function get_emailid($userid){
        $this->db->select('email');
		$this->db->from('employees');
		$this->db->where('id',$userid);
		$query = $this->db->get();
		return $query->result_array();

  }
   function get_details($category,$id){
        $this->db->select('*');
		$this->db->from($category);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();

  }
 
    function set_lost_status($iNewfeedId,$category,$resource_id){
    
    
    $query=$this->db->query("UPDATE lending_management SET borrow_status='lost' WHERE id='$iNewfeedId'");
	$query1 = $this->db->query("UPDATE $category SET status='0',borrow_status=''  WHERE id='$resource_id'");
	}
  
     function get_category_details($newsfeedId = 0){
    
    $arrData = array();
    
    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId); 
    }
    
    $this->db->select('*');
	$this->db->where('status',1);
    $this->db->order_by('id','DESC');
    
    $objQuery = $this->db->get('category');
    
    //$this->db->last_query();
    
    return $objQuery->result_array();

  } 
    
}

?>