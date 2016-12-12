<?php

//Encodes the given data with MIME base64. Base64-encoded data takes about 33% more space than the original data. 
function base64url_encode($text){
    $base64 = base64_encode($text);
    $base64url = strtr($base64, '+/=', '-_,');
    return $base64url;
}
 
function base64url_decode($text){
    $base64url = strtr($text, '-_,', '+/=');
    $base64 = base64_decode($base64url);
    return $base64;
}
?>
