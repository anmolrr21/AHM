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
    <title>Search | ConnecTTogether</title>
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
                    $num = mysqli_num_rows($result9);
                    if($result9 && $num<=1){
                        $row9 = mysqli_fetch_assoc($result9);
                        echo $row9['intro'];
                    }
                    else{
                        echo $temp; 
                    }
                }else{
                    $sql9 = "SELECT * FROM `org_users` where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
                    $result9 = mysqli_query($conn,$sql9);
                    $num = mysqli_num_rows($result9);
                    if($result9 && $num<=1){
                        $row9 = mysqli_fetch_assoc($result9);
                        echo $row9['intro'];
                    }
                    else{
                        echo $temp; 
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

    
    <!------------------------Display of search results--------------------------->
    <div class="notifyBox">
        <div class="notifyHeading">
            <h5>Search Results</h5>
            <p><i class="fa fa-bookmark fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
        $nameFound = $_POST['search'];
        $sql = "SELECT * from `users` where MATCH (name) against ('$nameFound')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $num = mysqli_num_rows($result);
        }
        else{
            $num=0;
        }
        if($num>0){
            while($row=mysqli_fetch_assoc($result)){
                echo'<div class="rightSuggest">
                    <img src="images/user.png">
                    <div class="part">
                        <h5>'.$row['name'].'</h5>
                        <p>'.$row['type'].'<p>
                        <form method="post" action="/AHM/viewProfile.php?forName='.$row['user_id'].'">
                                <input type="submit" value="View Profile">
                        </form>
                    </div>
                </div>';
            }
        }
        else{
            echo'<div class="notifyBox belowBox">
                    <div class="noNotify">
                        <i class="fa fa-exclamation-triangle fa-4x" aria-hidden="true" style="color:red"></i>
                        <h4>No Results Found!</h4>
                    </div>
                </div>';
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
