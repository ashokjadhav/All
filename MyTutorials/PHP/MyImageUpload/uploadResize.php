<?php

$temp_dir = $_SERVER['DOCUMENT_ROOT'] . 'images'; 
$dest_dir = $_SERVER['DOCUMENT_ROOT'] . 'Resize'; 

$file_name = $_FILES['the_file']['name']; 


if (move_uploaded_file($_FILES['name']['tmp_name'], $temp_dir . '/' . $file_name)) { 
      

   if(resize_img($temp_dir, $dest_dir, $file_name, 300)) {
         echo 'Image processed and saved.';
         // add your database code here
   } else {
         echo 'Cannot process image.';
   }
  
   // here we remove uploaded file that have been moved to temp dir
   // image is already in final destination
   unlink($temp_dir . '/' . $file_name); 
   
} else { 
      
   echo 'Cannot upload file.'; 
} 

function resize_img($dir_in, $dir_out, $imedat='defaultname.jpg', $max=250) {

   $img = $dir_in . '/' . $imedat;
   $extension = array_pop(explode('.', $imedat));

   switch ($extension){
   
         case 'jpg':
         case 'jpeg':
         $image = ImageCreateFromJPEG($img);
         break;
               
         case 'png':
         $image = ImageCreateFromPNG($img);
         break;
               
         default:
         $image = false;
   }


if(!$image){
      // not valid img stop processing
      return false; 
}

 $vis = imagesy($image);
 $sir = imagesx($image);

  if(($vis < $max) && ($sir < $max)) {
     $nvis=$vis; $nsir=$sir;
  } else {
    if($vis > $sir) { $nvis=$max; $nsir=($sir*$max)/$vis;}
    elseif($vis < $sir) { $nvis=($max*$vis)/$sir; $nsir=$max;}
    else { $nvis=$max; $nsir=$max;}
  }

      $out = ImageCreateTrueColor($nsir,$nvis);
      ImageCopyResampled($out, $image, 0, 0, 0, 0, $nsir, $nvis, $sir, $vis);

   switch ($extension){
   
         case 'jpg':
         case 'jpeg':
         imageinterlace($out ,1);
         ImageJPEG($out, $dir_out . '/' . $imedat, 75);
         break;
               
         case 'png':
         ImagePNG($out, $dir_out . '/' . $imedat);
         break;
               
         default:
         $out = false;
   }
   
   if(!$out){
         return false;
   }
   
ImageDestroy($image);
ImageDestroy($out);

return true;
} 


?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit"/>
</form>