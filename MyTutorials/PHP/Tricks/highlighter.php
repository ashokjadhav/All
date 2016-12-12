<?php
function highlight($str, $words){
    if(!is_array($words) || empty($words) || !is_string($str)){
        return false;
    }
	$arr_words = implode('|', $words);
    return preg_replace('@\b('.$arr_words.')\b@si','<strong style="background-color:yellow">$1</strong>',$str);
}
echo highlight("Good Morning Brother","Brother");
?>