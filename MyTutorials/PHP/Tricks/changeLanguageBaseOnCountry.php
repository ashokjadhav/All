<?php
 //This simple code demonstrates how to change automatically site language, according to the visitor's country. If you implement this script in your site it will open the page in the language of your visitor. 




// prepare reload to local version according by first visit        
session_start();            
$location_reload = isset($_SESSION["loc_reload"]) ? (bool)$_SESSION["loc_reload"] : false;
// prepare reload to local version according by first visit
if(!$location_reload){
    $location = visitor_location();
    if(in_array($location["country"], array("RU", "BY", "UA"))){
        $_SESSION["loc_reload"] = true;
        header("location: ru/index.php");
        exit;
    }else if(in_array($location["country"], array("IL"))){
        $_SESSION["loc_reload"] = true;
        header("location: he/index.php");
        exit;
    }        
}
 
function visitor_location(){
    $client  = @$_SERVER["HTTP_CLIENT_IP"];
    $forward = @$_SERVER["HTTP_X_FORWARDED_FOR"];
    $remote  = @$_SERVER["REMOTE_ADDR"];
    $result  = array("country"=>"", "city"=>"");
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
    if($ip_data && $ip_data->geoplugin_countryName != null){
        $result["country"] = $ip_data->geoplugin_countryCode;
        $result["city"] = $ip_data->geoplugin_city;
    }
    return $result;
}
?>