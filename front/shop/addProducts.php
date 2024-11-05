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
    <input type="file" name="filesToUpload">
    <input type="submit" name="submit" value="submit">
</form>

<?php


    /*
TODO
finish addproduct
separate addproduct and addimage

*/


if (isset($_POST["submit"])) {
    //product uploads
    $productData = [
        "id" => "",
        "name" => @$_POST["name"],
        "price" => @$_POST["price"],
        "stock" => @$_POST["stock"],
        "description" => @$_POST["description"]
    ];
    $productOK = 0;
    $i = $productData["price"];
    switch (true){
        case $i > 0:
            jsLog("product costs fine");
            $productOK = 1;
            break;
        case $i == 0:
            jsLog("product can't be 'free'");
            break;
        case $i < 0:
            jsLog("product can't cost minus money");
            break;
        default:
            jsLog("undefined num");
    }
    //name len check
    if (strlen($productData["name"]) === 0) $productOK = 0;
    if ($insertProduct = $conn->query(QinsertWithHash("products", $productData))){
        jsLog("successfully inserted item " . $productData);
    }
    
    //image uploads
    $target_dir = "uploads/";
    $uploadOk = 1;
    foreach ($_FILES["filesToUpload"]["tmp_name"] as $key => $tmp_name) {
        //unique name
        $fileID = 0;
        $originalFileName = basename($_FILES["filesToUpload"]["name"][$key]);
        while (file_exists($target_dir . $originalFileName . $fileID)) $fileID++;
        $target_file = $target_dir . $originalFileName . $fileID;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if file is a valid format
        $validFormats = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($fileType, $validFormats)) {
            jsLog("file: " . $_FILES["filesToUpload"]["name"][$key] . " is not acceptable");
            $uploadOk = 0;
            continue;
        }
        //file size
        if ($_FILES["filesToUpload"]["size"][$key] > 5000000) {
            jsLog("Sorry, your file is too large: " . $_FILES["filesToUpload"]["name"][$key]);
            $uploadOk = 0;
            continue;
        }
        // If everything is ok, try to upload file
        if ($uploadOk == 1) {
            if (move_uploaded_file($tmp_name, $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["filesToUpload"]["name"][$key])) . " has been uploaded.<br>";
                // Get the path of the uploaded file
                $uploadedFilePath = $target_file;
                echo "Path to the uploaded file: " . $uploadedFilePath . "<br>";
            } else {
                echo "Sorry, there was an error uploading your file: " . $_FILES["filesToUpload"]["name"][$key] . "<br>";
            }
        }
    }
}




if ($conn->query(QinsertWithHash("posts", $data)))


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