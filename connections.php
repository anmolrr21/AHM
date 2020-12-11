<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
    if(empty($_SESSION["username"])){
        header("location:/AHM/login.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Connections | ConnecTTogether</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
    <?php include 'css/home.css';
    include 'css/navbar.css';
    ?>
    </style>
</head>

<body>
    <!---------------------- Including common files ----------------------------------->

    <?php
        include 'commonNavbar.php';
        include 'common/_dbconnect.php';
    ?>


    <!--------------------- Left Section Of home--------------------------------------->

    <div class="leftCorner">
        <div class="emptyFree"></div>
        <img src="images/user.png">
        <h5><?php echo $_SESSION["username"];?></h5>
        <p><?php
                $nameOfUser = $_SESSION["username"];
                $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $id = $row['user_id'];
                $temp = "Your Intro";
                if( $_SESSION["type"] == "Individual"){
                    $sql9 = "SELECT * FROM `individual_users` where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
                    $result9 = mysqli_query($conn,$sql9);
                    if(!$result9){
                        echo $temp;
                    }
                    else{
                        $row9 = mysqli_fetch_assoc($result9);
                        echo $row9['intro'];
                    }
                }else{
                    $sql9 = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
                    $result9 = mysqli_query($conn,$sql9);
                    if(!$result9){
                        echo $temp;
                    }
                    else{
                        $row9 = mysqli_fetch_assoc($result9);
                        echo $row9['intro'];
                    } 
                } 
        ?></p>
        <hr>
        <h5 class="that">Your Connections</h5>
        <?php
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $id = $row['user_id'];
            $sql1 = "SELECT * FROM `connections` where (`userid`='$id' or `connection_id`='$id') and `requestStatus`=1";
            $result1 = mysqli_query($conn,$sql1);
            if(!$result1){
                echo'<p class="these">0</p>';}
            
            else{
                $num = mysqli_num_rows($result1);
                if($num<10){
                    echo'<p class="these">0'.$num.'</p>';
                }
                else{
                    echo'<p class="these">'.$num.'</p>';
                }
            }
            
        ?>
        <hr>
        <a href="/AHM/myprofile.php">View Profile</a>
    </div>

    <div class="leftBottom">
        <div class="footer">
            <div class="linkTitle">
                <h4>About Us</h4>
                <small>Request Demo</small><br>
                <small>FAQs</small>
            </div>

            <div class="linkTitle">
                <h4>Support</h4>
                <small>Features</small><br>
                <small>Contact Us</small>
            </div>
            <div class="linkTitle">
                <h4>Explore</h4>
                <small>Find a nonprofit</small><br>
                <small>Corporate solution</small>
            </div>
        </div>
        <div class="copyrightText">
            <img src="images/logo.png">
            <small>Copyright &#169; 2020 ConnecTTogether</small>
        </div>
    </div>

    <!------New Connection Requests Sections and People You may Know section----------------------------->
    <div class="notifyBox">
        <div class="notifyHeading">
            <h5>Connection Requests</h5>
            <p><i class="fa fa-bookmark fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $id = $row['user_id'];
            $sql1 = "SELECT * FROM `connections` where `connection_id`='$id' and `requestStatus`=0";
            $result1 = mysqli_query($conn,$sql1);
            if(!$result1){
                $num1 = 0;
            }
            else{
                $num1 = mysqli_num_rows($result1);
            }
            if($result1 && $num1>0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $otherid = $row1['userid'];
                    $sql2 = "SELECT * FROM `users` where `user_id`='$otherid'";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    if($row2['type']=='Individual'){
                        $sql7 = "SELECT * FROM `individual_users` where `ind_uid`='$otherid'";
                        $result7 = mysqli_query($conn,$sql7);
                        $row7 = mysqli_fetch_assoc($result7);
                        echo'<div class="rightSuggest">
                            <img src="images/user.png">
                            <div class="part">
                                <h5>'.$row2['name'].'</h5>
                                <p>'.$row7['intro'].'</p>
                                <form method="POST" action="/AHM/updateRequest.php">
                                    <input type="text" value="'.$otherid.'" name="done" style="display:none">
                                    <input type="submit" name="accept" value="Accept">
                                    <input type="submit" name="reject" value="Reject"> 
                                </form>
                            </div>
                        </div>';
                    }
                    else{
                        $sql7 = "SELECT * FROM `org_users` where `Org_uid`='$otherid'";
                        $result7 = mysqli_query($conn,$sql7);
                        $row7 = mysqli_fetch_assoc($result7);
                        echo'<div class="rightSuggest">
                            <img src="images/user.png">
                            <div class="part">
                                <h5>'.$row2['name'].'</h5>
                                <p>'.$row7['intro'].'</p>
                                <form method="POST" action="/AHM/updateRequest.php">
                                    <input type="text" value="'.$otherid.'" name="done" style="display:none">
                                    <input type="submit" name="accept" value="Accept">
                                    <input type="submit" name="reject" value="Reject"> 
                                </form>
                            </div>
                        </div>';
                    }
                    
                }
            }
        ?>
    </div>

    <?php
        $nameOfUser = $_SESSION["username"];
        $sql = "SELECT `user_id` FROM `users` where `name`='$nameOfUser'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['user_id'];
        $sql12 = "SELECT * FROM `connections` where `connection_id`='$id";
        $result12 = mysqli_query($conn,$sql12);
        $num12=0;
        if($result12){
            $num12 = mysqli_num_rows($result12);}
        else{
            $num12=0;
        }
        if($num12=0){
            echo'<div class="notifyBox belowBox">
                <div class="noNotify">
                    <i class="fa fa-check-square-o fa-3x" aria-hidden="true" style="color:green"></i>
                    <h4>No new Requests!</h4>
                    <p>You will be notified when new requests arrives...</p>
                </div>
            </div>';
        }
    ?>

    <!---------------------People you want to connect with section------------------->
    <div class="notifyBox belowBox">
        <div class="notifyHeading">
            <h5>You can connect with..</h5>
            <p><i class="fa fa-bookmark fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
            $name = $_SESSION["username"];
            $sql = "SELECT * FROM `users` where `name`<>'$name'";
            $result = mysqli_query($conn,$sql);
            $i = 0;
            $j = "pending".strval($i) ;
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['user_id'];
                $sql2 = "SELECT * FROM `connections` where `userid`=$id or `connection_id`=$id";
                $result2 = mysqli_query($conn,$sql2);
                $num2 = mysqli_num_rows($result2);
                if(!$num2){ 
                    echo'<div class="rightSuggest">
                            <img src="images/user.png">
                            <div class="part">
                                <h5>'.$row['name'].'</h5>
                                <p>'.$row['type'].'</p>
                                <form method="post" action="/AHM/viewProfile.php?forName='.$id.'">
                                    <input type="submit" value="View Profile">
                                </form>
                                <form method="get" class="connect">
                                    <input type="submit" id="'.$row['user_id'].'" value="Connect">
                                </form>
                                <input type="button" value="Pending..." id="'.$j.'" style="display:none;">
                                
                                </div>
                        </div>';
                }
                $i = $i + 1;
                $j = "pending".strval($i) ;
            }
            
        ?>
    </div>

    <!--------------------Right section of home ----------------------------------->

    <div class="rightCorner">
        <div class="rightFirst">
            <h5>Recommendations</h5>
            <p><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
            $name = $_SESSION["username"];
            $sql2 = "SELECT * FROM `users` where `name`<>'$name' ORDER BY RAND() LIMIT 3";
            $result2 = mysqli_query($conn,$sql2);
            while($row = mysqli_fetch_assoc($result2)){
                $id = $row['user_id'];
                $sql1 = "SELECT * FROM `user_profile` where `userid`='$id'";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($result1);
                if($row1==null){
                    $bio = $row['type'];
                }
                echo'<div class="rightSuggest">
                        <img src="images/user.png">
                        <div class="part">
                            <h5>'.$row['name'].'</h5>
                            <p>'.$row['type'].'</p>
                            <form method="post" action="/AHM/viewProfile.php?forName='.$row['user_id'].'">
                                <input id="'.$row['user_id'].'" type="submit" value="View Profile">
                            </form>
                            </div>
                    </div>';
            }
        ?>
        <a href="/AHM/recommendation.php" target="_self" style="margin-left:150px">View More</a>
    </div>
    
    <!-- <div class="rightBottom">
        <h5>Raise Funds</h5>
        <p><em>"Having something extra is always great because you are with the opportuinity to grab the blessings
                by donating."</em></p>
        <button>DONATE <i class="fa fa-check-circle" aria-hidden="true"></i></button>
        <h6>Donate for cause, donate for change</h6>
    </div>
     -->
    <script>
        $('.connect').on('submit',function(event){
            event.preventDefault();
            var id = $(this)[0].children[0].id;
            $.ajax({
                url:"sendRequest.php",
                method:"POST",
                data: {id:id},
                dataType: "JSON",
                success: function(data){
                    if(data.error != '')
                    {
                        $('.comment').reset();
                        $('.comment').html(data.error);
                    }
                }
            });
            $(this[0]).attr('value','Pending...');
        });
    </script>
</body>

</html>

