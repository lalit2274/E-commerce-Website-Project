<?php
include "db.php";

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

mysqli_query($conn,"
INSERT INTO address(user_id,name,mobile,address)
VALUES('$user_id','$name','$mobile','$address')
");

echo "success";
?>