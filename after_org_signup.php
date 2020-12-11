<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';

    $user_email=$_SESSION["logged_in_email"];
    
    $need=$_POST['need'];
    if($need=='v'){
        $org_need='Volunteers';
    }
    else if($need=='d'){
        $org_need='Volunteers';
    }
    else if($need=='vd'){
        $org_need='Volunteers and Donors';
    }

    
    $org_desc=$_POST['textarea_desc'];
    $sql="SELECT * from users where email='$user_email' ";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_id=$row['user_id'];

    $sql0="UPDATE `org_users` SET `description` = '$org_desc', `need` = '$org_need' WHERE `org_users`.`Org_uid` = $user_id;";
    $result0 = mysqli_query($conn,$sql0);

    $other_domain= $_POST['other_domain'];

    $count=count($_POST['select_domain']);
   
    for($i=0; $i<$count; $i++){
        echo $_POST['select_domain'][$i] .'<br>';
        $selectedOption=$_POST['select_domain'][$i] ;
        if($selectedOption=="Food"){
            $selectedOption="Food Distribution";
        }
        elseif($selectedOption=="Women"){
            $selectedOption="Women Safety";
        }
        
        $sql_domain="INSERT INTO `org_domain` (`org_id`, `domain`) VALUES ($user_id, '$selectedOption')";
       $result_domain = mysqli_query($conn,$sql_domain);
        
       
    }
   
    
    if($other_domain!=""){
        echo $other_domain;
        $sql1="SELECT * FROM domains_available ORDER BY sno DESC LIMIT 1";
        $result1 = mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $others_sno=$row1['sno'];
        $sno=$others_sno;
        echo $sno;
        $sql2="DELETE FROM `domains_available` WHERE `domain` = 'Others' ";
        $result2 = mysqli_query($conn,$sql2);

        $sql3="INSERT INTO `domains_available` (`sno`, `domain`) VALUES ($sno, '$other_domain')";
        $result3 = mysqli_query($conn,$sql3);
        echo var_dump($result3);

        $sql_other="INSERT INTO `org_domain` (`org_id`, `domain`) VALUES ($user_id, '$other_domain')";
        $result_other = mysqli_query($conn,$sql_other);

        $sql4="INSERT INTO `domains_available` (`sno`, `domain`) VALUES ($sno+1, 'Others')";
        $result4 = mysqli_query($conn,$sql4);
        echo var_dump($result4);
        
    } 
   
    $sql7="UPDATE `org_users` SET `status` = '2' WHERE `org_users`.`Org_uid` = $user_id ";
    $result7=mysqli_query($conn, $sql7); 
    
    header("location:/AHM/homePage.php");
    
      
 }
?>
