<?php
//This function returns the duration of the given time period in days, hours, minutes and seconds. For example: echo convertSecToStr('654321'); would return "7 days, 13 hours, 45 minutes, 21 seconds" 

function convertSecToStr($secs){
    $output = '';
    if($secs >= 86400) {
        $days = floor($secs/86400);
        $secs = $secs%86400;
        $output = $days.' day';
        if($days != 1) $output .= 's';
        if($secs > 0) $output .= ', ';
        }
    if($secs>=3600){
        $hours = floor($secs/3600);
        $secs = $secs%3600;
        $output .= $hours.' hour';
        if($hours != 1) $output .= 's';
        if($secs > 0) $output .= ', ';
        }
    if($secs>=60){
        $minutes = floor($secs/60);
        $secs = $secs%60;
        $output .= $minutes.' minute';
        if($minutes != 1) $output .= 's';
        if($secs > 0) $output .= ', ';
        }
    $output .= $secs.' second';
    if($secs != 1) $output .= 's';
    return $output;
}
echo convertSecToStr('1456987');
?>