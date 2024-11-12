<?php



if (isset($_SESSION["id"])) {
    $selectUser = $conn->query(QselectAllByid("users",$_SESSION['id']));
    if ($selectUser->num_rows > 0) while ($row = $selectUser->fetch_assoc()) $sessionUser = $row["username"];
    else $sessionUser = "";
} else jsLog("not logged in!");



echo '<div class="navbar">';

echo '<a href="#">
            <button class="nav-b">home</button></a>';
echo '<a href="shop/shopHome.php">
            <button class="nav-b">shop</button></a>';

echo '<form class="nav-s" action="browseItems.php" method="GET">
        <input class="search" type="text" name="search" placeholder="search for..." required>
        </form>';
echo '<a href="shop/cart.php">
            <button class="nav-b">cart</button></a>';
if (@$_SESSION['id']) {
    echo '<a href="auth/logout.php">
            <button class="nav-b">logout</button></a>
        ';
    echo '<a href="auth/profile.php">    
            <button class="nav-b">' . $sessionUser . '</button></a>
        ';
} else {
    echo '<a href="auth/login.php">
            <button class="nav-b">log in</button></a>   
        ';
    echo '<a href="auth/signup.php">
            <button class="nav-b">sign up</button></a>
        ';
}
echo '</div>';
//5 5 13 1 5 5 5
resizeTextOnOverflow("nav-b");
?>
<style>
    .navbar {
        display: grid;
        grid-template-columns: 5fr 5fr 13fr 5fr 5fr 5fr;
        grid-template-rows: 50px;
    }

    .nav-b,
    .nav-s {
        border: 2px solid black;
        align-items: center;
        justify-content: center;
        display: block;
        width: 100%;
        height: 100%;
        padding: 0;
        background-color: #fff;
        font-size: 150%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .navbar a {
        text-decoration: none;
    }

    .nav-b:hover {
        background-color: #eee;
    }

    .search {
        width: 100%;
        border: none;
        font-size: 110%;
    }

    .nav-s {
        height: 92%;
    }

    input[type="text"] {
        outline: none;
        background-color: white;

    }

    input[type="text"]:focus {
        outline: none;
        background-color: white;
    }
</style>