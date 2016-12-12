<?php
/**
 * category_model Class
 *
 * @author Ashok Jadhav
 * @package CI_category_model
 * @subpackage Model
 *
 */

class category_model extends CI_Model{

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
   * save_categorydetails
   *
   * This is used to save category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_categorydetails($arrData,$category){

    if($this->db->insert('category', $arrData)){

	$this->db->query("CREATE TABLE IF NOT EXISTS $category(
	  id int(11) NOT NULL AUTO_INCREMENT,
	  name varchar(200) NOT NULL,
	  sub_category varchar(300) NOT NULL,
	  author varchar(200) NOT NULL,
	  publisher varchar(200) NOT NULL,
	  price varchar(200) NOT NULL,
	  dop date NOT NULL,
	  code varchar(200) NOT NULL,
	  status int(1) NOT NULL,
	  borrow_status varchar(200) NOT NULL,
	  user_id int(200) NOT NULL,
	  created_date datetime NOT NULL,
	  modified_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  PRIMARY KEY (id))");
      return true;
    }else{
      return false;
    }

  }

    /**
   * get_category_details
   *
   * This is used to fetches category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
  function get_category_details($newsfeedId = 0){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }

    $this->db->select('*');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

  /**
   * update_category
   *
   * This is used to update category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_category($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('category', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

 /**
   * multi_delete_category
   *
   * This is used to delete multiple category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_category($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('category'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * set_category
   *
   * This is used to publish category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_category($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE category SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_category($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE category SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_category
   *
   * This is used to delete category details
   *
   * @author  Ashok Jadhav
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
  function delete_category($iNewfeedId,$name){
    $name = explode(' ',$name);
	$name = implode('_',$name);

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('category', array('id' => $iNewfeedId)))
    {	$q= $this->db->query("DROP TABLE $name");
		$q1= $this->db->query("DELETE from subcategory where category ='$name'");

        return true;
    }
    else
    {
        return false;
    }
  }

  function get_category_name(){

    $arrData = array();

    $this->db->select('name');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get('category');

    //$this->db->last_query();

    return $objQuery->result_array();

  }

}

?>