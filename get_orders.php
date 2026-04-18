<?php
include "db.php";

$user_id=$_GET['user_id'];

$sql="SELECT orders.*, products.name, products.image 
FROM orders 
JOIN products ON orders.product_id=products.id
WHERE orders.user_id='$user_id'";

$result=mysqli_query($conn,$sql);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $data[]=$row;
}

echo json_encode($data);
?>