<?php

/**
 * Return an array of timezones
 * 
 * @return array
 */
function timezoneList()
{
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));

    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);

        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier
        );
    }

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
            $tz['identifier'];
    }

    return $timezoneList;
}
$newdate = new DateTime();
$timezoneList = timezoneList();
foreach ($timezoneList as $key => $value) {
    $newTZ = new DateTimeZone($key);
    $newdate->setTimezone($newTZ);
    $date = $newdate->format('m/d/Y');
    $time = $newdate->format('h.i A');?>
    <ul>
        <li><?php echo $key ?>
        <li><?php echo $value; ?>
        <li><?php echo $date;?></li>
        <li><?php echo $time;?></li>
    </ul>

<?php }
/*echo '<pre>';
print_r(timezoneList());*/
?>