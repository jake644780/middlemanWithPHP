<html>
    <head>
        <title>middleman</title>        
    </head>
<body>

<?php

    session_start();
    $extPATH = "../grasPHP/";
    include("../connect.php");
    require($extPATH . "smartReqFUN.php");
    requireALL($extPATH);

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