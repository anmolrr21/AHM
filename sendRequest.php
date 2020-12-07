<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
include 'common/_dbconnect.php';
$id = $_POST['id'];
$name = $_SESSION["username"];
$sql2 = "SELECT * FROM `users` where `name`='$name'";
$result2 = mysqli_query($conn,$sql2);
$row1 = mysqli_fetch_assoc($result2); 
$currentUserId = $row1['user_id'];
$sql = "INSERT INTO `connections` (`userid`, `connection_id`, `requestStatus`, `acceptedNoti`, `rejectNoti`) VALUES ('$currentUserId', '$id', '0', '0', '0')";
$result = mysqli_query($conn,$sql);
?>