<?php

function jsLog($message){
    echo "<script>console.log(`" . addslashes($message) . "`);</script>";
}


?>
