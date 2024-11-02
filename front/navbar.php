<?php




$selectUser = $conn -> query(QselectAllByID($_SESSION['id']));
if ($selectUser -> num_rows > 0){
    while ($row = $selectUser -> fetch_assoc()){
        $sessionUser = $row["username"];
    }
}else{
    $sessionUser = "";
}


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
    if (@$_SESSION['id']){
        echo '<a href="auth/logout.php">
            <button class="nav-b">logout</button></a>
        ';
        echo '<a href="auth/profile.php">    
            <button class="nav-b">' . $sessionUser . '</button></a>
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



    //5 5 13 1 5 5 5
    echo    '<style>
    .navbar{
        display: grid;
        grid-template-columns: 5fr 5fr 13fr 1fr 5fr 5fr 5fr;
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
        white-space: nowrap;   /* Prevent line breaks */
        overflow: hidden;      /* Hide overflow content */
        text-overflow: ellipsis; /* Add ellipsis for overflow text (optional) */
    }
    .navbar a{
        text-decoration: none;
    }
    .nav-b:hover{
        background-color: #eee;
    }


</style>';

resizeTextOnOverflow("nav-b");




?>
        
        