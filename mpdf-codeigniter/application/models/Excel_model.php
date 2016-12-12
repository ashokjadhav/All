<?php

class Excel_model extends CI_Model{
  
/**
* @desc load both db
*/
function __construct(){
parent::__Construct();

}
  function getdata(){
     $this->db->select('*');
     $query = $this->db->get('student');
     return $query->result_array();
  }

}