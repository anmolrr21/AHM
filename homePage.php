
<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | ConnecTTogether</title>
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
    <!-- Including common files -->

    <?php
        include 'commonNavbar.php';
        include 'common/_dbconnect.php';
    ?>


    <!-- Left Section Of home -->

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
                $sql1 = "SELECT `bio` FROM `user_profile` where `userid`='$id'";
                $result1 = mysqli_query($conn,$sql1);
                $row1 = mysqli_fetch_assoc($result1);
                if($row1 !=Null){
                    echo $row1['bio'];
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
            $sql1 = "SELECT * FROM `connections` where `userid`='$id' or `connection_id`='$id' and `requestStatus`=1";
            $result1 = mysqli_query($conn,$sql1);
            $num = mysqli_num_rows($result1);
            if(!$num){
                echo'<p class="these">0</p>';
            }
            else{
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

    <!-- Middle Section of home -->

    <div class="onlyBox2">
        <h4 id="share"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Share an article, photo, video or
            idea</h4>
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
                    echo'<div class="postImage videoPosted">
                        <video id="myVideo" controls>
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
        
    ?>

    <!-- Right section of home -->

    <div class="rightCorner">
        <div class="rightFirst">
            <h5>Add to your Feed</h5>
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
                            <p>'.$bio.'</p>
                            <button>View Profile</button>
                        </div>
                        
                    </div>';
            }
        ?>
        <a href="/AHM/recommendation.php">View More</a>
    </div>
    
    <div class="rightBottom">
        <h5>Raise Funds</h5>
        <p><em>"Having something extra is always great because you are with the opportuinity to grab the blessings by
                donating."</em></p>
        <button>DONATE <i class="fa fa-check-circle" aria-hidden="true"></i></button>
        <h6>Donate for cause, donate for change</h6>
    </div>

    <!-- Javascript -->
    <script>
        
    // Displaying comment section 
    function myFunc(y) {
        if (document.getElementById(y).style.display == "none") {
            document.getElementById(y).style.display = "block";
        } else {
            document.getElementById(y).style.display = "none";
        }
    }

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
    $('.comment').on('submit',function(event){
        event.preventDefault();
        var comment = $(this).children('#comment').val();
        var comment1 = comment;
        var id12 = $(this).parents()[1]['childNodes'];
        id12 = id12[3]['children'];
        id12 = id12[id12.length-1].id;
        var id = $(this).parents()[2].id;
        $.ajax({
            url:"addComment.php",
            method:"POST",
            data: {comment:comment,
            id:id},
            dataType: "JSON",
            success: function(data){
                if(data.error != '')
                {
                    $('.comment').reset();
                    $('.comment').html(data.error);
                }
            }
        });
        $(this).children('#comment').val('');
        loadComment(id12,comment1);
        function loadComment(x,y){
            document.getElementById(x).style.display="flex";
            document.getElementById(x).childNodes[3].children[2].innerHTML = y;
            console.log(document.getElementById(x).childNodes[3].children[2].innerHTML)
        //     if(next12!=null){
        //         next12.visibility="hidden";
        //    }
        }
    });
    
    //Putting likes into db
    $('.like').on('click',function(event){
        event.preventDefault();
        var id = $(this).parents()[1].id;
        $.ajax({
            url:"likeUpdate.php",
            method:"POST",
            data: {id:id},
            dataType: "JSON",
            success: function(data){
                $(this).children('#comment').val()="";
                if(data.error != '')
                {
                    $('#commentForm').reset();
                    $('#comment').html(data.error);
                }
            }
        });
        
    });

    //Updating likes on post
    function updateLike(z){
            var count = document.getElementById(z).innerHTML
            var numCount = count.substring(51,53);
            var sym = count.substring(0,51);
            var nextCount = Number(numCount) + 1;
            document.getElementById(z).innerHTML = sym+nextCount+" Likes";
        }

    </script>
</body>

</html>