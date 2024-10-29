<div class="login">
    <h1>
        log in
    </h1>
<form action="login.php" method="POST">
    username/email:   <input type="text" name="userOrEmail">
    password: <input type="password" name="password">
    <input type="submit" value="log in">
</form>
</div>

<style>

    .login{
        width: 20%;
        margin: 200px 40% 0 40%;
        display: grid;
        align-items: center;
        font-size: 20px;
    }
</style>

<?php

$extPATH = "../../grasPHP/";
require("smartReqFUN.php");
requireALL($extPATH);

if (isset($_POST['submit'])){
    session_start();
    $userOrEmail = @$_POST['userOrEmail'];
    $password = @$_POST['password'];
    $foundWith = "none";
    //looking for email/username in database
    if (validateEmail($userOrEmail)){
        $loginRESULT =$conn ->query( QselectAllByEmail($userOrEmail));
        if ($loginRESULT == 1){
            jsLog("found with email");
            $foundWith = "email";
        }else{
            jsLog("not found this email address");
        }
    }else{
        $loginRESULT =$conn ->query( QselectAllByUsername($userOrEmail));
        if ($loginRESULT == 1){
            jsLog("found with username");
            $foundWith = "username";
        }else{
            jsLog("not found with username");
        }
    }

    //TODO DO THIS CORRECTLY!!!!!!!!!!!!!!!!!!;;;

    
}

?> 
