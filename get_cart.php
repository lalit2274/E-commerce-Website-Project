<?php
include "db.php";

$user_id=$_GET['user_id'];

$sql="SELECT cart.id as cart_id, products.* 
FROM cart 
JOIN products ON cart.product_id = products.id
WHERE cart.user_id='$user_id'";

$result=mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);
?>