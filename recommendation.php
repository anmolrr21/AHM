<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Connections | ConnecTTogether</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <style>
    <?php include 'css/home.css';
    include 'css/navbar.css';
    ?>
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


    <div class="notifyBox">
        <div class="notifyHeading">
            <h5>Public</h5>
            <p><i class="fa fa-bookmark fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <div class="rightSuggest">
            <img src="images/user.png">
            <div class="part">
                <h5>Hitesh Dhameja</h5>
                <p>Volunteer | Fund Raiser | Mind Blowing</p>
                <button>View Profile</button>
            </div>
        </div>
        <div class="rightSuggest">
            <img src="images/user.png">
            <div class="part">
                <h5>Hitesh Dhameja</h5>
                <p>Volunteer | Fund Raiser | Mind Blowing</p>
                <button>View Profile</button>
            </div>
        </div>
    </div>

    <div class="notifyBox belowBox">
        <div class="notifyHeading">
            <h5>NGO</h5>
            <p><i class="fa fa-calendar fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <div class="rightSuggest">
            <img src="images/user.png">
            <div class="part">
                <h5>Mahima- Mahila Jyoti Foundation</h5>
                <p>Volunteer | Women Empowerment | Mind Blowing</p>
                <button>View Profile</button>
            </div>
        </div>
        <div class="rightSuggest">
            <img src="images/user.png">
            <div class="part">
                <h5>Mahima- Mahila Jyoti Foundation</h5>
                <p>Volunteer | Women Empowerment | Mind Blowing</p>
                <button>Profile</button>
            </div>
        </div>
    </div>

    <div class="rightCorner">
        <div class="rightFirst">
            <h5>Add to your Feed</h5>
            <p><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
            $m=0;
            while($m<3){
                echo'<div class="rightSuggest">
                        <img src="images/user.png">
                        <div class="part">
                            <h5>Hitesh Dhameja</h5>
                            <p>Volunteer | Fund Raiser | Mind Blowing</p>
                            <button>View Profile</button>
                            <button>Connect</button>
                        </div>
                        
                    </div>';
            $m = $m + 1;
            }
        ?>
        <a href="/AHM/recommendation.php">View More</a>
    </div>
    <div class="rightBottom">
        <h5>Raise Funds</h5>
        <p><em>"Having something extra is always great because you are with the opportuinity to grab the blessings
                by donating."</em></p>
        <button>DONATE <i class="fa fa-check-circle" aria-hidden="true"></i></button>
        <h6>Donate for cause, donate for change</h6>
    </div>

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