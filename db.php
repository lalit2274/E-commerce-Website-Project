<?php
$conn = mysqli_connect("localhost", "root", "", "wp");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>