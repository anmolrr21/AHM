<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $pname = $_FILES['file'];
    

    $sqll = "INSERT INTO users (name,email,password,phone,location) VALUES ('$name','$email','$password','$phone','$location')";
    $resultt = mysqli_query($conn,$sqll);

    if (isset($_POST["submit"]))
 {
    $uploads_dir = 'images/';
    move_uploaded_file( $uploads_dir);
    $sql = "INSERT INTO users (proof) VALUES('$pname')";
    $resullt = mysqli_query($conn,$sql);
    header("refresh:0;url = org2.php");
 }
 
}
?>