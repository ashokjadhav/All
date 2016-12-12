<?php
/*
* 	   Simple file Upload system with PHP.
* 	   Created By Tech Stream
* 	   Original Source at http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP
*      This program is free software; you can redistribute it and/or modify
*      it under the terms of the GNU General Public License as published by
*      the Free Software Foundation; either version 2 of the License, or
*      (at your option) any later version.
*      
*      This program is distributed in the hope that it will be useful,
*      but WITHOUT ANY WARRANTY; without even the implied warranty of
*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*      GNU General Public License for more details.
*     
*/
function resize_img($dir_in, $dir_out, $imedat='defaultname.jpg', $max=500,$new) {

   $img = $dir_in . '/' . $imedat;
   $extension = array_pop(explode('.', $imedat));
   $fileExt = strtolower(end(explode('.',$imedat)));
    $imedat = $new.$fileExt;
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



	if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$file_type=$_FILES['image']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		
		$expensions= array("jpeg","jpg","png"); 		
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 2097152){
		$errors[]='File size must be excately 2 MB';
		}				
		if(empty($errors)==true){
      $file_name = md5("Image").'.'.$file_ext;
			move_uploaded_file($file_tmp,"images/".$file_name);
      resize_img('images','images', $file_name, 300,md5("Image").'_Generic.');
      resize_img('images','images', $file_name, 121,md5("Image").'_L.');
      resize_img('images','images', $file_name, 400,md5("Image").'_M.');
      resize_img('images','images', $file_name, 200,md5("Image").'_S.');
      resize_img('images','images', $file_name, 121,md5("Image").'_XL.');
      resize_img('images','images', $file_name, 100,md5("Image").'_XS.');
		}else{
			print_r($errors);
		}
	}

?>

<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit"/>
</form>