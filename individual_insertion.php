<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $sql1 = "INSERT INTO users (name,email,password,phone,location,type) VALUES ('$name','$email','$password','$phone','$location','Individual')";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT user_id FROM `users` WHERE email='$email' ";
    $result2 = mysqli_query($conn,$sql2);
    echo var_dump($result2);
    $row2=mysqli_fetch_assoc($result2);
    $ind_id=$row2['user_id'];

    $age = $_POST['age'];
    $serve=$_POST['need'];
    


    $sql3 = "INSERT INTO individual_users (ind_uid,age,serve_as) VALUES ($ind_id,$age,'$serve')";
    $result3 = mysqli_query($conn,$sql3);

    $count=count($_POST['select_domain']);
   
    for($i=0; $i<$count; $i++){
        echo $_POST['select_domain'][$i] .'<br>';
        $selectedOption=$_POST['select_domain'][$i] ;
        $sql4 = "INSERT INTO ind_interest (ind_id,interest) VALUES ($ind_id,'$selectedOption')";
        $result3 = mysqli_query($conn,$sql4);
    }
    header("refresh:0;url = individual_signup.php");
    


 
}
?>