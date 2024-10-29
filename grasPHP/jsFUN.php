<?php

$conn = new mysqli("localhost", "root", "", "middlemanwithphp"); 


function jsLog($message){
    echo "<script>console.log(`" . addslashes($message) . "`);</script>";
}



?>
