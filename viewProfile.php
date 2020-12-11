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
        background-color: white;
        border-radius:10px;
        box-shadow: 0 3px 3px rgba(0,0,0,0.3);
        }
        .viewUser,.viewUser1,.viewUser2{
        background-color: #0e76a8;
        width: 150px;
        height: 50px;
        color: #fff;
        border: 2px solid;
        border-radius: 5px;
        outline: none;
    }

    </style>
    <title>My profile</title>
</head>

<body>
    <?php include 'common/_dbconnect.php';
          include 'commonNavbar.php';
    ?>

    <div class="name">
        <div class="sub-name">
            <p><?php
                    $forthisPage = $_GET['forName'];
                    $sql1 = "SELECT * FROM `users` where `user_id`='$forthisPage'";
                    $result1 = mysqli_query($conn,$sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    echo $row1['name'];?> </p><br><br><br>
            <?php
              $forthisPage = $_GET['forName'];
              $nameOfUser = $_SESSION["username"];
              $sql = "SELECT * FROM `users` where `user_id`='$forthisPage'";
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
                <button onclick="modalDisplay8()" style="color:blue;margin-top:125px;font-size:24px;margin-left:295px;background:#fff;border:none;">'.$total.' connections</button>';
            ?>
        </div>
    </div>
    
    <div class="user" style="margin-top:-320px">
        <image src=images/user.png height="170px">
    </div>

    <?php
        $forthisPage = $_GET['forName'];
        $nameOfUser = $_SESSION["username"];
        $sql = "SELECT * FROM `users` where `name`='$nameOfUser'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['user_id'];
        $sql2 = "SELECT * FROM `connections` where (`userid`='$id' and `connection_id`='$forthisPage') or (`userid`='$forthisPage' and `connection_id`='$id') and `requestStatus`=1";
        $result2 = mysqli_query($conn,$sql2);
        $num2 = mysqli_num_rows($result2);
        $sql3 = "SELECT * FROM `connections` where (`userid`='$id' and `connection_id`='$forthisPage') or (`userid`='$forthisPage' and `connection_id`='$id') and `requestStatus`=0";
        $result3 = mysqli_query($conn,$sql3);
        $num3 = mysqli_num_rows($result3);
        if($num==1){ 
            echo'<div style="margin-top: 300px; margin-bottom: -200px;margin-left:200px">
                    <input type="button" class="viewUser" id="'.$forthisPage.'" value="Connected">
            </div>';}
        else{
            if($num3==1){
                echo'<div style="margin-top: 300px; margin-bottom: -200px;margin-left:200px">
                    <input type="button" class="viewUser1" id="'.$forthisPage.'" value="Pending">
            </div>';
            }
            else{
                echo'<div style="margin-top: 300px; margin-bottom: -300px;margin-left:200px">
                <input type="button" class="viewUser2" id="'.$forthisPage.'" value="Connect">
        </div>'; 
            }
        }
    ?>

    <?php
        $forthisPage = $_GET['forName'];
        $sql = "SELECT * FROM `users` where `user_id`='$forthisPage'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        if( $type == "Individual"){
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=$forthisPage";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        } else {
            $nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `org_users` where `Org_uid`=$forthisPage";
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
    
    
    <?php
        $forthisPage = $_GET['forName'];
        $sql = "SELECT * FROM `users` where `user_id`='$forthisPage'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        if( $type == "Individual"){
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=$forthisPage";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            echo '
            <div class="about" style="margin-top:25px;">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;font-weight:bold;">About
               </p>
               <div class="serve">
               <h3>You want to serve as:</h3>
               <p>'.$row["serve_as"].'</p>
               </div><br>';
               $sql1 = "SELECT * FROM `ind_interest` where `ind_id`=$forthisPage";
                $result1 = mysqli_query($conn,$sql1);
               echo '<div class="domain">
               <h3>Your Domain of Interest:</h3>';
                
                echo '<div class="row">';
                $interest = "";
            while($row1 = mysqli_fetch_array($result1)){
                $interest = $interest.'   '.$row1["interest"];
            }
            echo '<p style="margin-right:5px">'.$interest.'</p>';
            echo '</div></div>';

            echo '<div class="desc"><h3>Description:</h3>
            <p style="font-size:18px;font-weight:light;color:#333333;">"'.$row["about"].'"
               </p>
            </div></div>
           ';

        } else {
            $sql = "SELECT * FROM `org_users` where `Org_uid`=$forthisPage";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            echo '
            <div class="about" style="margin-top:25px;">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;font-weight:bold;">About
               </p>
               <div class="serve">
               <h3>Current Need for Us:</h3>
               <p>'.$row["need"].'</p>
               </div><br>';
               $sql1 = "SELECT * FROM `org_domain` where `org_id`=$forthisPage";
                $result1 = mysqli_query($conn,$sql1);
               echo '<div class="domain">
               <h3>Your Domain of Interest:</h3>';
                
                echo '<div class="row">';
                $interest = "";
            while($row1 = mysqli_fetch_array($result1)){
                $interest = $interest.'   '.$row1["domain"];
            }
            echo '<p style="margin-right:5px">'.$interest.'</p>';
            echo '</div></div>';

            echo '<div class="desc"><h3>Description:</h3>
            <p style="font-size:18px;font-weight:light;color:#333333;">"'.$row["description"].'"
               </p>
            </div></div>
           ';

        }

       

    ?>
    
    <?php
        $forthisPage = $_GET['forName'];
        $sql = "SELECT * FROM `users` where `user_id`='$forthisPage'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        if( $type == "Individual"){
            //$nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `individual_users` where `ind_uid`=$forthisPage";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        }else{
            //$nameOfUser = $_SESSION["username"];
            $sql = "SELECT * FROM `org_users` where `Org_uid`=$forthisPage";
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
    

   
        <div class="about" style="margin-top: 20px;height:60px;">
            <p style="font-size:24px;color:black;margin-left:20px; margin-top:20px;">Posts
                </p> 
        </div>
        
    <div id="mypost" style="margin-top:20px">
        <?php
            $forthisPage = $_GET['forName'];
            $i=0;
            $j=111111;
            $k= "#commentForm".strval($i);
            $l = "hideTobe".strval($j);
            $sql = "SELECT * FROM `posts` where `user_id`='$forthisPage'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if($num>0){
                while($row = mysqli_fetch_assoc($result)){
                    $intro = "";
                    if( $_SESSION["type"] == "Individual"){
                        $sql9 = "SELECT * FROM `individual_users` where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
                        $result9 = mysqli_query($conn,$sql9);
                        $num = mysqli_num_rows($result9);
                        if($result9 && $num==1){
                            $row9 = mysqli_fetch_assoc($result9);
                            $intro =  $row9['intro'];
                        }
                    }
                    else{
                        $sql9 = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
                        $result9 = mysqli_query($conn,$sql9);
                        if($result9 && $num<=1){
                            $row9 = mysqli_fetch_assoc($result9);
                            $intro = $row9['intro'];
                        }  
                    }
                    $nextid = $row['post_id'];
                    $sql4 = "SELECT * FROM `comments` where `post_id`='$nextid'";
                    $result4 = mysqli_query($conn,$sql4);
                    $num = mysqli_num_rows($result4);
                    echo'<div id="'.$row['post_id'].'" class="share onlyPost" style="margin-left:-330px;width:500px;">
                            <div class="topNamePic">
                                <img src="images/user.png">
                                <div class="nameDetail">
                                    <h5>'.$nameOfUser.'</h5>
                                    <p style="margin-left:-5px;">'.$intro.'</p>';
                                    $timeT = strtotime($row['postedTime']);
                                    echo '<p style="margin-left:-5px;margin-top:1px;">'.date("d/m/y h:i a",$timeT).' <i class="fa fa-globe" aria-hidden="true"></i></p>
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
                                                    <h5>'.$row9['name'] .'</h5>';
                                                    $timeT1 = strtotime($row4['time']);
                                                    echo '<p style="margin-top:-35px">'.date("d/m/y h:i a",$timeT1).' <i class="fa fa-globe" aria-hidden="true"></i></p>
                                                    <p>'.$row4['comment'].'</p>
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
            }
            else{
                echo'<div class="about" style="margin-top:20px;margin-left:-322px;height:60px;">
                <div class="noNotify" style="margin-left:350px;">
                    <i class="fa fa-check-square-o fa-3x" aria-hidden="true" style="color:green;margin-top:20px"></i>
                    <h4 style="margin-left:-20px">No Posts Yet!</h4>
                </div>
            </div>';
            }
            
        ?> 
    </div>

    
    

    <script type="text/javascript">
    $('.viewUser2').click(function(){
            var id = $(this)[0].id;
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
            $(this).val('Pending');
        });
    </script>

</body>

</html>