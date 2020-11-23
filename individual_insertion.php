<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $age = $_POST['age'];
    $need=$_POST['need'];
    $domain=$_POST['select_domain'];

    if(empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($phone) || empty($location)
    || empty($age)|| empty($need)|| empty($domain))
  {
    
    header("location:/AHM/individual_signup.php?status=empty");
 }
    else if($password != $cpassword){
        header("location:/AHM/individual_signup.php?status=password");
        
    }
    else{

        require_once 'VerifyEmail.class.php'; 
        $mail = new VerifyEmail();
        $mail->setStreamTimeoutWait(20);
        $mail->Debug= TRUE; 
        $mail->Debugoutput= 'html'; 
        $mail->setEmailFrom('2018.megha.shahri@ves.ac.in');
    
    
 
    if($mail->check($email)){ 

    

    $sql1 = "INSERT INTO users (name,email,password,phone,location,type) VALUES ('$name','$email','$password','$phone','$location','Individual')";
    $result1 = mysqli_query($conn,$sql1);

    $sql2 = "SELECT user_id FROM `users` WHERE email='$email' ";
    $result2 = mysqli_query($conn,$sql2);
    echo var_dump($result2);
    $row2=mysqli_fetch_assoc($result2);
    $ind_id=$row2['user_id'];

    if($need=='v'){
        $serve='Volunteers';
    }
    else if($need=='d'){
        $serve='Volunteers';
    }
    else if($need=='vd'){
        $serve='Volunteers and Donors';
    }


    $sql3 = "INSERT INTO individual_users (ind_uid,age,serve_as) VALUES ($ind_id,$age,'$serve')";
    $result3 = mysqli_query($conn,$sql3);

    $count=count($_POST['select_domain']);
   
    for($i=0; $i<$count; $i++){
        echo $_POST['select_domain'][$i] .'<br>';
        $selectedOption=$_POST['select_domain'][$i] ;
        $sql4 = "INSERT INTO ind_interest (ind_id,interest) VALUES ($ind_id,'$selectedOption')";
        $result3 = mysqli_query($conn,$sql4);
    }
    header("location:/AHM/homePage.php");
}

    elseif(verifyEmail::validate($email)){ 
            
        header("location:/AHM/individual_signup.php?status=email");
    }else{ 
        header("location:/AHM/individual_signup.php?status=email");
    } 
    

    

    }
 
}
?>