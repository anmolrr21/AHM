<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    require_once 'System.php';
   var_dump(class_exists('System', false));
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $pname = $_FILES['file']['tmp_name'];

    require_once 'VerifyEmail.class.php'; 
    $mail = new VerifyEmail();
    $mail->setStreamTimeoutWait(20);
    $mail->Debug= TRUE; 
    $mail->Debugoutput= 'html'; 
    $mail->setEmailFrom('2018.megha.shahri@ves.ac.in');
    
    
 
    
    // Check if email is valid and exist
    if($mail->check($email)){ 
        echo 'Email &lt;'.$email.'&gt; is exist!'; 
    }elseif(verifyEmail::validate($email)){ 
        echo 'Email &lt;'.$email.'&gt; is valid, but not exist!'; 
    }else{ 
        echo 'Email &lt;'.$email.'&gt; is not valid and not exist!'; 
    } 
    
   
    

    $sqll = "INSERT INTO users (name,email,password,phone,location,proof) VALUES 
    ('$name','$email','$password','$phone','$location','11000')";
    $resultt = mysqli_query($conn,$sqll);
    
    if (isset($_POST["submitt"]))
 {
    $target_dir = 'images/';
    echo $target_dir;
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    echo $target_file;
    move_uploaded_file($pname,$target_file);
    $blob = fopen($target_file, "rb");
    echo $blob;
    $sql = "UPDATE users set proof='$blob' where name='$name' ";
    echo $sql;
    $resullt = mysqli_query($conn,$sql);
    
 }

 header("location:/AHM/org2.php");
 
}
?>