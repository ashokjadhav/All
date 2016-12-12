<?php
/* set here a limit of downloading rate (e.g. 10.20 Kb/s) */
$download_rate = 10.20;
 
$download_file = 'download-file.zip';  
$target_file = 'target-file.zip';
 
if(file_exists($download_file)){
    /* headers */
    header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
    header('Cache-control: private');
    header('Content-Type: application/octet-stream');
    header('Content-Length: '.filesize($download_file));
    header('Content-Disposition: filename='.$target_file);
 
    /* flush content */
    flush();
 
    /* open file */
    $fh = @fopen($download_file, 'r');
    while(!feof($fh)){
        /* send only current part of the file to browser */
        print fread($fh, round($download_rate * 1024));
        /* flush the content to the browser */
        flush();
        /* sleep for 1 sec */
        sleep(1);
    }
    /* close file */
    @fclose($fh);
}else{
    die('Fatal error: the '.$download_file.' file does not exist!');
}
?>