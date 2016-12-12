
<?php 
$dirname = getcwd()."/images/";
$images = glob($dirname.'*.jpg');
/*print_r($images);
exit;*/
foreach($images as $image) {
  $image = explode('images',$image);
echo '<img src="images'.$image[1].'" /><br />';
}
?>