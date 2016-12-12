<?php 
/**
 * Admin_model Class 
 * @package CI_Admin
 * @subpackage Model
 * @author priyank jain
 *
 */

 
class Admin_model extends CI_Model
{
	/**
     * add_data
     * 
     * saves data
     * @access public
     * @param $table,$data
     * @return status
     * @author priyank jain
     * 
     */
	function add_data($table,$data)
	{
		if($this->db->insert($table,$data))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	/**
     * get_data
     * 
     * fetches data
     * @access public
     * @param $table,$id,$offset,$limit
     * @return result array
     * @author priyank jain
     * 
     */
	function get_data($table,$id=null,$offset=null,$limit=null)
	{
		
		if(!empty($id))
			$this->db->where('id',$id);
		
		if(!empty($limit) && !empty($offset)):
			$this->db->limit($limit, $offset);
		elseif(!empty($limit)):
			$this->db->limit($limit);
		
		endif;	
		
		$query = $this->db->get($table);
		
		if(!empty($id))
		{
			return $query->row_array();
		}
		else {
			return $query->result_array();	
		}
		
	}
	
	/**
     * count_records
     * 
     * counts and returns number of rows in table
     * @access public
     * @param $table
     * @return count
     * @author priyank jain
     * 
     */
	function count_records($table)
	{
		return $this->db->count_all_results($table);	
	}
	
	/**
     * update_data
     * 
     * updates data as per table and id
     * @access public
     * @param $table,$data,$id
     * @return status
     * @author priyank jain
     * 
     */
	function update_data($table,$data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update($table,$data))
		{
			echo $this->db->last_query();
			if($this->db->affected_rows() == 1)
			{
				return TRUE;	
			}
			
		}
		else {
			return FALSE;
		}
	}
	
	/**
     * delete_data
     * 
     * delete records as per table name and id
     * @access public
     * @param $table,$id
     * @return status
     * @author priyank jain
     * 
     */
	function delete_data($table,$id)
	{
		$this->db->where('id',$id);
		if($this->db->delete($table))
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	/**
     * read_user_info_fields
     * 
     * fetches user_info table columns along with information
     * @access public
     * @param $table
     * @return fields array
     * @author priyank jain
     * 
     */
	function read_user_info_fields($table)
	{
		$fields = $this->db->field_data($table);
		array_shift($fields);
                
		return $fields;
		
                
		/*echo "<pre>";print_r($fields);
		exit;*/
		
	}
	
	
	function change_password($table,$data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update($table,$data);
		
		if($this->db->affected_rows() == 1)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
}
