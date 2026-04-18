<?php
include "db.php";

$p=mysqli_query($conn,"SELECT COUNT(*) as total FROM products");
$c=mysqli_query($conn,"SELECT COUNT(DISTINCT category) as total FROM products");
$o=mysqli_query($conn,"SELECT COUNT(*) as total FROM orders");

$today=mysqli_query($conn,"SELECT COUNT(*) as total FROM orders WHERE DATE(date)=CURDATE()");
$week=mysqli_query($conn,"SELECT COUNT(*) as total FROM orders WHERE YEARWEEK(date)=YEARWEEK(CURDATE())");
$month=mysqli_query($conn,"SELECT COUNT(*) as total FROM orders WHERE MONTH(date)=MONTH(CURDATE())");

echo json_encode([
"totalProducts"=>mysqli_fetch_assoc($p)['total'],
"totalCategories"=>mysqli_fetch_assoc($c)['total'],
"totalOrders"=>mysqli_fetch_assoc($o)['total'],
"todayOrders"=>mysqli_fetch_assoc($today)['total'],
"weeklyOrders"=>mysqli_fetch_assoc($week)['total'],
"monthlyOrders"=>mysqli_fetch_assoc($month)['total']
]);
?>