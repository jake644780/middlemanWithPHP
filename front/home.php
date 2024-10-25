<html>
    <head>
        <title>middleman</title>        
    </head>
<body>

<?php

    session_start();
    $extensionPATH = "../back/";
    include($extensionPATH . "connect.php");
    require($extensionPATH . "smartReqFUN.php");
    requireMoreFromOne($extensionPATH, [
        "authFUN.php",
        "jsFUN.php",
        "connect.php",
        "queryCreatorFUN.php",
        "domFUN.php"
    ]);

    require("navbar.php");
?>

   
     
</body>
<style>
    body{
        margin: 2px;
    }
</style>
<?php

sessionCheck();
?>


</html>