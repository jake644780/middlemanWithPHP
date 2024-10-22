<html>
    <head>
        <title>middleman</title>        
    </head>
<body>

<?php
    include("../back/connect.php");
?>

    <div class="navbar">
        <a href="#">
            <button class="nav-b">home</button></a>
        <a href="">
            <button class="nav-b">shop</button></a>
        <a href="">
            <button class="nav-b">place of searchbar</button></a>
        <a href="">
            <button class="nav-b">icon</button></a>
        <a href="">
            <button class="nav-b">cart</button></a>
        <a href="../front/auth/login.php">
            <button class="nav-b">login/logout</button></a>
        <a href="../front/auth/signup.php">
            <button class="nav-b">signup/myaccount</button></a>
            
            <style>
                    .navbar{
                        display: grid;
                        grid-template-columns: 150px 150px auto 50px 150px 150px 150px;
                        grid-template-rows: 50px;
                    }
                    .nav-b{
                        border: 2px solid black;
                        align-items: center;
                        justify-content: center;
                        display: block;
                        width: 100%;
                        height: 100%;
                        padding: 0;
                        background-color: #fff;
                        font-size: 150%;
                    }
                    .navbar a{
                        text-decoration: none;
                    }
                    .nav-b:hover{
                        background-color: #eee;
                    }
                
                
            </style>
    </div>
     
</body>
<style>
    body{
        margin: 2px;
    }
</style>


</html>