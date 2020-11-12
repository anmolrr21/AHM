<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
    
    $org_need=$_POST['need'];
    $org_desc=$_POST['textarea_desc'];
    echo $org_need . $org_desc. '<br>';
    $other_domain= $_POST['other_domain'];
   
    foreach ($_POST['select_domain'] as $selectedOption)
        echo $selectedOption.'<br>';
    
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

        $sql4="INSERT INTO `domains_available` (`sno`, `domain`) VALUES ($sno+1, 'Others')";
        $result4 = mysqli_query($conn,$sql4);
        echo var_dump($result4);
        
    }    
    
      
 }
?>
