<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      include 'common/_dbconnect.php';
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      if($row !=null){
        header("location:/AHM/admin.php");
      }
      else {
        echo "Not a valid user or password or username does not match";
        header("location:/AHM/adminLogin.php?error=true");
     }
    
    
    }
      ?>