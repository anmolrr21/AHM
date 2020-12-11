<?php
    include 'common/_dbconnect.php';
    $name=$_POST['username'];
    $email=$_POST['email'];
    $query=$_POST['query'];
    echo $name .'<br>'.
    $email.'<br>'.
    $query;
    
    // ini_set('SMTP', "smtp.gmail.com");
    // ini_set('smtp_port', "587");
    // ini_set('sendmail_from', $email);
    // ini_set('sendmail_path', "C:xampp\sendmail\sendmail.exe\ -t");
        

    $to = "meghashahri2000@gmail.com" ;
    $subject = 'Query/Suggestion';
    $headers = "From: ".$email;
    // $headers .= "MIME-Version:1.0" ."\r\n";
    // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $send_mail=mail($to, $subject, $query, $headers);
    if($send_mail){
        echo 'if';
        //header("location:/AHM/contact.php?sent=true");
        
    }
    else{
        echo 'else';
        //header("location:/AHM/contact.php?sent=false");

    }


?>