<?php


function passVal($password) {
    $len = strlen($password) >= 8 && strlen($password) <= 40 ? 1 : 0;
    $cap = preg_match('/[A-Z]/', $password) ? 1 : 0;
    $num = preg_match('/[0-9]/', $password) ? 1 : 0;

    if ($len == $cap && $len == $num && $len == 1) return 1;
    return [$len, $cap, $num];
}


?>
