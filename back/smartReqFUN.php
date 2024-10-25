<?php

function requireMoreFromOne ($path, $listOfExtensions){
    echo "<script>console.log('required extensions:');</script>";
    for ($i = 0; $i < count($listOfExtensions); $i++){
        $reqPath = $path . $listOfExtensions[$i];
        require($reqPath);
        echo "<script>console.log('$reqPath');</script>";

    }
}

?>
