<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ConnecTTogether</title>
    <link rel="stylesheet" href="css/admin.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js_files/admin.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/0cf079388a.js"></script> -->
</head>

<body>
    <!----------------------HomePage-------------------------------------------->
    <section id="header">
        <ul id="top" class="topnav">
            <li><img src="images/logo.png" width="90px"></li>
            <li><a href="index.html">ConnecTTogether</a></li>
            <li><a class="nav1 active" href="#">Preview Website</a></li>
            <li><a class="nav1" href="#about">Log Out</a></li>

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
                <li><a id="dash_link" onclick="func_dash()">DashBoard</a></li>
                <li><a id="ad_link" onclick="func_ad()">Approve/Decline Organizations</a>
                <li>
                <li><a id="delete_link" onclick="deleteUser()">Delete user</a>
                <li>
                <li><a id="view_link" onclick="func_viewComp()">View Complaints</a>
                <li>
                <li><a id="add_domain" onclick="func_addDomain()">Add Domain</a>
                <li>
                    <!-- <li><a id="del_domain" href="#ad-sect">Delete Domain</a><li> -->

            </ul>
        </div>


        <div class="dashboard" id="dashboard">

            <h1>Welcome to admin dashboard</h1>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <h3>Total Users</h3>
                        <p>150</p>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <h3>Total Organizations</h3>
                        <p>70</p>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <h3>Total Individuals</h3>
                        <p>80</p>
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
                    include 'common/_dbconnect.php';
                    $sql1 = "SELECT * FROM users where type='Organization' " ;
                    if($result = mysqli_query($conn, $sql1)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo '<div class="name-btn">
                                        <p>' .$row['name'] . '<span><button>View</button></span></p>
                                        
                                    </div><br>';

                            }
                        }
                    }
                ?>

            </div>
        </div>

        <div class="delete-user" id="delete-user">
            <?php echo "hj"; ?>
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
                            echo "<th>Complaint Id</th>";
                            echo "<th>User Name</th>";
                            echo "<th>Complaint</th>";
                        echo "</tr>";
                    while($row1 = mysqli_fetch_array($result1)){
                        $user_id=$row1['user_id'];
                        $sql2="SELECT * FROM users where user_id=$user_id ";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_array($result2);
                        $user_name=$row2['name'];
                        echo "<tr>";
                            echo "<td>" . $row1['complaint_id'] . "</td>";
                            echo "<td>" . $user_name . "</td>";
                            echo "<td>" . $row1['complaint'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }} 
        ?>





        </div>

        <!-- <div class="add-domain" id="add-domain">
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
  
    </div> -->


    </div>
    
 

        
        
        
