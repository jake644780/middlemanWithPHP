<?php
session_start();



require("../../grasPHP.php");


$home = "../home.php";
$sPATH = "";
$aPATH = "../auth/";
$shopHome = $sPATH . "shopHome.php";
$search = $sPATH . "browseItems.php";
$cart = $sPATH . "cart.php";
$logout = $aPATH . "logout.php";
$profile = $aPATH . "profile.php";
$login = $aPATH . "login.php";
$signup = $aPATH . "signup.php";
require("../components/navbar.php");

$selectProduct = $conn->query(QselectAllBy("products", "id", $_GET["itemid"]));

if ($selectProduct->num_rows == 0) {
    jsLog("sorry, no product with this name");
} else {
    while ($row = $selectProduct->fetch_assoc()) {

        echo "id: " . $row["id"];
        echo "<br>";
        echo "name: " . $row["name"];
        echo "<br>";
        echo "price: " . $row["price"];
        echo "<br>";
        echo "stock: " . $row["stock"];
        echo "<br>";
        echo "description: " . $row["description"];
        echo "<br>";
        echo "<br>";



        $selectAllImages = $conn->query(QselectAllBy("images", "parentid", $row["id"]));

        if ($selectAllImages->num_rows > 0) {
            while ($row2 = $selectAllImages->fetch_assoc()) {
                echo '<img src="';
                echo $row2["path"];
                echo '">';
                echo "<br>";
            }
        }
    }
}
