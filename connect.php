<?php 
$conn = new mysqli("localhost", "admin", "Database1", "middlemanwithphp"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 