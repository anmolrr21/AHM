<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
include 'common/_dbconnect.php';
$nameOfUser = $_SESSION["username"];
$sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$currentLoggedId = $row['user_id'];
$othersId = $_POST['done'];
if(isset($_POST['accept'])){
    $sql1 = "UPDATE `connections` SET `requestStatus` = '1', `acceptedNoti` = '1' WHERE `connections`.`userid` = $othersId AND `connections`.`connection_id` = $currentLoggedId";
    $result1 = mysqli_query($conn,$sql1);
}
if(isset($_POST['reject'])){
    $sql2 = "DELETE FROM `connections` WHERE `connections`.`userid` = $othersId AND `connections`.`connection_id` = $currentLoggedId";
    $result2 = mysqli_query($conn,$sql2);
}
header("location:/AHM/connections.php");
