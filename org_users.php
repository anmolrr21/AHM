<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $pname = $_FILES['file']['tmp_name'];
    

    $sqll = "INSERT INTO users (name,email,password,phone,location) VALUES ('$name','$email','$password','$phone','$location')";
    $resultt = mysqli_query($conn,$sqll);
    
    if (isset($_POST["submitt"]))
 {
    $target_dir = 'images/';
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    echo $target_file;
    move_uploaded_file($pname,$target_file);
    $blob = fopen($target_file, "rb");
    $sql = "INSERT INTO users (proof) VALUES ($blob) where user_id =(select user_id from users where 'name' = $name) ";
    echo $sql;
    $resullt = mysqli_query($conn,$sql);
    
 }

 header("refresh:0;url = org2.php");
 
}
?>