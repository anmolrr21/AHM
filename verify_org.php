<?php
    include 'common/_dbconnect.php';
    $approve=$_GET['ap'];
    $userid=$_GET['orgid'];
    echo $approve;
    echo $userid;
    if($approve=='true'){
       $sql="UPDATE `org_users` SET `status` = '1' WHERE `org_users`.`Org_uid` = $userid";
       $result=mysqli_query($conn, $sql);

       $sql1="SELECT * FROM `users` where user_id=$userid";
       $result1=mysqli_query($conn, $sql1);
       $row1=mysqli_fetch_assoc($result1);

        $to = $row1['email']; 
        $subject = 'Organization approved';
        $message = '
        <html>
        <h2>Congratulations your Organization is verified and approved.Please login to continue further process.<br>Thankyou!</h2><br>
        <a href="/AHM/login.php"><button style="border: 1px solid #0275d8;
        background: #0275d8;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 19px;
        cursor: pointer;
        padding:15px;
        border-radius:3px;
        margin-left:30%;">Continue</button></a>
        </html>';
        $headers = "From: meghashahri@gmail.com" . '\r\n'.
        $headers .= "MIME-Version:1.0" ."\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $send_mail=mail($to, $subject, $message, $headers);
        
    }
    else{
        $sql="UPDATE `org_users` SET `status` = '0' WHERE `org_users`.`Org_uid` = $userid";
        $result=mysqli_query($conn, $sql);

        $sql1="SELECT * FROM `users` where user_id=$userid";
        $result1=mysqli_query($conn, $sql1);
        $row1=mysqli_fetch_assoc($result1);

        $to = $row1['email']; 
        $subject = 'Organization rejected';
        $message = '
        <html>
        <h2>We are very sorry to inform that your organization has not been approved based on the proof provided.<br>
        Sorry you cannot continue to use our system.</h2><br>
        </html>';
        $headers = "From: meghashahri@gmail.com" . '\r\n'.
        $headers .= "MIME-Version:1.0" ."\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        $send_mail=mail($to, $subject, $message, $headers);

        $sql2="DELETE FROM `users` WHERE `users`.`user_id` = $userid";
        $result2=mysqli_query($conn, $sql2);
        
        
    }
    header("location:/AHM/adminPanel.php#ad-sect")


?>