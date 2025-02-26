<?php
include 'connection.php';
session_start();
$pid = $_POST['pid'];
$uid = $_SESSION['uid'];

if (!isset($_SESSION['uid'])) {
    header("location:login.php");
}
$q = mysqli_query($connection, "insert into tbl_whishlist (product_id, user_id) values ('{$pid}','{$uid}')");

header("location:whishlist.php");