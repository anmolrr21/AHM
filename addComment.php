<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
include 'common/_dbconnect.php';
$comment = $_POST['comment'];
$postid = $_POST['id'];
$postContent = $_POST['w3review'];
$nameOfUser = $_SESSION["username"];
$sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row['user_id'];
$sql1 = "INSERT INTO `comments` (`comment_id`, `post_id`, `user_commented_id`, `comment`, `reply_status`) VALUES (NULL, '$postid', '$id', '$comment', '0')";
$result1 = mysqli_query($conn,$sql1);

$sql2 = "SELECT * FROM `comments` where `post_id`='$postid'";
$result2 = mysqli_query($conn,$sql2);
$count = mysqli_num_rows($result2);
$count = $count + 1;
$sql3 = "UPDATE `posts` SET `comments_count` = '$count' WHERE `posts`.`post_id` = $postid";
$result3 = mysqli_query($conn,$sql3);
?>