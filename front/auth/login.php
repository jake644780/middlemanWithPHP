<?php
?>

<div class="login">
    <h1>
        log in
    </h1>
    <form action="login.php" method="POST">
        username/email:<br> <input type="text" name="userOrEmail">
        <br>password: <br><input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="log in">
    </form>
</div>

<style>
    .login {
        width: 20%;
        margin: 200px 40% 0 40%;
        display: grid;
        align-items: center;
        font-size: 20px;
    }
</style>

<?php

require("../../grasPHP.php");

if (isset($_POST["submit"])) {
    session_start();
    $userOrEmail = @$_POST['userOrEmail'];
    $password = @$_POST['password'];
    $foundWith = "none";

    //looking for email/username in database
    if (validateEmail($userOrEmail)) {
        $loginRESULT = $conn->query(QselectAllByEmail("users",$userOrEmail));
        if ($loginRESULT == 1) {
            jsLog("found with email");
            $foundWith = "email";
        } else {
            jsLog("not found this email address");
        }
    } else {
        $loginRESULT = $conn->query(QselectAllByUsername("users", $userOrEmail));
        if ($loginRESULT->num_rows == 1) {
            jsLog("found with username");
            $foundWith = "username";
        } else {
            jsLog("not found with username");
        }
    }

    $selectInsertedUserRESULT = $conn->query(QselectAllByUsername("users", $userOrEmail));

    if ($selectInsertedUserRESULT->num_rows == 1) {
        while ($row = $selectInsertedUserRESULT->fetch_assoc()) {
            $_SESSION["id"] = $row["id"];
            header("location: ../home.php");
        }
    }
}

?>