<?php
if(!isset($_SESSION)){ 
    session_start(); 
}
include 'common/_dbconnect.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
//     require_once 'System.php';
//    var_dump(class_exists('System', false));
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $pname = $_FILES['file']['tmp_name'];
}

    //proof ka empty check nahi kiya h

    if(empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($phone) || empty($location)){
        header("location:/AHM/org_signUp.php?status=empty");
    }
    else{
        if($password != $cpassword){
            header("location:/AHM/org_signUp.php?status=password");
        }
        else{
            require_once 'VerifyEmail.class.php'; 
            $mail = new VerifyEmail();
            $mail->setStreamTimeoutWait(20);
            $mail->Debug= TRUE; 
            $mail->Debugoutput= 'html'; 
            $mail->setEmailFrom('2018.megha.shahri@ves.ac.in');
            if($mail->check($email)){ 
                echo 'Email &lt;'.$email.'&gt; is exist!'; 
                    
                $sqll = "INSERT INTO users (name,email,password,phone,location,type) VALUES 
                ('$name','$email','$password','$phone','$location','Organization')";
                $resultt = mysqli_query($conn,$sqll);

                $query1="SELECT * FROM `users` where email='$email' and type='Organization'";
                $result1 = mysqli_query($conn,$query1);
                $row=mysqli_fetch_assoc($result1);
            
                $current_user_id= $row['user_id'];

                $query2 = "INSERT INTO org_users (Org_uid,status) VALUES ($current_user_id,null)";
                $result2 = mysqli_query($conn,$query2);
                //var_dump ($result2);

                if (isset($_POST["submitt"])){
                    $fileName = basename($_FILES["file"]["name"]); 
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
                    // Allow certain file formats 
                    $allowTypes = array('jpg','png','jpeg','gif'); 
                    if(in_array($fileType, $allowTypes)){ 
                        $image = $_FILES['file']['tmp_name']; 
                        $imgContent = addslashes(file_get_contents($image)); 
                        // $target_dir = 'images/';
                        // echo $target_dir;
                        // $target_file = $target_dir . basename($_FILES["file"]["name"]);
                        // echo $target_file;
                        // move_uploaded_file($pname,$target_file);
                        // $img_path=$_FILES['file']['name'];
                        // $blob = fopen($target_file, "rb");
                        // echo $blob;
                        // $encoded_image = base64_encode(file_get_contents($_FILES['file']['name']));
                        // $encoded_image = 'data:image/jpeg;base64,' . $encoded_image;
                        $sql = "UPDATE org_users set proof='$imgContent' where Org_uid=$current_user_id ";
                        $resullt = mysqli_query($conn,$sql);
                        header("location:/AHM/message.php?verify=process");
                    }
        
                }

            }
            else{
                if(verifyEmail::validate($email)){ 
            
                    header("location:/AHM/org_signUp.php?status=email");
                 }
                else{ 
                    header("location:/AHM/org_signUp.php?status=email");
                } 
            }
    
}
    }
?>