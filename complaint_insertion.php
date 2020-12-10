<?php
    session_start();
    include 'common/_dbconnect.php';
    if(!isset($_SESSION["logged_in_email"])){ 
        header("location:/AHM/adminLogin.php?error=login");
       
    }
    echo 'ekkknterr';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo 'enterr';
        $email=$_SESSION["logged_in_email"];
        $name = $_POST["username"];
        $complaint=$_POST['complaint'];
        


        $sql1 = "SELECT * FROM `users` where `email`='$email'";
        $result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $complaint_by=$row1['user_id'];

        $sql2 = "SELECT * FROM `users` WHERE name='$name' ";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $complaint_for=$row2['user_id'];

        $sql3="INSERT INTO `complaint` (`user_id`, `complaint_for_userid`, `complaint`) VALUES ($complaint_by, $complaint_for, '$complaint')";
        $result3 = mysqli_query($conn, $sql3);

        if(mysqli_affected_rows($conn)>0 ){
         header("location:/AHM/complaint.php?status=success");
    }
        else{
            header("location:/AHM/complaint.php?status=fail");

        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    ?>
