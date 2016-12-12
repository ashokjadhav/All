<?php          
function makeMyUrlFriendly($url){
    $output = preg_replace("/\s+/" , "_" , trim($url));
    $output = preg_replace("/\W+/" , "" , $output);
    $output = preg_replace("/_/" , "-" , $output);
    return strtolower($output);
}
?>