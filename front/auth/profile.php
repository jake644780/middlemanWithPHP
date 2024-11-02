<?php

session_start();

$extPATH = "../../grasPHP/";
require("../../connect.php");
require($extPATH . "smartReqFUN.php");
requireALL($extPATH);

$sessionUserRESULT = $conn->query(QselectAllByID($_SESSION['id']));

if ($sessionUserRESULT->num_rows > 0){
    while ($rows = $sessionUserRESULT->fetch_assoc()){
        echo $rows["username"];
        echo "<br>";
        echo $rows["email"];
        
    }
}

?>