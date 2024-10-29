<?php

function requireMoreFromOne ($path, $listOfExtensions){
    echo "<script>console.log('required extensions:');</script>";
    for ($i = 0; $i < count($listOfExtensions); $i++){
        $reqPath = $path . $listOfExtensions[$i];
        require($reqPath);
        echo "<script>console.log('$reqPath');</script>";

    }
}


function requireALL ($PATH){
    $FUNS = [
        "authFUN.php",
        "jsFUN.php",
        "queryCreatorFUN.php",
        "domFUN.php"
    ];

    echo "<script>console.log('included:');</script>";
    echo "<script>console.log('-----------------------------------------------');</script>";

    for ($i = 0; $i < count($FUNS); $i++){
        echo "<script>console.log('".$FUNS[$i]."');</script>";
        require($PATH . $FUNS[$i]);
    }
    echo "<script>console.log('-----------------------------------------------');</script>";
    
}
?>
