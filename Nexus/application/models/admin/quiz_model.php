<?php
/**
 *
 * This is category Model
 *
 * @author    zchngs
 * @package   Safe Doc
 * @subpackage  Model
 */

class Quiz_model extends CI_Model{

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
   * get_resource_management_details
   *
   * This is used to fetches resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_questions_details($newsfeedId,$table){

    $arrData = array();
    if($newsfeedId != 0 ){
      $this->db->where('elearning_quiz.id', $newsfeedId);
    }

    $this->db->select('elearning_quiz.*,elearning_category.name');
  $this->db->from('elearning_quiz');
  $this->db->join('elearning_category','elearning_category.id=elearning_quiz.categoryid','full outer');

	$this->db->where('categoryid',$table);
    $this->db->order_by('elearning_quiz.id','ASC');

    $objQuery = $this->db->get();

    //$this->db->last_query();

    return $objQuery->result_array();

  }

/**
   * save_questionsdetails
   *
   * This is used to save client details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_questionsdetails($arrData){

    if($this->db->insert('elearning_quiz', $arrData)){
	return true;}
	else{
	return false;}


  }
/**
   * update_resource_management
   *
   * This is used to update resource_management details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_questions($iNewfeedId,$table,$arrData){
    $table=$table;
    $this->db->where('id',$iNewfeedId);
	$this->db->where('categoryid',$table);
	if($this->db->update('elearning_quiz', $arrData))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * delete_questions
   *
   * This is used to delete Question details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_questions($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('elearning_quiz', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * save_clientdetails
   *
   * This is used to save client details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData
   * @return boolean
   */
  function save_subcategorydetails($arrData){

    if($this->db->insert('quiz_subcategory', $arrData)){
	return true;}
	else{
	return false;}


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
  function get_subcategory_details($newsfeedId = 0,$table=''){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('quiz_subcategory.id', $newsfeedId);
    }
    if($table != '' ){
      $this->db->where('quiz_subcategory.categoryid', $table);
    }

$this->db->select('quiz_subcategory.*,elearning_category.name');
  $this->db->from('quiz_subcategory');
  $this->db->join('elearning_category','elearning_category.id=quiz_subcategory.categoryid','full outer');

    $this->db->order_by('quiz_subcategory.id','DESC');
    $objQuery = $this->db->get();

    //echo $this->db->last_query();exit;

    return $objQuery->result_array();

  }

  /**
   * update_category
   *
   * This is used to update category details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arrData, integer-$iNewfeedId
   * @return boolean
   */
  function update_subcategory($iNewfeedId,$arrData){

    $this->db->where('id',$iNewfeedId);
    if($this->db->update('quiz_subcategory', $arrData))
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
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_subcategory($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('quiz_subcategory'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
  /**
   * multi_delete_questions
   *
   * This is used to delete multiple category details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_questions($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_quiz'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  /**
   * multi_delete_questions
   *
   * This is used to delete multiple category details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_scoresdetails($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('quiz_scores'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   /**
   * multi_delete_questions
   *
   * This is used to delete multiple category details
   *
   * @author  zchngs
   * @access  public
   * @param   array-$arriNewfeedId
   * @return void
   */
  function multi_delete_timesdetails($arriNewfeedId){

    $this->db->where_in('id', $arriNewfeedId);
    if($this->db->delete('elearning_spenttime'))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
     /**
   * delete_client
   *
   * This is used to delete client details
   *
   * @author  zchngs
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE quiz_subcategory SET status='1' WHERE id='$iNewfeedId'");

  }
   function unset_subcategory($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE quiz_subcategory SET status='0' WHERE id='$iNewfeedId'");
  }

   /**
   * delete_client
   *
   * This is used to delete client details
   *
   * @author  zchngs
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function delete_subcategory($iNewfeedId){

    // $this->db->where('jobopenings_id',$iNewfeedId);
    if($this->db->delete('quiz_subcategory', array('id' => $iNewfeedId)))
    {
        return true;
    }
    else
    {
        return false;
    }
  }
   function set_question($iNewfeedId,$table){

    // $this->db->where('resource_management_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_quiz SET status='1' WHERE id='$iNewfeedId' AND category='$table'");

  }
   function unset_question($iNewfeedId,$table){

    // $this->db->where('resource_management_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_quiz SET status='0' WHERE id='$iNewfeedId' AND category='$table'");
  }
  /**
   * get_scores_details
   *
   * This is used to fetches scores details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_scores_details($newsfeedId = 0,$table=''){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }
	 if($table != '' ){
      $this->db->where('categoryid', $table);
    }

    $this->db->select('quiz_scores.*,employees.emp_id as emp_id,employees.department as department,employees.designation as designation,employees.name as name');

     $this->db->from('quiz_scores');
	$this->db->join('employees','employees.id=quiz_scores.user_id','full outer');
  //$this->db->join('elearning_category','elearning_category.id=quiz_scores.categoryid','full outer');
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get();

	return $objQuery->result_array();
    //echo $this->db->last_query();exit;





  }
   /**
   * get_time_details
   *
   * This is used to fetches scores details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_time_details($newsfeedId = 0,$table){

    $arrData = array();

    if($newsfeedId != 0 ){
      $this->db->where('id', $newsfeedId);
    }


    $this->db->select('elearning_spenttime.*,employees.emp_id as emp_id,employees.department as department,employees.designation as designation,employees.name as name,employees.floor as floor,employees.email as email');

     $this->db->from('elearning_spenttime');
	$this->db->join('employees','employees.id=elearning_spenttime.user_id','full outer');
    $this->db->where('user_id',$table);
    $this->db->order_by('id','DESC');

    $objQuery = $this->db->get();

	return $objQuery->result_array();
    //echo $this->db->last_query();exit;





  }
   /**
   * get_time_details
   *
   * This is used to fetches scores details
   *
   * @author  zchngs
   * @access  public
   * @param   integer-$iNewfeedId
   * @return array
   */
  function get_allemployees(){

    $arrData = array();
    $this->db->select('id,name');
    $this->db->order_by('name','ASC');

    $objQuery = $this->db->get('employees');

	return $objQuery->result_array();
    //echo $this->db->last_query();exit;





  }
    /**
   * set_category
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_elearningtime($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE elearning_spenttime SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_elearningtime($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE elearning_spenttime SET status='0' WHERE id='$iNewfeedId'");
  }
 /**
   * set_category
   *
   * This is used to publish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return boolean
   */
  function set_quiz_score($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
    $query=$this->db->query("UPDATE quiz_scores SET status='1' WHERE id='$iNewfeedId'");

  }
     /**
   * unset_category
   *
   * This is used to unpublish category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  integer-$iNewfeedId
   * @return status
   */
   function unset_quiz_score($iNewfeedId){

    // $this->db->where('category_id',$iNewfeedId);
     $query=$this->db->query("UPDATE quiz_scores SET status='0' WHERE id='$iNewfeedId'");
  }

	function get_elearningtime_details($id){


		$this->db->select('*');
		$this->db->where('user_id',$id);
        $this->db->where('status','1');
		$objQuery = $this->db->get('elearning_spenttime');
		if($objQuery->num_rows>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
	}

}

?>