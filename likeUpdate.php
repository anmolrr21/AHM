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
$name = $_SESSION["username"];
$sql2 = "SELECT * FROM `users` where `name`='$name'";
$result2 = mysqli_query($conn,$sql2);
$row1 = mysqli_fetch_assoc($result2); 
$currentUserId = $row1['user_id'];
$sql3 = "INSERT INTO `likes` (`sno`, `post_id`, `user_liked_id`) VALUES (NULL, '$postid', '$currentUserId');";
$result3 = mysqli_query($conn,$sql3);
?>