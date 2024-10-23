<?php

function requireMoreFromOne ($path, $listOfExtensions){
    for ($i = 0; $i < count($listOfExtensions); $i++){
        $reqPath = $path . $listOfExtensions[$i];
        require($reqPath);
        echo "<script>console.log('required extension: $reqPath');</script>";

    }
}

?>
