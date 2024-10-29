<html>
    <head>
        <title>middleman</title>        
    </head>
<body>

<?php

    session_start();
    $extensionPATH = "../grasPHP/";
    include("../connect.php");
    require($extensionPATH . "smartReqFUN.php");
    requireALL($extensionPATH);

    include("navbar.php");

    //TODO frontend
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