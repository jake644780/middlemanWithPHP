<?php
//require paths        
$extPATH = "../../grasPHP/";
require($extPATH . "smartReqFUN.php");
require("../../connect.php");
requireALL($extPATH);
?>

<html>
<head>
    <title>sign up to middleman</title>
</head>
<body>
    <form class="signup" action="signup.php" method="POST">
    username: <input type="text" name="username"><br>
    email: <input type="text" name="email"><br>
    password: <input type="password" name="password"><br>
    repeat password: <input type="password" name="repass"><br>
    password requirements:
    <ul><li>between the length of 8 and 40</li><li>atleast 1 number</li><li>atleast 1 uppercase letter</li></ul><br>
    tell us a bit about yourself: <br>
    <textarea name="description" id="" cols="30" rows="8" placeholder="type something about you here..."></textarea><br>
    <input type="submit" name="submit" value="sign up">
    </form>
</body>
<style>
    .signup{
        width: 20%;
        margin: 200px 40% 0 40%;
        display: grid;
        align-items: center;
        font-size: 20px;
    }

    .signup textarea{
        resize: none;
    }

    .signup textarea::placeholder{
        font-style: italic;
    }

</style>

<?php

    session_start();

    if (isset($_POST['submit'])){
        //grabbing data from form
        $data = [
            "id"          => "",
            "username"    => @$_POST['username'],
            "email"       => @$_POST['email'],
            "password"    => @$_POST['password'],
            "description" => @$_POST['description'],
            "date"        => date("Y-m-d")
        ];

        //password validation
        $password_validator = checkPass($data["password"]);
        
        if ($password_validator != 1){
            jsLog(getPassErrs($password_validator)); //frontend this
        }else{
            if ($data["password"] != @$_POST["repass"]){
               jsLog("password does not match!"); // frontend this
            }else{
                 //checking if user is already present in db
                 $isUserInDB_RESULT = $conn->query(QselectAllByUsername($data["username"]));

                 if ($isUserInDB_RESULT->num_rows != 0){
                    jsLog("user with this username already exists"); //frontend this
                 }else{
                     $insertUser_RESULT = $conn->query(QinsertWithHash("users", $data));
 
                     if ($insertUser_RESULT){
                        jsLog("successfully registered user"); //frontend this
                        
                        $_SESSION["username"] = $data["username"];
                        header("location: ../home.php");
                        

                    }
                }
            }
        }
    }


?>
</html>


