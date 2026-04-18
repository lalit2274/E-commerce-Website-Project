<?php
include "db.php";

$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$payment = $_POST['payment_method']; // ✅ correct

$u = mysqli_query($conn,"SELECT name,email FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($u);

$p = mysqli_query($conn,"SELECT * FROM products WHERE id='$product_id'");
$product = mysqli_fetch_assoc($p);

$price = $product['price'];

$sql = "INSERT INTO orders(user_id,product_id,price,status,payment_method,date,name,email)
VALUES('$user_id','$product_id','$price','Processing','$payment',NOW(),'".$user['name']."','".$user['email']."')";

if(mysqli_query($conn,$sql)){
    echo "success";
}else{
    echo "error";
}
?>