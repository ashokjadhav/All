<?php
//Sometimes you need to generate passwords for customers automatically when a new account is created. This code allows you choose the desired length and strength for the password and it is very flexible. 
function GeneratePassword($length=8, $strength=0){
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if($strength >= 1) $consonants .= 'BDGHJLMNPQRSTVWXZ';
    if($strength >= 2) $vowels .= 'AEUY';
    if($strength >= 3) $consonants .= '12345';
    if($strength >= 4) $consonants .= '67890';
    if($strength >= 5) $vowels .= '@#$%';
 
    $password = '';
    $alt = time() % 2;
    for($i = 0; $i < $length; $i++){
        if($alt == 1){
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        }else{
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}
echo GeneratePassword(8,5);
?>