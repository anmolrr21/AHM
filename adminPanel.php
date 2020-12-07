
<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }?>

<?php
    if(!isset($_SESSION["logged_in_email"])){ 
        header("location:/AHM/adminLogin.php?error=login");
       
    }?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ConnecTTogether</title>
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <script src="js_files/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/0cf079388a.js"></script> -->
</head>

<body onload="func_dash()">
    <?php include 'common/_dbconnect.php';?>
    <!----------------------HomePage-------------------------------------------->
    <section id="header">
        <ul id="top" class="topnav">
            <li><img src="images/logo.png" width="90px"></li>
            <li><a href="index.html">ConnecTTogether</a></li>
            
            <li><a class="nav1" href="adminLogout.php">Log Out</a></li>

            <div class="menuIcon" onclick="display()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </ul>
        <!-- <div id="smallS" class="smallS">
                <ul id="small" class="small">
                    <li><a class="nav1 active" href="#" >HOME</a></li>
                    <li><a class="nav1" href="#about">ABOUT US</a></li>
                    <li><a class="nav1" href="#features">WHY US?</a></li>
                    <li><a class="nav1" href="#contact">CONTACT US</a></li>
                    <li class="right nav1"><a href="#">LOGIN</a></li>
                </ul>
            </div> -->


    </section>

    <div class="parts">
    
     <!------------------left----------------------->
        <div class="left-part">
            <ul>
                <li><a id="dash_link" href="#dashboard" onclick="func_dash()">DashBoard</a></li>
                <li><a id="ad_link" href="#ad-sect" onclick="func_ad()">Approve/Decline Organizations</a>
                <li>
                <li><a id="delete_link" href="#delete-user" onclick="deleteUser()">Delete user</a>
                <li>
                <li><a id="view_link" href="#view-comp" onclick="viewComp()">View Complaints</a>
                <li>
                <li><a id="add_domain" href="#add-domain" onclick="addDomain()">Add Domain</a>
                <li>
                

            </ul>
        </div>


        <div class="dashboard" id="dashboard">
          <div class="top-box">

            <h1>Welcome to admin dashboard</h1>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <h3>Total Users</h3>
                       <?php 
                       $sql_count1="SELECT COUNT(*) as count_total from users";
                       $result_c1=mysqli_query($conn, $sql_count1);
                       $row_c1 = mysqli_fetch_array($result_c1);
                       $total_users=$row_c1['count_total'];
                       echo ' <p> '.$total_users . '</p>';
                         ?>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <h3>Total Organizations</h3>
                        <?php 
                            $sql_count2="SELECT COUNT(*) as count_org from users where type='Organization'";
                            $result_c2=mysqli_query($conn, $sql_count2);
                            $row_c2 = mysqli_fetch_array($result_c2);
                            $total_org_users=$row_c2['count_org'];
                            echo ' <p> '.$total_org_users . '</p>';
                         ?>
                        
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <h3>Total Individuals</h3>
                        <?php 
                            $sql_count3="SELECT COUNT(*) as count_ind from users where type='Individual'";
                            $result_c3=mysqli_query($conn, $sql_count3);
                            $row_c3 = mysqli_fetch_array($result_c3);
                            $total_ind_users=$row_c3['count_ind'];
                            echo ' <p> '.$total_ind_users . '</p>';
                         ?>
                       
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="ad-sect" id="ad-sect">
            <div class="top-box">
                <h1>APPROVE/DECLINE ORGANIZATIONS</h1>
            </div>

            <div class="requests">
                <?php 
                    
                    $sql1 = "SELECT * FROM users where type='Organization' " ;

                    if($result = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result) > 0){
                            $count=0;
                            while($row = mysqli_fetch_array($result)){
                                $count=$count+1;
                                $uid=$row['user_id'];
                                $sql = "SELECT proof FROM org_users where Org_uid=$uid";
                                $result_sql = mysqli_query($conn, $sql);
                                $row_sql = mysqli_fetch_assoc($result_sql);
                               
                                $image=$row_sql['proof'];
                                $image_id= $count;
                                
                                echo '<div class="name-btn">
                                        <p>' .$row['name'] . 
                                        '<span><button onclick=display_certi('.$image_id.')>View</button></span>
                                        <span><button onclick=close_certi('.$image_id.')>Close</button></span>';
                                //         echo'
                                //         <img id='.$image_id.' class="img_org" src="images/'.$row_sql['proof'].'"/>
                                //    ';
                                //echo '<img id='.$image_id.' class="img_org" src="'.$row_sql['proof'].'">';
                                //echo '<br>' .'<img id='.$image_id.' class="img_org" src="'.$row_sql['proof'].'"/>';
                                echo '<br>'.'<img id='.$image_id.' class="img_org" src="data:image/jpg;charset=utf8;base64,'.base64_encode($row_sql['proof']).'" />'; 
                                       
                                              
                                    echo '</div>
                                    <div class="btns">
                                   
                                    
                                    <a  href="verify_org.php?ap=true&orgid=' .$uid .'"><button type="button" class="btn btn-success" id=ap'.$image_id.'>Approve</button></a>
                                    <a href="verify_org.php?ap=false&orgid=' .$uid .'"><button type="button" class="btn btn-danger" id=dec'.$image_id.'>Decline</button></a>
                                    </div></p>';

                            }
                        }
                    }
                ?>

            </div>
        </div>

        <div class="delete-user" id="delete-user">
           
            <div class="top-box">
                <h1>DELETE USER</h1>
            </div>
            <div class="details">
                <form method="post" action="delete-user.php">
                    <label for="type">Select User Type:</label>
                    <select name="type" id="type">
                        <option value="Organization">Organization</option>
                        <option value="Individual">Individual</option>
                    </select><br>

                    <div class="detail2">
                        <label for="email">User's Email Id:</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <input type="submit" id="submit_btn" class="button">
                </form>
            </div>
        </div>


        <div class="view-comp" id="view-comp">
            <div class="top-box">
                <h1>COMPLAINT SECTION</h1>
            </div>

            <?php
     include 'common/_dbconnect.php';
            $sql1 = "SELECT * FROM complaint" ;
            if($result1 = mysqli_query($conn, $sql1)){
                if(mysqli_num_rows($result1) > 0){
                    echo "<table id='complaint'>";
                        echo "<tr>";
                            echo "<th>Complaint By</th>";
                            echo "<th>Complaint For</th>";
                            echo "<th>Complaint</th>";
                        echo "</tr>";
                    while($row1 = mysqli_fetch_array($result1)){
                        $complaint_by=$row1['user_id'];
                        $complaint_for=$row1['complaint_for_userid'];
                        $sql2="SELECT * FROM users where user_id=$complaint_by ";
                        $result2 = mysqli_query($conn, $sql2);
                        
                        $sql3="SELECT * FROM users where user_id=$complaint_for ";
                        $result3 = mysqli_query($conn, $sql3);
                        
                        $row2 = mysqli_fetch_array($result2);
                        $row3 = mysqli_fetch_array($result3);
                        
                        $by_user_name=$row2['name'];
                        $for_user_name=$row3['name'];
                        echo "<tr>";
                            echo "<td>" . $by_user_name. "</td>";
                            echo "<td>" . $for_user_name . "</td>";
                            echo "<td>" . $row1['complaint'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }} 
        ?>

        </div>

    <div class="add-domain" id="add-domain">
        <div class="top-box">
            <h1>ADD DOMAIN</h1>
        </div>
        <div class="detail-domain">
            <form method="post" action="add-domain.php">  
                <div class="detail-domain">
                <label for="text">Domain to be added:</label>
                <input type="text" id="add_domain" name="add_domain"></div>
                <input type="submit" id="submit_btn" class="button-domain">
            </form>
        </div>
  
    </div>


    </div>';

