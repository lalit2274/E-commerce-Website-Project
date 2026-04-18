<?php
include "db.php";

$name = mysqli_real_escape_string($conn, $_POST['name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

// Image upload
$imageName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];

$folder = "upload/" . $imageName;

move_uploaded_file($tmpName, $folder);

// Insert query
mysqli_query($conn,"
INSERT INTO products(name,price,image,description,category)
VALUES('$name','$price','$folder','$description','$category')
");

echo "Product Added Successfully";
?>