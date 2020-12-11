<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      include 'common/_dbconnect.php';
      $emaill = $_POST['login1'];
      $password1 = $_POST['login2'];

      $_SESSION["logged_in_email"]=$emaill;

      if(isset($_POST["login"])){
         $sql = "SELECT * FROM users WHERE email='$emaill' AND password='$password1' ";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
         $userid=$row['user_id'];

         $sql1 = "SELECT * FROM org_users WHERE Org_uid=$userid ";
         $result1 = mysqli_query($conn, $sql1);
         $row1 = mysqli_fetch_assoc($result1);
         $status=$row1['status'];

         if($row != null){
            $_SESSION["username"] = $row['name'];
            $_SESSION["type"] = $row['type'];

            if($_SESSION['type'] == 'Organization' and $status==1){
               header("location:/AHM/org2.php");
            }
            else if($_SESSION['type'] == 'Organization' and $status==2){
               header("location:/AHM/homePage.php");
            }
            else if($_SESSION['type'] == 'Organization' and $status==0){
               header("location:/AHM/message.php?verify=decline");
            }

            else if($_SESSION['type'] == 'Individual'){
               header("location:/AHM/homePage.php");
            }
            else {
               header("location:/AHM/login.php?status=fail");
            }
         }
         else {
            header("location:/AHM/login.php?status=fail");
         }
      }
   }
