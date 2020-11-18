<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | ConnecTTogether</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <style>
    <?php include 'css/home.css'?>;
    </style>
</head>

<body>
    <?php
        include 'commonNavbar.php';
    ?>
    
    <div class="leftCorner">
        <div class="emptyFree"></div>
        <img src="images/user.png">
        <h5>Hitesh Dhameja</h5>
        <p>Volunteer | Fund Raiser | Mind Blowing</p>
        <hr>
        <h5 class="that">Following</h5>
        <p class="these">45</p>
        <h5 class="that">Followers</h5>
        <p class="these">99</p>
        <hr>
        <a>View Profile</a>
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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Create a post</h2>
            </div>
            <div class="modal-body">
                <div class="nameFrame">
                    <img src="images/user.png">
                    <h5>Hitesh Dhameja</h5>
                </div>
                <textarea id="w3review" name="w3review" rows="4" cols="60" placeholder="What's in your mind?"
                    autofocus></textarea>
                <hr>
                <div class="bottomSec">
                    <a><i class="fa fa-picture-o fa-lg" aria-hidden="true"></i></a>
                    <a><i class="fa fa-video-camera fa-lg" aria-hidden="true"></i></a>
                    <a><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>
                    <button>POST</button>
                </div>
            </div>
        </div>
    </div>

    <div class="share onlyBox2">
        <h4 id="share"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Share an article, photo, video or
            idea</h4>
        <ul>
            <li><i class="fa fa-picture-o" aria-hidden="true" style="color:green"></i><button onclick="modalDisplay()">Picture</button></li>
            <li><i class="fa fa-video-camera" aria-hidden="true"></i><button onclick="modalDisplay()">Video</button></li>
            <li><i class="fa fa-pencil" aria-hidden="true" style="color:orange"></i><button onclick="modalDisplay()">Article</button></li>
            <li><i class="fa fa-file-text" aria-hidden="true" style="color:lightblue"></i><button onclick="modalDisplay()">Document</button></li>

        </ul>
    </div>

    

    <?php
        $i=0;
        while($i<5){
            echo'<div class="share onlyPost">
                    <div class="topNamePic">
                        <img src="images/user.png">
                        <div class="nameDetail">
                            <h5>Hitesh Dhameja</h5>
                            <p>Volunteer | Fund Raiser | Mind Blowing</p>
                            <p>22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                        </div>
                    </div>
                    <div class="postImage">
                        <img src="https://images.freeimages.com/images/small-previews/5c6/sunset-jungle-1383333.jpg">
                    </div>
                    <div class="countL">
                        <h6><i class="fa fa-thumbs-up" aria-hidden="true"></i> 30Likes</h6>
                        <h6><i class="fa fa-comments" aria-hidden="true"></i> 3 comments</h6>
                    </div>
                    <hr>
                    <div class="likeButton">
                        <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like</a>
                        <a type="button" onclick="myFunc('.$i.')"><i class="fa fa-comments-o" aria-hidden="true"></i>Comment</a>
                        <hr>
                    </div>
                    <div id="'.$i.'" class="secComment">
                        <div class="area">
                            <img src="images/user.png">
                            <form>  
                                <input type="text" placeholder="  Leave your thoughts...">
                            </form>
                            <button><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i><br>POST</button>
                        </div>
                        <div class="commentSection">
                            <h4>Comments</h4>
                            <div class="perComment">
                                <img src="images/user.png">
                                <div class="contentComment">
                                    <h5>Hitesh Dhameja</h5>
                                    <p>Volunteer | Fund Raiser | Mind Blowing</p>
                                    <p>22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil asperiores sint debitis quis
                                        quia
                                        dolores temporibus similique sunt odit reiciendis. Aut aperiam architecto exercitationem
                                        eaque
                                        autem ab beatae velit iusto.</p>
                                    <div class="likes">
                                        <a href="#">Like</a>
                                        <a href="#">Comment</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="commentSection">
                        <div class="perComment">
                            <img src="images/user.png">
                            <div class="contentComment">
                                <h5>Hitesh Dhameja</h5>
                                <p>Volunteer | Fund Raiser | Mind Blowing</p>
                                <p>22m ago. <i class="fa fa-globe" aria-hidden="true"></i></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil asperiores sint debitis quis
                                    quia
                                    dolores temporibus similique sunt odit reiciendis. Aut aperiam architecto exercitationem
                                    eaque
                                    autem ab beatae velit iusto.
                                    </p>
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
        }
    ?>
    
    <script>
    function myFunc(y) {
        if (document.getElementById(y).style.display == "none") {
            document.getElementById(y).style.display = "block";
        } else {
            document.getElementById(y).style.display = "none";
        }
    }
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
    </script>
</body>

</html>