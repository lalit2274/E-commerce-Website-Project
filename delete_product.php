<?php
include "db.php";

$id=$_POST['id'];

mysqli_query($conn,"DELETE FROM products WHERE id='$id'");

echo "success";
?>