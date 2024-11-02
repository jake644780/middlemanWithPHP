<?php

function QselectAllByUsername ($username){
    return "SELECT * FROM users WHERE username = '$username';";
}

function QselectAllByEmail ($email){
    return "SELECT * FROM users WHERE email = '$email';";
}

function QselectAllByID ($ID){
    return "SELECT * FROM users WHERE id = '$ID';";
}
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
        if (is_string($value) || $value instanceof DateTime){
            $q .="'" . $value . "',";
        }
        else if (is_bool($value)){
            $boolValue = $value ? 1 : 0;
            $q .= $value . ","; 
        }
        else {
            $q .= $value . ",";
        }
    }
    $q = substr($q, 0, -1);
    $q .= ");";
    return $q;
    
}
?>