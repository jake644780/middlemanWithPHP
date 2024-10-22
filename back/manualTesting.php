<?php
require("jsFUN.php");
require("authFUN.php");
require("queryCreatorFUN.php");

jsLog("i want to die"); //works


echo "<h1>password checker</h1>";   //works
$passwords = [
    "incor",        //000
    "Inco",         //001
    "1nco",         //010
    "I1nco",        //011
    "incorrect",    //100
    "1ncorrect",    //101
    "Incorrect,"    //110
];
for ($i = 0; $i < count($passwords); $i++){
    $listOfShit = checkPass($passwords[$i]);
    echo "<br>element $i is: ";
    for ($j = 0; $j < count($listOfShit); $j++) echo $listOfShit[$j].", ";

}

echo "<h1>password message checker</h1>";   //works

for ($i = 0; $i < count($passwords); $i++){
    $listOfShit = checkPass($passwords[$i]);
    echo "<br><br>$i. element is:<br>" . getPassErrs($listOfShit);

}

?>