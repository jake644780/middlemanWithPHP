<?php
$importPATH = "../../grasPHP/";
require($importPATH . "smartReqFUN.php");
requireALL($importPATH);
require("../../connect.php");
session_start();
sessionCheck();

printBackButton();

?>
<form action="addProduct.php" method="POST" class="itemupload" enctype="multipart/form-data">
    name <input type="text" name="name"><br>
    price <input type="text" name="price"><br>
    stock <input type="text" name="stock"><br>
    <textarea name="description" placeholder="description..." cols="30" rows="8"></textarea><br>
    <label for="picture">select image</label>
    <input type="file" name="images">
    <input type="submit" name="submit" value="submit">
</form>

<?php


    /*
TODO
finish addproduct
separate addproduct and addimage

*/


if (isset($_POST["submit"])){
    $productOK = 1;
    $faulty = ["problematic fields" => "bad value"];
    //id
    $productData = ["id" => "",];
    //name check
    if (!(strlen(@$_POST["name"]) === 0)){
        $productData["name"] =  @$_POST["name"];
    }else{
        jsLog("name can't be nothing");
        $productOK = 0;
        $faulty["name"] = @$_POST["name"];
    }
    //price check
    if (@$_POST["price"] > 0){
        jsLog("product costs fine");
        $productData["price"] = @$_POST["price"];
    }else{
        jsLog(@$_POST["price"] . " is not an acceptable value...");
        $productOK = 0;
        $faulty["price"] = @$_POST["price"];
    }
    //stock check
    if (@$_POST["stock"] > 0 && is_int(@$_POST["stock"])){
        jsLog("stock is fine");
        $productData["stock"] = @$_POST["stock"];
    }else{
        jsLog(@$_POST["stock"] . " is not an acceptable value...");
        $productOK = 0;
        $faulty["stock"] = @$_POST["stock"];
    }
    //description
    $productData["description"] = @$_POST["description"];
    //image uploads
    $target_dir = "uploads/";
    $imageOk = 1;
    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name){
        //unique name
        $fileID = 0;
        $ogFileName = basename($_FILES["images"]["name"][$key]);
        while (file_exists($target_dir . $ogFileName . $fileID)) $fileID++;
        $target_file = $target_dir . $ogFileName . $fileID;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if file is a valid format
        $validFormats = ["jpg", "png", "jpeg", "gif"];
        if (in_array($fileType, $validFormats)){
            jsLog("file: " . $_FILES["images"]["name"][$key] . " is acceptable");
        }else{
            jsLog("file: " . $_FILES["images"]["name"][$key] . " is not acceptable file format");   
            $imageOk = 0;
            $faulty["imageExt"] .= $_FILES["images"]["name"][$key] . ", ";
        }
        //file size
        if ($_FILES["images"]["size"][$key] <= 5000000){
            jsLog("file" . $_FILES["images"]["size"][$key] . " is acceptable");            
        }else{
            jsLog("Sorry, your file is too large: " . $_FILES["images"]["name"][$key]);
            $imageOK = 0;
            $faulty["imageSize"] .= $_FILES["images"]["name"][$key] . ", ";
        }
        // If everything is ok, try to upload file
        if ($imageOK == 1){
            if (move_uploaded_file($tmp_name, $target_file)){
                echo "The file " . htmlspecialchars(basename($_FILES["images"]["name"][$key])) . " has been uploaded.<br>";
                // Get the path of the uploaded file
                $uploadedFilePath = $target_file;
                echo "Path to the uploaded file: " . $uploadedFilePath . "<br>";
            } else {
                echo "Sorry, there was an error uploading your file: " . $_FILES["images"]["name"][$key] . "<br>";
            }
        }
    }

     //inserting into db
     if ($productOK && $imageOK){
        $insertProduct = $conn->query(QinsertWithHash("products", $productData));
        jsLog("successfully inserted item " . $productData);
    }else{
        jsLog("product cannot be inserted into db");
    }

}

?>




<style>
    textarea {
        resize: none;
    }

    .itemupload::placeholder {
        font-style: italic;
    }

    .itemupload {
        width: 20%;
        margin: 200px 40% 0 40%;
        display: grid;
        align-items: center;
        font-size: 20px;
    }
</style>