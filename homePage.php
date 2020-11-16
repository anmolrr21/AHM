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

    <div class="share onlyBox2">
        <h4 id="share"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Share an article, photo, video or
            idea</h4>
        <ul>
            <li><i class="fa fa-picture-o" aria-hidden="true" style="color:green"></i><a href="#">Photo</a></li>
            <li><i class="fa fa-video-camera" aria-hidden="true"></i><a href="#">Video</a></li>
            <li><i class="fa fa-pencil" aria-hidden="true" style="color:orange"></i><a href="#">Article</a></li>
            <li><i class="fa fa-file-text" aria-hidden="true" style="color:lightblue"></i><a href="#">Document</a></li>

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
                        <a type="button" onclick="myFunction('.$i.')"><i class="fa fa-comments-o" aria-hidden="true"></i>Comment</a>
                        <hr>
                    </div>
                    <div id="'.$i.'" class="secComment">
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
    function myFunction(y) {
        if(document.getElementById(y).style.display == "none"){
            document.getElementById(y).style.display = "block";
        }else{
            document.getElementById(y).style.display = "none";
        }
    }
    </script>
</body>

</html>