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
    .introBox{
        height:125px;
        width:800px;
        margin-top:15px;
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

<div id="myModal8" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close close8">&times;</span>
                <h2>Your Connections</h2>
            </div>
            <div class="modal-body" style="overflow-y: scroll;">
            <?php
                $name = $_SESSION["username"];
                $sql8 = "SELECT * FROM `users` where `name`='$name'";
                $result8 = mysqli_query($conn,$sql8);
                $row8 = mysqli_fetch_assoc($result8);
                $id8 = $row8['user_id'];
                $sql = "SELECT * FROM `users` where `name`<>'$name'";
                $result = mysqli_query($conn,$sql);
                $check=0;
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['user_id'];
                    $sql2 = "SELECT * FROM `connections` where ((`userid`='$id' and `connection_id`='$id8' and `requestStatus`=1) or (`userid`='$id8' and `connection_id`='$id' and `requestStatus`=1))";
                    $result2 = mysqli_query($conn,$sql2);
                    $num2 = mysqli_num_rows($result2);
                    if($num2>0){
                        $check=1;
                        $sql4 = "SELECT * FROM `users` where `user_id`='$id'";
                        $result4 = mysqli_query($conn,$sql4);
                        $row4 = mysqli_fetch_assoc($result4);
                        echo'<div class="rightSuggest">
                            <img src="images/user.png">
                            <div class="part">
                                <h5>'.$row4['name'].'</h5>
                                <p style="margin-left:-1px;margin-top:-20px">'.$row4['type'].'</p>
                                <form method="post" action="/AHM/viewProfile.php?forName='.$id.'">
                                    <button type="submit">View Profile</button>
                                </form>
                            </div>
                        </div>';
                    }
                }
                if($check==0){
                    echo'<h4>No Connections Yet...</h4>';
                }
            ?>
            </div>
        </div>
    </div>

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
              $sql1 = "SELECT * FROM `connections` where (`userid`='$id' or `connection_id`='$id') and `requestStatus`=1";
              $result1 = mysqli_query($conn,$sql1);
              $num = mysqli_num_rows($result1);
              if(!$num){
                $total = 0;
              }
              else{
                $total = $num;
              }
              echo'<p style="font-size:26px;margin-left:330px;"><b>'.$row['location'].'<b></p><br><br>
                <button onclick="modalDisplay8()" style="color:blue;margin-top:125px;font-size:24px;margin-left:295px;background:#fff;border:none;">'.$total.' connections</button>';
            ?>
        </div>
    </div>
    <div id="edit-div"><a href="/AHM/editmyprofile.php"><button class="edit-btn">Edit</button></a></div>
    
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
            <div class="about" style="margin-top:25px;">
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

    



    <div class="postBox" style="margin-top:20px;box-shadow: 0 3px 7px rgba(0,0,0,0.3);">
        <h4 id="sharetext" style="margin-top:25px;font-size:24px;"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Share an article, photo, video or ideas</h4>
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
    <div class="introBox">
        <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">Intro
            </p>
        <p style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;">"'.$row["intro"].'"</p>
        '
        ?>
        </div>

   
        <div class="about" style="margin-top: 10px;height:60px;">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:20px;">Your Posts
                </p> 
        </div>
        
    <div id="mypost">
        <?php
            $nameOfUser = $_SESSION["username"];
            $sql9 = "SELECT * FROM `users` where `name`='$nameOfUser'";
            $result9 = mysqli_query($conn,$sql9);
            $row9 = mysqli_fetch_assoc($result9);
            $id9 = $row9['user_id'];
            $i=0;
            $j=111111;
            $k= "#commentForm".strval($i);
            $l = "hideTobe".strval($j);
            $sql = "SELECT * FROM `posts` where `user_id`='$id'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $sql2 = "SELECT * FROM `user_profile` where `userid`='$id9'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $nextid = $row['post_id'];
                $sql4 = "SELECT * FROM `comments` where `post_id`='$nextid'";
                $result4 = mysqli_query($conn,$sql4);
                $num = mysqli_num_rows($result4);
                echo'<div id="'.$row['post_id'].'" class="share onlyPost" style="margin-left:3%;width:500px;">
                        <div class="topNamePic">
                            <img src="images/user.png">
                            <div class="nameDetail">
                                <h5>'.$row9['name'].'</h5>';
                                if($row2!=Null){
                                echo '<p style="margin-left:-5px;">'.$row2['bio'].'</p>';
                            }
                                echo '<p style="margin-left:-5px;margin-top:1px;">22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
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
                            <a class="like" onclick="updateLike('.$j.')" style="margin-left:-50px"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
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
                                        $id9 = $row4['user_commented_id'];
                                        $sql9 = "SELECT * FROM `users` where `user_id`='$id9'";
                                        $result9 = mysqli_query($conn,$sql9);
                                        $row9 = mysqli_fetch_assoc($result9);
                                        echo'<div class="perComment">
                                                <img src="images/user.png">
                                                <div class="contentComment">
                                                <h5>'.$row9['name'] .'</h5>
                                                <p>1m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                                <p class="'.$k.'">'.$row4['comment'].'</p>
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
                                            <h5>'.$_SESSION["username"] .'</h5>
                                            <p>1m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                            <p class="'.$k.'">blank</p>
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
            
        ?> 
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


    var modal8 = document.getElementById("myModal8");
    modal8.style.display = "none";
    var span = document.getElementsByClassName("close8")[0];

    function modalDisplay8() {
        modal8.style.display = "block";
    }

    span.onclick = function() {
        modal8.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal8.style.display = "none";
        }
    }

    // Displaying comment section 
    function myFunc(y) {
        if (document.getElementById(y).style.display == "none") {
            document.getElementById(y).style.display = "block";
        } else {
            document.getElementById(y).style.display = "none";
        }
    }
    //For comments
    $('.comment').on('submit', function(event) {
        event.preventDefault();
        var comment = $(this).children('#comment').val();
        var comment1 = comment;
        var id12 = $(this).parents()[1]['childNodes'];
        id12 = id12[3]['children'];
        id12 = id12[id12.length - 1].id;
        var id = $(this).parents()[2].id;
        $.ajax({
            url: "addComment.php",
            method: "POST",
            data: {
                comment: comment,
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                if (data.error != '') {
                    $('.comment').reset();
                    $('.comment').html(data.error);
                }
            }
        });
        $(this).children('#comment').val('');
        loadComment(id12, comment1);

        function loadComment(x, y) {
            document.getElementById(x).style.display = "flex";
            document.getElementById(x).childNodes[3].children[2].innerHTML = y;
            console.log(document.getElementById(x).childNodes[3].children[2].innerHTML)
        }
    });
        
    //Putting likes into db
    $('.like').on('click', function(event) {
        event.preventDefault();
        var id = $(this).parents()[1].id;
        $.ajax({
            url: "likeUpdate.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                $(this).children('#comment').val() = "";
                if (data.error != '') {
                    $('#commentForm').reset();
                    $('#comment').html(data.error);
                }
            }
        });

    });

    //Updating likes on post
    function updateLike(z) {
        var count = document.getElementById(z).innerHTML
        var numCount = count.substring(51, 53);
        var sym = count.substring(0, 51);
        var nextCount = Number(numCount) + 1;
        document.getElementById(z).innerHTML = sym + nextCount + " Likes";
    }

    
    </script>

</body>

</html>