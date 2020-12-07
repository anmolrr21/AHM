<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/myprofile.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
     <?php include 'css/home.css';
             include 'css/navbar.css';
    ?> 
    .header {
        background-color: #0e76a8;
        margin: 10px;
        margin-left: 10px;
        height: 90px;

    }

    .logo {
        margin-top: 70px;

    }
    .intro{
        height:125px;
        width:800px;
        margin-top:15px;
        margin-left: 150px;
        background-color: white;
        border-radius:10px;
        box-shadow: 0 3px 3px rgba(0,0,0,0.3);
        }

    </style>
    <title>My profile</title>
</head>

<body>
    <?php include 'common/_dbconnect.php';
          include 'commonNavbar.php';
    ?>

    <!-- <div class="header">
    </div>
    <div class="logo">
        <img src="images/logo.png" style="margin-left:10px;margin-top:40px;margin:-10px;" width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div> -->

    <div class="name">
        <div class="sub-name">
            <p> <?php echo $_SESSION["username"];?> </p><br><br><br>
            <?php
              $nameOfUser = $_SESSION["username"];
              $sql = "SELECT * FROM `users` where `name`='$nameOfUser'";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result);
              $id = $row['user_id'];
              $sql1 = "SELECT * FROM `connections` where `userid`='$id' or `connection_id`='$id' and `requestStatus`=1";
              $result1 = mysqli_query($conn,$sql1);
              $num = mysqli_num_rows($result1);
              if(!$num){
                $total = 0;
              }
              else{
                $total = $num;
              }
              echo'<p style="font-size:26px;margin-left:330px;"><b>'.$row['location'].'<b></p><br><br>
                <p style="color:blue;font-size:24px;margin-left:295px;">'.$total.' connections</p>';
            ?>
        </div>
    </div>
    <div class="user">
        <image src=images/user.png height="170px">
    </div>
    
    <?php
        $nameOfUser = $_SESSION["username"];

        if( $_SESSION["type"] == "Individual"){
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            echo '
            <div class="about">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">About
               </p>
            <p style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;">"'.$row["about"].'"
               </p>
            </div>
           ';

        } else {
            $sql = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            echo '
            <div class="about">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">About
               </p>
            <p style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;">"'.$row["description"].'"
               </p>
            </div>
           ';

        }

       

    ?>

    
    <!-- Ingeneral popup for post -->

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Create a post</h2>
            </div>
            <div class="modal-body">
                <form action="/AHM/addPost.php?onlyContent=true" method="POST">
                    <div class="nameFrame">
                        <img src="images/user.png">
                        <h5><?php echo $_SESSION["username"];?></h5>
                    </div>
                    <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="What's in your mind?"
                        autofocus></textarea>
                    <hr>
                    <div class="bottomSec">
                        <button id="contentButton" type="submit">POST</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- pop up for posting an image + written content -->

    <div id="myModal1" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close close1">&times;</span>
                <h2>Create a post</h2>
            </div>
            <div class="modal-body">
                <form action="/AHM/addPost.php?imageContent=true" method="POST" enctype="multipart/form-data">
                    <div class="nameFrame">
                        <img src="images/user.png">
                        <h5><?php echo $_SESSION["username"];?></h5>
                    </div>
                    <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="What's in your mind?"
                        autofocus></textarea>
                    <hr>
                    <div class="bottomSec">
                        <label for="img">Select image:</label>
                        <input type="file" id="img" name="img" accept="image/*">
                        <button>POST</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- pop up for posting an video+written content -->

    <div id="myModal2" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close close2">&times;</span>
                <h2>Create a post</h2>
            </div>
            <div class="modal-body">
                <form action="/AHM/addPost.php?videoContent=true" method="POST" enctype="multipart/form-data">
                    <div class="nameFrame">
                        <img src="images/user.png">
                        <h5><?php echo $_SESSION["username"];?></h5>
                    </div>
                    <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="What's in your mind?"
                        autofocus></textarea>
                    <hr>
                    <div class="bottomSec">
                        <label for="img">Select video:</label>
                        <input type="file" id="img" name="video" accept="video/*">
                        <button>POST</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="onlyBox2">
        <h4 style="margin-top:25px;padding:15px;font-size:24px;"> Share an article, photo, video or ideas</h4>
        <ul>
            <li><i class="fa fa-picture-o" aria-hidden="true" style="color:green"></i><button
                    onclick="modalDisplay2()">Picture</button></li>
            <li><i class="fa fa-video-camera" aria-hidden="true"></i><button onclick="modalDisplay3()">Video</button>
            </li>
            <li><i class="fa fa-pencil" aria-hidden="true" style="color:orange"></i><button
                    onclick="modalDisplay()">Article</button></li>
        </ul>
    </div>
    <?php
        // echo $_SESSION["username"];

        if( $_SESSION["type"] == "Individual"){
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        }else{
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        }

        echo '
    <div class="exp">
        <p style="margin-left:15px;font-size:24px;margin-top:10px;">Past Experiences</p><br><br>
        <p style="margin-left:45px;font-size:21px;margin-top:30px;color:#333333;"> '.$row["exp1"].'
        </p><br><br>
        <!-- <p style="margin-left:65px;font-size:19px;margin-top:30px;color:#595959;"> * At muskan foundation on 21st august
        </p><br><br> -->
        <hr style="margin-left:40px; margin-top:30px; color:lightgrey;"><br><br>
        <p style="margin-left:45px;font-size:21px;margin-top:-30px;color:#333333;">'.$row["exp2"].'</p><br><br>
        <!-- <p style="margin-left:65px;font-size:19px;margin-top:-30px;color:#595959;" onlick="/#"> * At milaap NGO on 1st
           december</p><br><br> -->
            '
    ?>


    </div>
    <?php
        // echo $_SESSION["username"];

        if( $_SESSION["type"] == "Individual"){
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        } else {
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        }
      

        echo '
    <div class="intro" >
        <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">Intro
            </p>
        <p style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;">"'.$row["intro"].'"</p>
        '
        ?>
        </div>

    <!-- <div class="about">
        <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">Your Posts
            </p> -->
    </div>
    <!-- <?php
        $i=0;
        $j=111111;
        $k= "#commentForm".strval($i);
        $l = "hideTobe".strval($j);
        $sql = "SELECT * FROM `posts`";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['user_id'];
            $sql1 = "SELECT * FROM `users` where `user_id`='$id'";
            $result1 = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $sql2 = "SELECT * FROM `user_profile` where `userid`='$id'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $nextid = $row['post_id'];
            $sql4 = "SELECT * FROM `comments` where `post_id`='$nextid'";
            $result4 = mysqli_query($conn,$sql4);
            $num = mysqli_num_rows($result4);
            echo'<div id="'.$row['post_id'].'" class="share onlyPost">
                    <div class="topNamePic">
                        <img src="images/user.png">
                        <div class="nameDetail">
                            <h5>'.$row1['name'].'</h5>';
                            if($row2!=Null){
                            echo '<p>'.$row2['bio'].'</p>';
                        }
                            echo '<p>22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                        </div>
                    </div>';
                    if($row['article']!=NULL){
                        echo'<div class="postImage">
                        <h4>'.$row['article'].'</h4>
                    </div>';
                    }
                    if($row['image_posted']!=NULL){
                    echo'<div class="postImage">
                        <img src="images/'.$row['image_posted'].'"/>
                    </div>';}
                    if($row['video_posted']!=NULL){
                    echo'<div class="postImage" style="margin-left:-380px">
                        <video id="myVideo" width="440" height="240" style="margin-left: 400px;" controls>
                            <source src="videos/'.$row['video_posted'].'" type="video/'.$row['videoExt'].'">
                                Your browser does not support the video tag.
                        </video>
                    </div>';}
                    echo'<div class="countL">
                        <h6 id="'.$j.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i> '.$row['likes_count'].' Likes</h6>
                        <h6><i class="fa fa-comments" aria-hidden="true"></i> '.$row['comments_count'].' comments</h6>
                    </div>
                    <hr>
                    <div class="likeButton">
                        <a class="like" onclick="updateLike('.$j.')"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
                        <a type="button" onclick="myFunc('.$i.')"><i class="fa fa-comments-o" aria-hidden="true"></i>Comment</a>
                        <hr>
                    </div>
                    <div id="'.$i.'" class="secComment" style="display: none;">
                        <div class="area">
                            <img src="images/user.png">
                            <form method="POST" class="comment">  
                                <input type="text" id="comment" name="comment" placeholder="  Leave your thoughts...">
                                <button id="commentSubmit" type="submit"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i><br>POST</button>
                            </form>
                            
                        </div>
                        
                        <div class="commentSection">
                            <h4>Comments</h4>';
                            if($num>0){
                                while($row4 = mysqli_fetch_assoc($result4)){
                                    echo'<div class="perComment">
                                            <img src="images/user.png">
                                            <div class="contentComment">
                                                <h5>Hitesh Dhameja</h5>
                                                <p>22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                                <p>'.$row4['comment'].'</p>
                                                <div class="likes">
                                                    <a href="#">Like</a>
                                                    <a href="#">Comment</a>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }
                            
                            // else{
                            //     echo'<div id="noComment" class="perComment '.$l.'">
                            //             <div class="contentComment">
                            //                 <h5>No Comments Yet! Be the first to comment</h5>
                            //             </div>
                            //         </div>';
                            // }
                            echo'<div id="'.$k.'" class="perComment" style="display:none;">
                                    <img src="images/user.png">
                                    <div class="contentComment">
                                        <h5>Hitesh Dhameja</h5>
                                        <p>1m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                        <p class="'.$k.'">blank</p>
                                        <div class="likes">
                                            <a href="#">Like</a>
                                            <a href="#">Comment</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>';
                
            $i = $i + 1;
            $j = $j + 1;
            $k= "commentForm".strval($i); 
            $l = "hideTobe".strval($j);
        }
        
    ?> -->

    <div class="edit">
        <p style="font-size:21px;width:100%;margin-left:30px;margin-top:35px;">Want to edit your profile?</p>
        <a href="editmyprofile.php">
            <button
                style="background-color:lightskyblue;color:black;padding:15px;width:80px; border-radius:10px;margin-top:75px;margin-left:110px;border:0px;">Edit</button>
    </div>
    <div class="slider">
        <div class="slides">
            <!--radio buttons start-->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--radio buttons end-->
            <!--slide images start-->
            <div class="slide first">
                <img src="images/ahmq1.png" alt="">
            </div>
            <div class="slide">
                <img src="images/ahmq2.jpg" alt="">
            </div>
            <div class="slide">
                <img src="images/ahmq3.jpg" alt="">
            </div>

            <!--slide images end-->
            <!--automatic navigation start-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
                <div class="auto-btn4"></div>
            </div>
            <!--automatic navigation end-->
        </div>
        <!--manual navigation start-->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
        <!--manual navigation end-->
    </div>

    <script type="text/javascript">
    var counter = 1;
    setInterval(function() {
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 3) {
            counter = 1;
        }
    }, 2000);

    //Modals
    //Modal1-General Modal
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
    var span = document.getElementsByClassName("close")[0];

    function modalDisplay() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //Modal2-Image+content
    var modal2 = document.getElementById("myModal1");
    modal2.style.display = "none";
    var span = document.getElementsByClassName("close1")[0];

    function modalDisplay2() {
        modal2.style.display = "block";
    }

    span.onclick = function() {
        modal2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal2.style.display = "none";
        }
    }

    //Modal3-Video+content
    var modal3 = document.getElementById("myModal2");
    modal3.style.display = "none";
    var span = document.getElementsByClassName("close2")[0];

    function modalDisplay3() {
        modal3.style.display = "block";
    }

    span.onclick = function() {
        modal3.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal3.style.display = "none";
        }
    }
    </script>

</body>

</html>