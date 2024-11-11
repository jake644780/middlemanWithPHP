<html>

<head>
    <title>middleman</title>
</head>

<body>

    <?php

    session_start();
    $extPATH = "../";

    require($extPATH . "grasPHP.php");

    include("navbar.php");

    printBackButton();
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