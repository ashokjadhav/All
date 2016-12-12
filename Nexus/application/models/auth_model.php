<?php

class Auth_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	 
	function __Construct()
    {
        parent::__Construct();
    }
	
	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function setUserSession($row=NULL)
	 {
	 	
		 //print_r($row); exit();

		$values = array('user_id'=>$row->user_id,'logged_in'=>TRUE,'username'=>$row->user_name);
		$this->session->set_userdata($values);
		//print_r($this->session->all_userdata()); exit();
	 }//End of setUserSession Function
	 
	 
	 
	 
	  function setUserCookie($name='',$value ='',$expire = '',$domain='',$path = '/',$prefix ='')
	 {
	 		 $cookie = array(
                   'name'   =>$name,
                   'value'  => $value,
                   'expire' => $expire,
                   'domain' => $domain,
                   'path'   => $path,
                   'prefix' => $prefix,
               );
			   set_cookie($cookie); 
	 }//End of setUserCookie Function	

		
		
	 function getUserCookie($name='')
	 {
		 $val=get_cookie($name,TRUE); 
		return $val;
	 }//End of getUserCookie Function		
	 
 
	  function clearUserCookie($name=array())
	 {
	 	foreach($name as $val)
		{
			delete_cookie($val);
		}	
	 }//End of clearSession Function*/
	 

	// --------------------------------------------------------------------
		
	/**
	 * clearUserSession
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function clearUserSession()
	 {
	 	$array_items = array('user_id' => '','logged_in'=>'');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();  // sh
		
		
	 }//End of clearSession Function
	 
}
// End Auth_model Class
   
/* End of file Auth_model.php */ 
/* Location: ./app/models/Auth_model.php */