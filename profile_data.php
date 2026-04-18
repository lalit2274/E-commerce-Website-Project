<?php
include "db.php";

$user_id = $_GET['user_id'];

/* USER DATA */
$user = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM users WHERE id='$user_id'"));

/* ADDRESS DATA */
$address = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM address WHERE user_id='$user_id'"));


echo json_encode([
    "name"=>$user['name'],
    "email"=>$user['email'],
    "mobile"=>$address['mobile'],
    "address"=>$address['address'],
   
]);
?>