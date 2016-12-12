<?php
/**
 * Return an array of timezones
 * 
 * @return array
 */
function timezoneList()
{
    $timezoneIdentifiers = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));
    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);
        $title = explode('/', $timezoneIdentifier,2);
        
        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier,
            'title' => $title[1]
        );
    }
    /*echo '<pre>';
    print_r($tempTimezones);
    exit;*/
    // Sort the array by offset,identifier ascending
    usort($tempTimezones, function($a, $b) {
		return ($a['offset'] == $b['offset'])
			? strcmp($a['identifier'], $b['identifier'])
			: $a['offset'] - $b['offset'];
    });

	$timezoneList = array();
    foreach ($tempTimezones as $tz) {
		$sign = ($tz['offset'] > 0) ? '+' : '-';
		$offset = gmdate('H:i', abs($tz['offset']));
        $timezoneList[$tz['identifier']] = '(UTC ' . $sign . $offset . ') ' .
			$tz['title'];
    }

    return $timezoneList;
}
if(isset($_GET['timezone'])){
	$timezone = $_GET['timezone'];
	$UTC = new DateTimeZone("UTC");
    $newdate = new DateTime();
    $newTZ = new DateTimeZone($timezone);
    print_r($newdate);
	$newdate->setTimezone($newTZ);
    $date = $newdate->format('m/d/Y');
    $time = $newdate->format('h.i A');?>
    <ul>
		<li><?php echo $date;?></li>
		<li><?php echo $time;?></li>
	</ul>
<?php 
}

$timezoneList = timezoneList();
/*echo '<pre>';
print_r();
exit;*/
$first1 = explode('/',key($timezoneList),2);
echo '<select name="timezone" id="timezone">';
echo '<option disabled>' . $first1[0] . '</option>';
foreach ($timezoneList as $value => $label) {
    $first2 = explode('/',$value,2);
    if($first2[0] != $first1[0]){
        echo '<option disabled>' . $first2[0] . '</option>';
        $first1[0] = $first2[0];
    }
    if($_GET['timezone'] == $value){
        $selected =  'selected';
    }else{
        $selected = '';
    }
   echo '<option value="' . $value . '" '.$selected.' >' . $label . '</option>';
}
	echo '</select>';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#timezone').change(function(){
		//alert(this.value);
		window.location.href = 'http://stage.alpp.org/timezone.php?timezone='+this.value;
	});
});
</script>