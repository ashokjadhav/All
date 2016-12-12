<?php
/**
 * Elearning_model Class
 *
 * @author Ashok Jadhav
 * @package CI_Elearning_model
 * @subpackage Model
 *
 */

class Elearning_model extends CI_Model{

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

/**  * verifyEmploy
     * check employees login
     *
     * retrieve data
     * @access public
     * @param $u,$pw
     * @return array
     * @author Ashok Jadhav
     *
     */
	function verifyEmploy($u,$pw){

		// Set the Select parameter to return adminID and adminName column values of admin table
		$this->db->select('id,name,password,username');

		// Sets the where constraint to fetch the record having adminName as the username ($u) passed by the user
		$this->db->where('username',$u);
		$this->db->where('username',$this->session->userdata('site_user'));
		// Sets the where constraint to fetch the record having adminPassword as the password ($pw) passed by the user. The password is encrypted using MD5 algorithm and is saved in the database in the encrypted format
		//$this->db->where('adminUserPassword',MD5($pw));

		$this->db->where('password',$pw);

		// Sets the limit constraint to fetch 1 record
		$this->db->limit(1);

		// Fetch record from the admin table
		$Q = $this->db->get('employees');
  //echo $this->db->last_query();exit;
		// Count if there are any rows returned
		if ($Q->num_rows() > 0){
			// Return the result in the form of an array
			$row = $Q->row_array();

			// This allows the user with correct login details to log into the site and a session is set
			date_default_timezone_set("Asia/Kolkata");
			$login_user = array("elname" => $row['name'], "eluser"=>$row['username'],"eluserid"=>$row['id'],"logintime"=>date('Y-m-d H:i:s'),"ellogin"=>TRUE);
			//var_dump($login_user);exit;
			$this->session->set_userdata($login_user);
		}else{

			// This will give an error message to the user for incorrect login or password details.
			$login_user = array("elname" => "" ,"eluser"=>"","eluserid"=>0,"logintime"=>0,"ellogin"=>FALSE);
			$this->session->set_userdata($login_user);
			$this->session->set_flashdata('error', 'Sorry, your username or password is incorrect!');
		}
	}
/**
	 * forgot_password
	 *
	 * This function sends user an email with a url to change his password
	 *
	 * @param string
	 * @return boolean
	 */
	public function forgot_password($email)
	{
		$this->db->where('email',$email);
		$q = $this->db->get('employees');
		if($q->num_rows == 0){
			return false;
		}
		else{
			$token = md5(uniqid(rand(), true));
			$update_flag = $this->db->update('employees', array('token' => $token));
			if($update_flag){
				$this->db->where('email',$email);
				$q = $this->db->get('employees');
				return $q->row_array();
			}
		}
	}


	/* check_token
	 *
	 * This function checks if the token is valid for a user.
	 *
	 * @param string
	 * @return boolean
	 */
	public function check_token($token)
	{
		$url = base64_decode(urldecode($token));
		$url_chunks = explode('/',$url);
		$this->db->where('id',$url_chunks['1']);
		$q = $this->db->get('employees');
		if($q->num_rows > 0){
			$result = $q->row_array();
			if($result['token']==$url_chunks['0'])
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	/**
	 * update_reset_password
	 *
	 * resets password for forgot pasword process
	 *
	 * @param array
	 * @return boolean
	 */
	public function update_reset_password($data)
	{
		$this->db->where('id', $data['user_id']);
		$update_flag = $this->db->update('employees', array('password' => md5($data['new_pwd']), 'token' => ''));
        if($update_flag)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

/**
   * get_category_details
   *
   * This is used to fetches category details
   *
   * @author  Ketan Sangani
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
	$this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_category');
	return $objQuery->result_array();

  }


  /**
   * get_articles_details
   *
   * This is used to fetches articles details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$category
   * @return array
   */
  function get_articles_details($category){

    $arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_articles');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
 }


  /**
   * get_slides_details
   *
   * This is used to fetches slides details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$category,$subcategory
   * @return array
   */
  function get_slides_details($category,$subcategory){
	$arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('sub_category',$subcategory);
	$this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_files');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
  }
   /**
   * get_summaries_details
   *
   * This is used to fetches book summeries details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $category,$subcategory
   * @return array
   */
	function get_summaries_details($category,$subcategory){
		$arrData = array();
		$this->db->select('*');
		$this->db->where('categoryid',$category);
		$this->db->where('sub_category',$subcategory);
		$this->db->where('status','1');
		$this->db->order_by('id','ASC');
		$objQuery = $this->db->get('elearning_summaries');
		if($objQuery->num_rows()>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
	}

   /**
   * get_videos_details
   *
   * This is used to fetches videos details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  $category,$subcategory
   * @return array
   */
  function get_videos_details($category,$subcategory){
	$arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('sub_category',$subcategory);
	$this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_videos');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
  }

 /**
   * get_category_details
   *
   * This is used to fetches category details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param  $category,$subcategory
   * @return array
   */
  function get_muststudysummaries_details($category,$subcategory){
	$arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('sub_category',$subcategory);
    $this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_summaries');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
  }

/**
   * get_muststudyslides_details
   *
   * This is used to fetches must study details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $category,$subcategory
   * @return array
   */
  function get_muststudyslides_details($category,$subcategory){
	$arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('sub_category',$subcategory);
    $this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_files');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
  }


  /**
   * get_mustvideos_details
   *
   * This is used to fetches videos under must study
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $category,$subcategory
   * @return array
   */
  function get_mustvideos_details($category,$subcategory){
	$arrData = array();
	$this->db->select('*');
    $this->db->where('categoryid',$category);
	$this->db->where('sub_category',$subcategory);
    $this->db->where('status','1');
    $this->db->order_by('id','ASC');
	$objQuery = $this->db->get('elearning_videos');
	if($objQuery->num_rows()>0){
		return $objQuery->result_array();
	}
	else{
		return false;
	}
  }


   /**
   * get_quizsub_categories_details
   *
   * This is used to fetches quiz subcategory  details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $category
   * @return array
   */
	function get_quizsub_categories_details($category){
		$arrData = array();
		$this->db->select('*');
		$this->db->where('categoryid',$category);
		$this->db->where('status','1');
		$this->db->order_by('id','ASC');
		$objQuery = $this->db->get('quiz_subcategory');
		if($objQuery->num_rows()>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
  }

   /**
   * get_questions
   *
   * This is used to fetches Quiz questions details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   integer-$newsfeedId
   * @return array
   */
	function get_questions($category){
		$arrData = array();
		$this->db->select('*');
		$this->db->where('sub_category',$category);
		$this->db->where('status','1');
		$this->db->order_by('id','RANDOM');
		$this->db->limit(20);
		$objQuery = $this->db->get('elearning_quiz');
		if($objQuery->num_rows()>0){
			return $objQuery->result_array();
		}
		else{
			return false;
		}
  }


	/**
     * readmorebook
     *
     * Get more description of Book
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function readmorebook($newsfeedId){
		$arrData = array();
		$query=$this->db->query("SELECT description FROM elearning_summaries WHERE id=$newsfeedId ");
		return $query->result_array();

	}


	/**
     * count_elearningtime
     *
     * Get Elearning total time
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function count_elearningtime($arrData){
		if($this->db->insert('elearning_spenttime', $arrData)){
			return true;
		}
		else{
			return false;
		}
	}


	/**
     *  Get datewise log of elearning spent time
     *
     * get_elearningtime
     * @access public
     * @param $newsfeedId
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function get_elearningtime($id){
		$date = date('Y-m-d');
        $this->db->where('user_id',$id);
		$this->db->where('login_date',$date);
		$q = $this->db->get('elearning_spenttime');
		if($q->num_rows > 0){
			return $q->result_array();
		}
		else{
			return false;
		}
	}

	/**
     *  This function will update daily elearning time(Not for First Time Login)
     *
     * get_elearningtime
     * @access public
     * @param $arrData,$id
     * @return boolean
     * @author Ashok Jadhav
     *
     */
	function update_elearningtime($arrData,$id){
		$date = date('Y-m-d');
		$this->db->where('user_id',$id);
		$this->db->where('login_date',$date);
		if($this->db->update('elearning_spenttime', $arrData)){
			return true;
		}else{
			return false;
		}
	}

	/**
     *  This function will get Elearning quiz final score for each category during particular login
     *
     * get_elearningtime
     * @access public
     * @param $datetime1,$datetime2
     * @return result array
     * @author Ashok Jadhav
     *
     */
	function get_elearningscore($datetime1,$datetime2){
		$id = $this->session->userdata('eluserid');
		$q= $this->db->query("SELECT * FROM quiz_scores WHERE (created_date >'$datetime1' AND								created_date < '$datetime2') AND user_id='$id'");
		if($q->num_rows > 0){
			return $q->result_array();
		}
		else{
			return false;
		}
	}
}


?>
