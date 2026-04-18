<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$issue = $_POST['issue'];
$message = $_POST['message'];

$sql = "INSERT INTO support (name, email, issue, message) 
VALUES ('$name','$email','$issue','$message')";

mysqli_query($conn,$sql);

echo "Saved";
?>