<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
    include 'common/_dbconnect.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_GET['onlyContent'])){
            $postContent = $_POST['w3review'];
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $id = $row['user_id'];
            $sql1 = "INSERT INTO `posts` (`post_id`, `user_id`, `image_posted`, `video_posted`, `article`, `likes_count`, `comments_count`) VALUES (NULL, '$id', NULL, NULL, '$postContent', '0', '0')";
            $result1 = mysqli_query($conn,$sql1);
            header("location:/AHM/homePage.php?success=true");
        }
        else{
            if(isset($_GET['imageContent'])){
                $postContent = $_POST['w3review'];
                $pname = $_FILES['img']['tmp_name'];
                $target_dir = 'images/';
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                move_uploaded_file($pname,$target_file);
                $blob = fopen($target_file, "rb");
                $nameOfUser = $_SESSION["username"];
                $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $id = $row['user_id'];
                $sql1 = "INSERT INTO `posts` (`post_id`, `user_id`, `image_posted`, `video_posted`, `article`, `likes_count`, `comments_count`) VALUES (NULL, '$id', '$blob', NULL, '$postContent', '0', '0')";
                $result1 = mysqli_query($conn,$sql1);
                header("location:/AHM/homePage.php?success=true");
            }
            else{
                if(isset($_GET['videoContent'])){
                    $postContent = $_POST['w3review'];
                    $pname = $_FILES['img']['tmp_name'];
                    $target_dir = 'videos/';
                    $target_file = $target_dir . basename($_FILES["video"]["name"]);
                    $video_path=$_FILES['video']['name'];
                    move_uploaded_file($pname,$target_file);
                    $blob = fopen($target_file, "rb");
                    $nameOfUser = $_SESSION["username"];
                    $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['user_id'];
                    $sql1 = "INSERT INTO `posts` (`post_id`, `user_id`, `image_posted`, `video_posted`, `article`, `likes_count`, `comments_count`) VALUES (NULL, '$id', NULL,'$video_path', '$postContent', '0', '0')";
                    $result1 = mysqli_query($conn,$sql1);
                    header("location:/AHM/homePage.php?success=true");
                }
            }
        }
    }
?>