<?php

function checkPass($password) {
    $len = strlen($password) >= 8 && strlen($password) <= 40 ? 1 : 0;
    $cap = preg_match('/[A-Z]/', $password) ? 1 : 0;
    $num = preg_match('/[0-9]/', $password) ? 1 : 0;
    if ($len == $cap && $len == $num && $len == 1) return 1;
    return [$len, $cap, $num];
}

function getPassErrs($errors){ //FIX THIS WITH JSLOGGING!!!!!!
    $passwordError = "password has to match these expectations:\n";
    $expectations = ["must have a length between 8 and 40","must have atleast 1 capital letter","must have atleast 1 numerical"];
    for ($i = 0; $i < count($expectations); $i++) if ($errors[$i] == 0) $passwordError .= $i + 1 . "." . $expectations[$i];
    return $passwordError;
    
}

?>