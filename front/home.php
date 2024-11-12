<html>

<head>
    <title>middleman</title>
</head>

<body>

    <?php

    session_start();

    require("../grasPHP.php");


//home, shophome, search, cart, logout, profile, login, signup

    $home = "#";
    $sPATH = "shop/";
    $aPATH = "auth/";
    $shopHome = $sPATH . "shopHome.php";
    $search = $sPATH . "browseItems.php";
    $cart = $sPATH . "cart.php";
    $logout = $aPATH . "logout.php";
    $profile = $aPATH . "profile.php";
    $login = $aPATH . "login.php";
    $signup = $aPATH . "signup.php";

    require("components/navbar.php");

    ?>



</body>
<style>
    body {
        margin: 2px;
    }
</style>
<?php

sessionCheck();
?>


</html>