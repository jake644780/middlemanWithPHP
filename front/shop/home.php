<?php
     $importPATH = "../../grasPHP/";
     require($importPATH . "smartReqFUN.php");
     requireALL($importPATH);
     require("../../connect.php");
     session_start();
     sessionCheck();
 
     printBackButton();

?>


<a href="addItems.php"><button>add items</button></a>
