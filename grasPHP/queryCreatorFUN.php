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

function QselectAllBy ($tableName, $key, $value){
    return "SELECT * FROM " . $tableName . " WHERE " . $key . " = '" . $value . "';";
}


function QinsertWithHash ($tableName, $data){
    $q = "INSERT INTO $tableName (";
    // Inserting keys
    foreach ($data as $key => $value){
        $q .= $key . ",";
    }
    $q = rtrim($q, ',') . ") VALUES (";
    // Inserting values
    foreach ($data as $key => $value){
        if (is_string($value) || $value instanceof DateTime){
            $q .= "'" . $value . "',";
        }
        else if (is_bool($value)){
            $boolValue = $value ? 1 : 0;
            $q .= $boolValue . ",";
        }
        else {
            $q .= $value . ",";
        }
    }
    $q = rtrim($q, ',') . ");";
    return $q;
}

?>