<?php

function QselectAllByUsername ($username){return "SELECT * FROM users WHERE username = '$username';";}


// "INSERT INTO users (id, username, password, description, date) VALUES ('', '".$username."', '".$password."', '".$description."', '".$joinDate."' )";
function QinsertWithHash ($tableName, $data){
    $q = "INSERT INTO $tableName (";
    //inserting keys
    foreach ($data as $key => $value){
        $q .= $key . ",";
    }
    $q = substr($q, 0, -1);
    $q .= ") VALUES (";
    //inserting values
    foreach ($data as $key => $value){
        if (is_string($value) || $value instanceof DateTime) $q .="'" . $value . "',";
        else $q .= $value . ",";
    }
    $q = substr($q, 0, -1);
    $q .= ");";
    return $q;
    
}
?>