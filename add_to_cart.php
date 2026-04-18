<?php
include "db.php";

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];

// 🔥 DEBUG
if(!$user_id){
    $user_id = "guest";
}

$sql = "INSERT INTO cart (user_id, product_id) VALUES ('$user_id','$product_id')";

mysqli_query($conn,$sql);

echo "Added";
?>