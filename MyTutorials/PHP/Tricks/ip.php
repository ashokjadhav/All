<?php
//Code for getting lat,long from ip//
  
  $ip = $_SERVER['REMOTE_ADDR'];
  //$ip = '103.224.241.11';
  $api_key = "03a01aad9b17a24a36e10196eb771ac3f85700c967da755d91028bce964b950c";
  $url = "http://api.ipinfodb.com/v3/ip-city/?key=".$api_key."&ip=".$ip."&format=json";
  function getJSON($url = null){
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }
  $locationInfo = json_decode(getJSON($url),true);
  $lat = $locationInfo['latitude'];
  $long = $locationInfo['longitude'];
  
  //End of code for getting lat,long from ip//
?>
<script type="text/javascript">
      var body = $('body');
      body.on('click','.findzip',function () {
        window.location.href = '/vr/front/set-location.php?lat=<?php echo $lat; ?>&long=<?php echo $long; ?>&page=<?php echo $page; ?>';
      });
    </script>