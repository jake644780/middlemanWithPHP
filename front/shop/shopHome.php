<?php
$importPATH = "../../grasPHP/";
require($importPATH . "smartReqFUN.php");
requireALL($importPATH);
require("../../connect.php");
require("../navbar.php");
session_start();
sessionCheck();

printBackButton();


?>

<a href="../home.php"><button>go back(fr)</button></a>
<a href="addProducts.php"><button>add items</button></a>
<br>
<br>
<br>
<br>


<?php

class Product {
    public $id;
    public $name;
    public $price;
    public $stock;
    public $description;

    public function __construct($id, $name, $price, $stock, $description){
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
    }

    public function getDetails(){
        return $this->id . ": " . $this->name . "<br>" . "price: " . $this->price . "<br>" . "stock: " . $this->stock . "<br>" . "description: " . $this->description . "<br>" ;
    }
}

$selectAllProducts = $conn -> query("SELECT * FROM products");

$posts = [];

if ($selectAllProducts -> num_rows > 0){
    while ($row = $selectAllProducts -> fetch_assoc()){
        $posts[] = new Product($row["id"], $row["name"], $row["price"], $row["stock"], $row["description"]);
    }
}

for ($i = 0; $i < count($posts); $i++){
    echo $posts[$i]->getDetails();
    $qq = "SELECT * FROM images WHERE parentId = '" . $posts[$i]->id . "'";
    $selectAllImages = $conn -> query($qq);
    if ($selectAllImages -> num_rows > 0){
        while ($row = $selectAllImages -> fetch_assoc()){
            $imgPATH = $row["path"];
            echo '<img src="' . $imgPATH . '" alt="">';
        }
    }

    echo "<br><br>";
}



?>

