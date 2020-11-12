<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $org_need=$_POST['need'];
    $org_desc=$_POST['textarea_desc'];
    $org_domain = $_SESSION['select_domain'];
    // $org_other_domain = $_SESSION['other_domain'];
    echo $org_need . $org_desc. '<br>';
    echo $org_domain;
    // $sql = "SELECT * FROM `users` where name='$name'";
    // $result = mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);
    // $uid = $row['user_id'];
    // $sql1 = "SELECT * FROM `hospitals` where hospital_name='$hosp_name'";
    // $result1 = mysqli_query($conn,$sql1);
    // $row1=mysqli_fetch_assoc($result1);
    // $hospid = $row1['hospital_id'];
    // $sql2="INSERT INTO `user_complaints` (`ComplaintId`, `uid`, `hid`, `Complaint`, `date`) VALUES (NULL, $uid, $hospid, '$complaint', $date)";
    // $result2 = mysqli_query($conn,$sql2);
    // header("location:/CoronaBedProject/complain.php");
 }
?>
