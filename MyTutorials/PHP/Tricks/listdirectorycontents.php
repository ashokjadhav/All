<?php
//This code allows to list the contents of any given directory. 

function list_directory_content($dir){
    if(is_dir($dir)){
        if($handle = opendir($dir)){
            while(($file = readdir($handle)) !== false){
                if($file != '.' && $file != '..' && $file != '.htaccess'){
                    echo '<a target="_new" href="'.$dir.$file.'">'.$file.'</a><br>'."\n";
                }
            }
            closedir($handle);
        }
    }
}
?>
