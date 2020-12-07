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
    <!-- Including common files -->
    <!-- alter table users add FULLTEXT(`name`) -->
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
                echo'<p class="these">'.$num.'</p>';
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
                        <button>View Profile</button>
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



    <!-- Right section of home -->

    <div class="rightCorner">
        <div class="rightFirst">
            <h5>Add to your Feed</h5>
            <p><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true" style="color:black"></i></p>
        </div>
        <hr>
        <?php
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
                            <button>Connect</button>
                        </div>
                        
                    </div>';
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
</body>

</html>