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
    <title>Notifications | ConnecTTogether</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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

    <!-------------------------Notification area---------------------------------->
        
    <div class="notifyBox">
        <div class="notifyHeading">
            <h5>Recent</h5>
            <p><i class="fa fa-bookmark fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php 
            $name = $_SESSION["username"];
            $sql = "SELECT * FROM `users` where `name`='$name'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result); 
            $currentUserId = $row['user_id'];
            $sql1 = "SELECT * FROM `connections` where `connection_id`='$currentUserId'";
            $result1 = mysqli_query($conn,$sql1);
            $num1=0;
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
                                    <p>sent you a connection request.</p>
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
                                    <p>sent you a connection request.</p>
                                </div>
                            </div>';
                    }
                
                }  
            }
            $sql2 = "SELECT * FROM `connections` where `userid`=$currentUserId and `requestStatus`=1 and `acceptedNoti`=1";
            $result2 = mysqli_query($conn,$sql2);
            $num2=0;
            if(!$result2){
                $num2 = 0;
            }
            else{
                $num2 = mysqli_num_rows($result2);
            }
            if($result2 && $num2>0){
                while($row2 = mysqli_fetch_assoc($result2)){
                    $otherid = $row2['connection_id'];
                    $sql3 = "SELECT * FROM `users` where `user_id`='$otherid'";
                    $result3 = mysqli_query($conn,$sql3);
                    $row3 = mysqli_fetch_assoc($result3);
                    if($row3['type']=='Individual'){
                        $sql7 = "SELECT * FROM `individual_users` where `ind_uid`='$otherid'";
                        $result7 = mysqli_query($conn,$sql7);
                        $row7 = mysqli_fetch_assoc($result7);
                        echo'<div class="rightSuggest">
                                <img src="images/user.png">
                                <div class="part">
                                    <h5>'.$row3['name'].'</h5>
                                    <p>'.$row7['intro'].'</p>
                                    <p>accepted your connection request.</p>
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
                                    <h5>'.$row3['name'].'</h5>
                                    <p>'.$row7['intro'].'</p>
                                    <p>accepted your connection request.</p>
                                </div>
                            </div>'; 
                    }
                }
            }
        ?>

        <?php
            $name = $_SESSION["username"];
            $sql = "SELECT * FROM `users` where `name`='$name'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result); 
            $currentUserId = $row['user_id'];
            $sql1 = "SELECT * FROM `posts` where `user_id`='$currentUserId'";
            $result1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($result1);
            if($num>0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $postId = $row1['post_id'];
                    $sql2 = "SELECT * FROM `likes` where `post_id`='$postId'";
                    $result2 = mysqli_query($conn,$sql2);
                    $num = mysqli_num_rows($result2);
                    if($num>0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $userLikedId = $row2['user_liked_id'];
                            $sql3 = "SELECT * FROM `users` where `user_id`='$userLikedId'";
                            $result3 = mysqli_query($conn,$sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            echo'<div class="rightSuggest">
                                    <img src="images/user.png">
                                    <div class="part">
                                        <h5>'.$row3['name'].'</h5>
                                        <p>liked your post.</p>
                                    </div>
                            </div>';
                        }
                    }
                }
            }
        ?>

        <?php
            $name = $_SESSION["username"];
            $sql = "SELECT * FROM `users` where `name`='$name'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result); 
            $currentUserId = $row['user_id'];
            $sql1 = "SELECT * FROM `posts` where `user_id`='$currentUserId'";
            $result1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($result1);
            if($num>0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $postId = $row1['post_id'];
                    $sql2 = "SELECT * FROM `comments` where `post_id`='$postId'";
                    $result2 = mysqli_query($conn,$sql2);
                    $num = mysqli_num_rows($result2);
                    if($num>0){
                        while($row2 = mysqli_fetch_assoc($result2)){
                            $userCommentedId = $row2['user_commented_id'];
                            $sql3 = "SELECT * FROM `users` where `user_id`='$userCommentedId'";
                            $result3 = mysqli_query($conn,$sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            echo'<div class="rightSuggest">
                                    <img src="images/user.png">
                                    <div class="part">
                                        <h5>'.$row3['name'].'</h5>
                                        <p>commented on your post.</p>
                                    </div>
                            </div>';
                        }
                    }
                }
            }
        ?>
    </div>

    <!--------------------Right section of home ----------------------------------->

    <div class="rightCorner">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/c1.jpg" style="width:350px;height:520px">
            </div>
            <div class="mySlides fade">
                <img src="images/c2.jpg" style="width:350px;height:520px">
            </div>
            <div class="mySlides fade">
                <img src="images/c3.jpg" style="width:350px;height:520px">
            </div>
            <div class="mySlides fade">
                <img src="images/c4.jpg" style="width:350px;height:520px">
            </div>
        </div>
        <br>
    </div>
    <div class="rightBottom">
        <div class="dotsStay" style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <!------------------------ Javascript-------------------------------------------->
    <script>
        //For slider
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" dactive", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " dactive";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        // Displaying comment section 
        function myFunc(y) {
            if (document.getElementById(y).style.display == "none") {
                document.getElementById(y).style.display = "block";
            } else {
                document.getElementById(y).style.display = "none";
            }
        }
    </script>


</body>

</html>

