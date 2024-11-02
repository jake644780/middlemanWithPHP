<?php
    $importPATH = "../../grasPHP/";
    require($importPATH . "smartReqFUN.php");
    requireALL($importPATH);
    require("../../connect.php");
    session_start();
    sessionCheck();

    printBackButton();

?>
<form action="addItems.php" method="POST" class="itemupload">
    <input type="text" placeholder="name..." name="name"><br>
    <input type="text" placeholder="price..." name="price"><br>
    <textarea name="description" placeholder="description..." cols="30" rows="8"></textarea><br>
    <label for="picture"></label><br>
    <input type="submit" name="submit" value="submit">
</form>

<style>

    textarea{
        resize: none;
    }

    .itemupload::placeholder{
        font-style: italic;
    }

    .itemupload{
        width: 20%;
        margin: 200px 40% 0 40%;
        display: grid;
        align-items: center;
        font-size: 20px;
    }
    </style>

<?php

if (isset($_POST["submit"])){
    $data = [
        "id" => "",
        "name" => @$_POST["name"],
        "price" => @$_POST["price"],
        "description" => @$_POST["description"],
        "picture" => "",//picture here
        "poster_id" => $_SESSION["id"]
    ];
}

?>