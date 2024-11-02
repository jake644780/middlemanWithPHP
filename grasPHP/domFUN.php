<?php

function printBackButton(){
    $previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'default_page.php';
    
    echo '<button onclick="window.location.href=\'' . $previousPage . '\' " class="backbutton">Go Back</button>';

    echo '
<style>
    .backbutton{
        border: none;
        background-color: transparent;
    }
    .backbutton:hover{
        background-color: transparent;
    }

</style>';
}
//this always goes back. we need it to go up absolutely!!!
//TODO fix back button!



?> 
