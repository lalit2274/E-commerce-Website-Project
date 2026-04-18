<?php
include "db.php";

$id = $_POST['id'];

mysqli_query($conn,"UPDATE orders SET status='Cancelled' WHERE id='$id'");

echo "success";
?>