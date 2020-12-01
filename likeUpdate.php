<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
include 'common/_dbconnect.php';
$postid = $_POST['id'];
$sql = "SELECT * FROM `posts` where `post_id`='$postid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$count = $row['likes_count'];
$count = $count + 1;
$sql1 = "UPDATE `posts` SET `likes_count` = '$count' WHERE `posts`.`post_id` = $postid";
$result1 = mysqli_query($conn,$sql1);
?>