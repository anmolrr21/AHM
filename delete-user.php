<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $type = $_POST['type'];
    $email = $_POST['email'];
    echo $type .'<br>';
    echo $email;
    $sql="DELETE FROM `users` WHERE email = '$email' and type='$type' ";
    $result = mysqli_query($conn,$sql);
    
}
header("location:/AHM/admin.php");

?>