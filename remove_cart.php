<?php
include "db.php";

$id=$_POST['cart_id'];

mysqli_query($conn,"DELETE FROM cart WHERE id='$id'");

echo "success";
?>