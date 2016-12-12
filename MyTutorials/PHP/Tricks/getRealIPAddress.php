<?php     
//This function to get IP address   


function getRemoteIPAddress(){
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    return $ip;
}
 
/* If your visitor comes from proxy server you have use another function
to get a real IP address: */
function getRealIPAddress(){   
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
echo 'Remote IP:'.getRemoteIPAddress();
echo '<pre>';
echo 'Real IP :'.getRealIPAddress();
?>
