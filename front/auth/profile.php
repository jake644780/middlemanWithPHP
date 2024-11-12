<?php

session_start();

require("../../grasPHP.php");

$sessionUserRESULT = $conn->query(QselectAllByid("users",$_SESSION['id']));

require("../../front/components/navbar.php");

if ($sessionUserRESULT->num_rows > 0) {
    while ($rows = $sessionUserRESULT->fetch_assoc()) {
        echo $rows["username"];
        echo "<br>";
        echo $rows["email"];
    }
}

?>


<style>
    body {
        margin: 2px;
    }
</style>