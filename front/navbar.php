<?php

echo '<div class="navbar">';

    echo '<a href="#">
            <button class="nav-b">home</button></a>';
    echo '<a href="shop/home.php">
            <button class="nav-b">shop</button></a>';
    echo '<a href="">
            <button class="nav-b">place of searchbar</button></a>';
    echo '<a href="">
            <button class="nav-b">icon</button></a>';
    echo '<a href="shop/cart.php">
            <button class="nav-b">cart</button></a>';
    if (@$_SESSION['username']){
        echo '<a href="auth/logout.php">
            <button class="nav-b">logout</button></a>
        ';
        echo '<a href="auth/profile.php">    
            <button class="nav-b">my profile</button></a>
        ';
    }else{
        echo '<a href="auth/login.php">
            <button class="nav-b">log in</button></a>   
        ';
        echo '<a href="auth/signup.php">
            <button class="nav-b">sign up</button></a>
        ';
    }

    
            
    echo '</div>';


    echo    '<style>
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


</style>';
?>
        
        