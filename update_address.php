<?php
include "db.php";

$user_id = $_POST['user_id'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];

/* CHECK already exists or not */
$check = mysqli_query($conn,"SELECT * FROM address WHERE user_id='$user_id'");

if(mysqli_num_rows($check)>0){

    mysqli_query($conn,
    "UPDATE address SET mobile='$mobile', address='$address' WHERE user_id='$user_id'");

}else{

    mysqli_query($conn,
    "INSERT INTO address (user_id, mobile, address) VALUES ('$user_id','$mobile','$address')");
}

echo "success";
?>