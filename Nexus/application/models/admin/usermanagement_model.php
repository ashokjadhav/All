<?php

class Usermanagement_model extends CI_Model {

    public $table = 'subuser';
    public $table1 = 'role';

    /**
     * To insert data in  homeData table
     * @access public
     * @param Integer
     * @return Array
     */
    public function add($insertData) {
        if ($this->db->insert($this->table, $insertData))
//            echo $this->db->last_query();
            return TRUE;
    }

    /* query to get page from staticPage table
     * @access public
     * @param Integer
     * @return Array
     */

    public function get_userrecord($id = 0) {

        if ($id !== 0){
            $this->db->select('subuser.id,subuser.username,subuser.password,subuser.role_id,role.role,role.privileges');
            $this->db->where('subuser.id', $id);
            $this->db->join('role','role.id = subuser.role_id');
            $query = $this->db->get($this->table);

        }
        else
        {
             $query = $this->db->get($this->table);
        }

             return $query->result_array();

    }

    /* query to get single or multiple rows based on parameter
     * @access public
     * @param Integer
     * @return Array
     */

    public function get($id = 0) {
			$this->db->select($this->table.'.*,'.$this->table1.'.role,employees.name');
			$this->db->from($this->table);
			$this->db->join($this->table1, $this->table.'.role_id='.$this->table1.'.id', 'left');
			$this->db->join('employees', $this->table.'.employee_id = employees.id', 'left');
			//$this->db->where($this->table.'.id',$id);
			$query = $this->db->get();

        return $query->result_array();
    }

    /* query to get single or multiple rows based on parameter at admin side
     * @access public
     * @param Integer
     * @return Array
     */

//    public function get_admin($id = 0) {
//
//        if ($id !== 0)
//            $query = $this->db->where('id', $id)->get($this->table);
//        else
//            $query = $this->db->order_by('id', 'DESC')->get($this->table);
//
//        return $query->result_array();
//    }

    /**
     * update  detailss
     * @access public
     * @param Array
     * @return Boolean
     */
    public function update($id, $updateData) {
        if ($this->db->update($this->table, $updateData, array('id' => $id)))
        //echo $this->db->last_query(); die;
            return TRUE;
    }

    /**
     * update_role  detailss
     * @access public
     * @param Array
     * @return Boolean
     */
    public function update_role($id, $updateData) {
        if ($this->db->update($this->table1, $updateData, array('id' => $id)))
        //echo $this->db->last_query(); die;
            return TRUE;
    }

    /* query to get meta content from staticPage and metaTags table
     * @access public
     * @param Integer
     * @return Array
     */

    function meta_content($page=0) {
        $this->db->select('*');
        $this->db->join('staticPage', 'metaTags.staticPageId=staticPage.id', 'left');
        $this->db->where('staticPage.page', $page);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

     /* query to get single or multiple rows based on parameter
     * @access public
     * @param Integer
     * @return Array
     */

    public function getController($id = 0) {

        if ($id !== 0)
            $query = $this->db->where('id', $id)->get('controllers');
        else
            $query = $this->db->order_by('id', 'DESC')->get('controllers');

        return $query->result_array();
    }


    /**
     * To insert role in  role table
     * @access public
     * @param Integer
     * @return Array
     */
    public function add_roles($insertData) {
        if ($this->db->insert($this->table1, $insertData))
//            echo $this->db->last_query();
            return TRUE;
    }

    /* query to get roles based on parameter
     * @access public
     * @param Integer
     * @return Array
     */

    public function get_role($id = 0) {

        if ($id !== 0)
            $query = $this->db->where('id', $id)->get($this->table1);
        else
            $query = $this->db->order_by('id', 'DESC')->get($this->table1);

        return $query->result_array();
    }
/**
     * To Fetch  userid in from employees table
     * @access public
     * @param $name
     * @return Array
     */


	public function get_emp_id($name) {
		$query = $this->db->select('id')->where('name',$name)->get('employees');

        return $query->result_array();
    }





	 public function get_user_role($id) {
			$this->db->select($this->table.'.*,'.$this->table1.'.role,employees.name');
			$this->db->from($this->table);
			$this->db->join($this->table1, $this->table.'.role_id='.$this->table1.'.id', 'left');
			$this->db->join('employees', $this->table.'.employee_id = employees.id', 'left');
			$this->db->where($this->table.'.id',$id);
			$query = $this->db->get();
			//echo $this->db->last_query();
			//exit;
			return $query->result_array();
    }


    /**
     * delete row query
     * @access public
     * @param Integer
     * @return Boolean
     */
    public function delete($id) {
        if ($this->db->where('id', $id)->delete($this->table))
            return TRUE;
        else
            return FALSE;
    }

     /**
     * delete row query
     * @access public
     * @param Integer
     * @return Boolean
     */
    public function deleterole($id) {
        if ($this->db->where('id', $id)->delete($this->table1))
            return TRUE;
        else
            return FALSE;
    }

 function set_role($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE role SET status='1' WHERE id='$iNewfeedId'");


  }
  function unset_role($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE role SET status='0' WHERE id='$iNewfeedId'");

  }

}