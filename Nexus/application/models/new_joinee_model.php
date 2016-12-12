<?php
/**
 * New_joinee_model Class 
 * @package CI_new_joinee_model
 * @subpackage Model
 * @author Ashok Jadhav
 *
 */

class new_joinee_model extends CI_Model{
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
     * get details of new joinees for mumabioffice
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function office_details($param,$limit,$start){
		/*echo $param."/".$limit."/".$start;
		exit;*/
		$this->db->select('name,designation,department,extn,email,contact,Resize,img');
		if($param!=''){
			$this->db->where('location_id',$param);
		}
		$this->db->where('status',1);
		$this->db->order_by('name','ASC');
		$this->db->limit($limit,$start);
		$objQuery = $this->db->get('employees');
		if ($objQuery->num_rows() > 0) {
            foreach ($objQuery->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
			
        }
		return false;	//$this->db->last_query();
	}
    /**
     * get details of new joinees for Kerala Office
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	
	function keralaoffice_details($limit,$start){
		
		$arrData = array();
		$this->db->select('name,designation,department,extn,email,contact,Resize,img');
		$this->db->where('location_id','2');
		$this->db->where('status',1);
		$this->db->order_by('name','ASC');
		$this->db->limit($limit,$start);
		$objQuery = $this->db->get('employees');
		if ($objQuery->num_rows() > 0) {
            foreach ($objQuery->result() as $row) {
                $data[] = $row;
            }
            return $data;
			
        }
		return false;
	}   
/**
     * get details of new joinee
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	function get_new_joinee_details($newsfeedId = 0){
		$arrData = array();
		if($newsfeedId != 0 ){
			$this->db->where('id', $newsfeedId); 
		}
		$query=$this->db->query("SELECT * FROM employees where DATE(NOW())<= DATE_ADD(joining_date,								INTERVAL 30 DAY) AND status='1'");
		return $query->result_array();

	}   
	
	function get_all_new_joinee_details($limit,$start){
		$this->db->select('name,designation,department,email,contact,Resize,img,extn');
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get('employees');
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
			
        }
        return false;

	}
	
	public function record_count($param) {
		
		$this->db->select('name,designation,email,contact,Resize,img');
		if($param){
			$this->db->where('location_id',$param);
		}
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('employees');
		return $query->result();
			
    }
	
	 /*public function record_countall() {
		$this->db->select('name,designation,email,contact,Resize,img');
		$this->db->where('status',1);
		$this->db->order_by('id','DESC');
		$query = $this->db->get('employees');
		return $query->result();
			
    }*/


	 public function record_countnew() {
		$query=$this->db->query("SELECT * FROM employees where DATE(NOW())<= DATE_ADD(joining_date,INTERVAL 30 DAY) AND status='1'");
		return $query->result();
			
    }


	function get_online_details($newsfeedId = 0){
		$arrData = array();
		$this->db->select('name,department,img,Resize,online');
		$this->db->where_not_in('id',$this->session->userdata('id'));
		$this->db->limit(10);
		$objQuery = $this->db->get('employees');
		return $objQuery->result_array();

	}
	

	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function getUsers($conditions=array(),$fields=''){
		parent::__construct(); 
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
			$this->db->from('employees');
		if($fields!='')
			$this->db->select($fields);
		else 		
	 		$this->db->select('employees.id,employees.username,employees.name,employees.email,employees.online');
		$this->db->where_not_in('id',$this->session->userdata('site_userid'));
		$this->db->where_not_in('username','');
		$this->db->order_by("online","desc");
		$result = $this->db->get();
		return $result;
		

     }//End of getUsers Function


     /**
     * get description
     * 
     * 
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     * 
     */
	 function readempDesc($newsfeedId){
		$arrData = array();
		$query=$this->db->query("SELECT description FROM employees WHERE id=$newsfeedId AND status='1'");
        return $query->result_array();

	}    
}

?>