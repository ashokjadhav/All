<?php
//echo "here";exit;
$time = time();

//echo $_SERVER['DOCUMENT_ROOT'];exit;
//$url = '../../uploads/'.$time."_".$_FILES['upload']['name'];

//$url = $baseURL.'design/ckeditor/uploads/'.$time."_".$_FILES['upload']['name'];
$url = 'localhost/ashok/Nexus_Live_bkp_15Dec2015/nexus/design/ckeditor/uploads/'.$time."_".$_FILES['upload']['name'];

$furl = 'http'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$fdata = explode('ckupload.php',$furl);
print_r($fdata);
 //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }
    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }
    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
    {
       $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
    }
    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";
	     echo $url;
	  //echo "<pre>";print_r($fdata);
	  //exit;	
      $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
      //$url = $fdata[0]."uploads/" . $time."_".$_FILES['upload']['name'];
      $url = $fdata[0]."uploads/" . $time."_".$_FILES['upload']['name'];
    }
 
$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
?>