<?php
$conn = new mysqli("localhost", "admin", "Database1", "middlemanwithphp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//functions
function checkPass($password){
    $len = strlen($password) >= 8 && strlen($password) <= 40 ? 1 : 0;
    $cap = preg_match('/[A-Z]/', $password) ? 1 : 0;
    $num = preg_match('/[0-9]/', $password) ? 1 : 0;
    if ($len == $cap && $len == $num && $len == 1) return 1;
    return [$len, $cap, $num];
}
//FIX THIS WITH JSLOGGING!!!!!!
function getPassErrs($errors){ 
    $passwordError = "password does not match these expectations:\n";
    $expectations = ["must have a length between 8 and 40", "must have atleast 1 capital letter", "must have atleast 1 numerical"];
    for ($i = 0; $i < count($expectations); $i++) if ($errors[$i] == 0) $passwordError .= "\n" . $i + 1 . "." . $expectations[$i];
    return $passwordError;
}
function sessionCheck(){
    if (@$_SESSION["id"]) {
        jsLog("logged in!");
    } else {
        jsLog("not logged in!");
    }
}
function validateEmail($email){
    return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email) ? 1 : 0;
}
function resizeTextOnOverflow($className){
    echo "<script>
    const adjustFontSize = () => {
        const divs = document.querySelectorAll('.$className');

        divs.forEach(div => {
            const containerHeight = div.clientHeight;
            const containerWidth = div.clientWidth;
            const minFontSize = Math.max(10, containerHeight * 0.1); // Minimum 10px or 10% of height
            const maxFontSize = Math.min(100, containerHeight * 0.8); // Maximum 100px or 80% of height
            // Start from maxFontSize and work down
            let fontSize = maxFontSize;
            // Create a temporary element to measure text size
            const tempSpan = document.createElement('span');
            tempSpan.style.visibility = 'hidden'; // Hide it from view
            document.body.appendChild(tempSpan);
            do {
                // Set font size in the temporary span
                tempSpan.style.fontSize = fontSize + 'px';
                tempSpan.innerText = div.innerText; // Use the same text as the div
                // Check dimensions
                const tempWidth = tempSpan.offsetWidth;
                const tempHeight = tempSpan.offsetHeight;
                // If it fits, apply the size to the div
                if (tempWidth <= containerWidth && tempHeight <= containerHeight) {
                    div.style.fontSize = fontSize + 'px';
                    break;
                }
                fontSize -= 1; // Decrease font size
            } while (fontSize >= minFontSize);
            // Clean up temporary element
            document.body.removeChild(tempSpan);
        });
    };
    document.addEventListener('DOMContentLoaded', adjustFontSize);
    window.addEventListener('resize', adjustFontSize);
    </script>";
}
function jsLog($message){
    echo "<script>console.log(`" . addslashes($message) . "`);</script>";
}
function QselectAllByUsername($tableName, $username){
    return "SELECT * FROM " . $tableName . " WHERE username = '$username';";
}
function QselectAllByEmail($tableName, $email){
    return "SELECT * FROM " . $tableName . " WHERE email = '$email';";
}
function QselectAllByid($tableName, $id){
    return "SELECT * FROM " . $tableName . " WHERE id = '$id';";
}
function QselectAllBy($tableName, $key, $value){
    return "SELECT * FROM " . $tableName . " WHERE " . $key . " = '" . $value . "';";
}
function QinsertWithHash($tableName, $data){
    $q = "INSERT INTO $tableName (";
    // Inserting keys
    foreach ($data as $key => $value) {
        $q .= $key . ",";
    }
    $q = rtrim($q, ',') . ") VALUES (";
    // Inserting values
    foreach ($data as $key => $value) {
        if (is_string($value) || $value instanceof DateTime) {
            $q .= "'" . $value . "',";
        } else if (is_bool($value)) {
            $boolValue = $value ? 1 : 0;
            $q .= $boolValue . ",";
        } else {
            $q .= $value . ",";
        }
    }
    $q = rtrim($q, ',') . ");";
    return $q;
}
