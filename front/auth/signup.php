<html>
<head>
    <title>sign up to middleman</title>
</head>
<body>
    <form class="signup" action="signup.php" method="POST">
    username: <input type="text" name="username"><br>
    email: <input type="text" name="email"><br>
    password: <input type="password" name="password"><br>
    repeat password: <input type="password"><br>
    password requirements:
    <ul><li>between the length of 8 and 40</li><li>atleast 1 number</li><li>atleast 1 uppercase letter</li></ul><br>
    tell us a bit about yourself: <br>
    <textarea name="description" id="" cols="30" rows="8" placeholder="type something about you here..."></textarea><br>
    <input type="submit" name="submit" value="submit">
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
    if (isset($_POST['submit'])){
        //include paths        
        include("../../back/authFUN.php");
        include("../../back/connect.php");
        
        //vars grabbed from form
        $username = @$_POST['username'];
        $email    = @$_POST['email'];
        $password = @$_POST['password'];
        $description = @$_POST['description'];
        $joinDate = date("Y-m-d");

        //password validation
        $password_validator = passVal($password);
        if ($password_validator != 1){
            echo passProbsToStr($password_validator);
        } else{    
            //checking if user is already present in db
            $isUserInDb_QUERY = "SELECT * FROM users WHERE username = '".$username."';";
            $isUserInDB_RESULT = $conn->query($isUserInDb_QUERY);

            if ($isUserInDB_RESULT->num_rows == 0){
                $insertUser_QUERY = "INSERT INTO users (id, username, password, description, date) VALUES ('', '".$username."', '".$password."', '".$description."', '".$joinDate."' )";
                $insertUser_RESULT = $conn->query($insertUser_QUERY);
                if ($insertUser_RESULT){
                    echo "<script>console.log('');</script>";
                }
            }
        }
            
    }
?>
</html>
