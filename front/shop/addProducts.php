<?php
require("../../grasPHP.php");


session_start();
sessionCheck();

printBackButton();

?>
<form action="addProducts.php" method="POST" class="itemupload" enctype="multipart/form-data">
    name <input type="text" name="name"><br>
    price <input type="number" name="price"><br>
    stock <input type="number" name="stock"><br>
    <textarea name="description" placeholder="description..." cols="30" rows="8"></textarea><br>
    <label for="picture">select image</label>
    <input type="file" name="images[]" multiple>
    <input type="submit" name="submit" value="submit">
</form>

<?php



if (isset($_POST["submit"])) {
    $productOK = 1;
    $faulty = ["problematic fields" => "bad value"];
    $faulty["imageExt"] = "";
    //id
    $productData = ["id" => "",];
    //name check
    if (!(strlen(@$_POST["name"]) === 0)) {
        $productData["name"] =  @$_POST["name"];
    } else {
        jsLog("name can't be nothing");
        $productOK = 0;
        $faulty["name"] = @$_POST["name"];
    }
    //price check
    if (@$_POST["price"] > 0) {
        jsLog("product costs fine");
        $productData["price"] = @$_POST["price"];
    } else {
        jsLog(@$_POST["price"] . " is not an acceptable value...");
        $productOK = 0;
        $faulty["price"] = @$_POST["price"];
    }
    //stock check
    if (@$_POST["stock"] > 0 && is_numeric(@$_POST["stock"])) {
        jsLog("stock is fine");
        $productData["stock"] = @$_POST["stock"];
    } else {
        jsLog(@$_POST["stock"] . " is not an acceptable value...");
        $productOK = 0;
        $faulty["stock"] = @$_POST["stock"];
    }
    //description
    $productData["description"] = @$_POST["description"];

    //inserting into db
    if ($productOK) {
        $insertProduct = $conn->query(QinsertWithHash("products", $productData));
        jsLog("successfully inserted item " . $productData["name"]);
    } else {
        jsLog("product cannot be inserted into db");
    }
    $productName = @$_POST["name"];
    $selectUploadedProduct = $conn->query("SELECT * FROM products WHERE name = '" . $productName . "'");
    while ($rows = $selectUploadedProduct->fetch_assoc()) {
        $insertedProductid = $rows["id"];
    }


    //image uploads
    $target_dir = "uploads/";
    $imageOk = 1;
    $images = [];
    if ($productOK) {
        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            //unique name
            $fileid = 0;
            $ogFileName = basename($_FILES["images"]["name"][$key]);
            while (file_exists($target_dir . $ogFileName . $fileid)) $fileid++;
            $target_file = $target_dir . $fileid . $ogFileName;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if file is a valid format
            $validFormats = ["jpg", "png", "jpeg", "gif"];
            if (in_array($fileType, $validFormats)) {
                jsLog("file: " . $_FILES["images"]["name"][$key] . " is acceptable file format");
            } else {
                jsLog("file: " . $_FILES["images"]["name"][$key] . " is not acceptable file format");
                $imageOk = 0;
                $faulty["imageExt"] .= $_FILES["images"]["name"][$key] . ", ";
            }
            //file size
            if ($_FILES["images"]["size"][$key] <= 5000000) {
                jsLog("file " . $_FILES["images"]["name"][$key] . " is an acceptable size");
            } else {
                jsLog("Sorry, your file is too large: " . $_FILES["images"]["name"][$key]);
                $imageOK = 0;
                $faulty["imageSize"] .= $_FILES["images"]["name"][$key] . ", ";
            }
            if (move_uploaded_file($tmp_name, $target_file)) {
                jsLog("successfully added image");
                $imageData = [
                    "id" => "",
                    "parentid" => $insertedProductid,
                    "path" => $target_file
                ];
                $insertImage = $conn->query(QinsertWithHash("images", $imageData));
            }
        }
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