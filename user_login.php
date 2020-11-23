<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"]=="POST"){
      include 'common/_dbconnect.php';
      $emaill = $_POST['login1'];
      $password1 = $_POST['login2'];

      if(isset($_POST["login"])){
         $sql = "SELECT * FROM users WHERE email='$emaill' AND password='$password1' ";
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);

         if($row != null){
            $_SESSION["username"] = $row['name'];
            $_SESSION["type"] = $row['type'];

            if($_SESSION['type'] == 'Organization'){
               header("location:/AHM/organization.php");
            }
            else if($_SESSION['type'] == 'Individual'){
               header("location:/AHM/individual.php");
            }
            else {
               header("location:/AHM/error.php");
            }
         }
         else {
            echo "Not a valid user or password or username does not match";
         }
      }
   }
>