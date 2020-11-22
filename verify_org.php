<?php
    include 'common/_dbconnect.php';
    $approve=$_GET['ap'];
    $userid=$_GET['orgid'];
    echo $approve;
    echo $userid;
    if($approve=='true'){
       $sql="UPDATE `org_users` SET `status` = '1' WHERE `org_users`.`Org_uid` = $userid";
       $result=mysqli_query($conn, $sql);
    }
    else{
        $sql="UPDATE `org_users` SET `status` = '0' WHERE `org_users`.`Org_uid` = $userid";
        $result=mysqli_query($conn, $sql);
        
    }
    header("location:/AHM/admin.php#ad-sect")


?>