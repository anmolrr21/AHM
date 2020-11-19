<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'common/_dbconnect.php';
$sql1="SELECT * FROM domains_available ORDER BY sno DESC LIMIT 1";
        $result1 = mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $others_sno=$row1['sno'];
        $sno=$others_sno;
        $add_domain = $_POST['add_domain'];
        
        $sql2="DELETE FROM `domains_available` WHERE `domain` = 'Others' ";
        $result2 = mysqli_query($conn,$sql2);

        $sql3="INSERT INTO `domains_available` (`sno`, `domain`) VALUES ($sno, '$add_domain')";
        $result3 = mysqli_query($conn,$sql3);
       

        $sql4="INSERT INTO `domains_available` (`sno`, `domain`) VALUES ($sno+1, 'Others')";
        $result4 = mysqli_query($conn,$sql4);
        
}
header("location:/AHM/admin.php");
 ?>       