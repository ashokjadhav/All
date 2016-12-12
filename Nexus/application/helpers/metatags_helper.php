<?php 
function check_priviledges(){
  $CI = & get_instance();
  $priviledges = $CI->session->userdata('privileges');
  if($priviledges == 'All')
    return true;
  else{
    $method = $CI->uri->segment(3);
    $controller = $CI->uri->segment(2);
    if($controller == 'location_master'){ $controller = 'company_location';}
    if(isset($priviledges[$controller])){
      switch ($method){
        case '':
                    if(is_array($priviledges[$controller]) &&  in_array(0,$priviledges[$controller]))
                    {
                      return true;  
                    }
				case 'index':
                    
                    if(is_array($priviledges[$controller]) &&  in_array(0,$priviledges[$controller]))
                    {
                      return true;  
                    }
				case 'add':
                    
                    if(is_array($priviledges[$controller]) &&  in_array(1,$priviledges[$controller]))
                    {
                      return true;  
                    }
        case 'edit':
                     if(is_array($priviledges[$controller]) &&  in_array(2,$priviledges[$controller]))
                    {
                      return true;  
                    }
        case 'delete':
                     if(is_array($priviledges[$controller]) &&  in_array(3,$priviledges[$controller]))
                    {
                      return true;  
                    }
        default : return false;
      }
    }else if($controller == 'dashboard')
            return TRUE;
          else
            return false;
  }
}
?>