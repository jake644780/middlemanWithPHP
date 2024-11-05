<?php
$importPATH = "../../grasPHP/";
require($importPATH . "smartReqFUN.php");
requireALL($importPATH);
require("../../connect.php");
session_start();
sessionCheck();

printBackButton();

?>


<a href="addProduct.php"><button>add items</button></a>