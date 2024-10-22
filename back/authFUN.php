<?php

/*  
    passVal returns an array or 1 depending on the password's value
    the array holds 3 bool expressions:
    length between 8 and 40
    there must be atleast 1 capital letter
    there must be atleast 1 number                
*/

function passVal($password) {
    $len = strlen($password) >= 8 && strlen($password) <= 40 ? 1 : 0;
    $cap = preg_match('/[A-Z]/', $password) ? 1 : 0;
    $num = preg_match('/[0-9]/', $password) ? 1 : 0;

    if ($len == $cap && $len == $num && $len == 1) return 1;
    return [$len, $cap, $num];
}

function passProbsToStr($errors){
    
    $passwordError = "password match these expectations:\n";
    $i = 0;
    if ($errors[$i] == 0) $passwordError .= "\tmust have a length between 8 and 40\n";
    $i++; 
    if ($errors[$i] == 0) $passwordError .= "\tmust have atleast 1 capital letter\n";
    $i++;
    if ($errors[$i] == 0) $passwordError .= "\tmust have atleast 1 numerical";
    return $passwordError;
}

?>
