<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content ="width=device-width, initial scale=1.0"/>
    <link rel="stylesheet" href="css/myprofile.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
      .header{
      background-color:  #0e76a8;
      margin:-10px;
      margin-left:-10px;
      height:90px;

      }
      .logo{
      margin-top:-70px;
   
    }
    </style>
    <title>My profile</title>
    </head>
    <body>
    <div class="header" >
    </div>
    <div class="logo">
    <img src="images/logo.png" style="margin-left:10px;margin-top:40px;margin:-10px;"width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div>
   
    <div class="name">
      <div class="sub-name">
        <p> <?php echo $_SESSION["username"];?> </p><br><br><br>
        <p style="font-size:26px;margin-left:230px;"><b>Thane, Maharashtra-India<b></p><br><br>
        <p style="color:blue;font-size:24px;margin-left:295px;">200 connections</p>
      </div>
    </div>
    <div class="user">
    <image src=images/user.png height="170px">
    </div>

    <div class="about">
      <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">About<p>
      <p style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;">"Social welfare enthusiast"<p>

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
    <div class="exp">
      <p style="margin-left:15px;font-size:24px;margin-top:10px;">Past Experiences</p><br><br>
      <p style="margin-left:45px;font-size:21px;margin-top:30px;color:#333333;">Volunteer for swachh bharat abhiyan</p><br><br>
      <p style="margin-left:65px;font-size:19px;margin-top:30px;color:#595959;"> * At muskan foundation on 21st august</p><br><br>
      <hr style="margin-left:40px; margin-top:30px; color:lightgrey;"><br><br>
      <p style="margin-left:45px;font-size:21px;margin-top:-30px;color:#333333;">Donater for an orphanage</p><br><br>
      <p style="margin-left:65px;font-size:19px;margin-top:-30px;color:#595959;" onlick="/#"> * At milaap NGO on 1st december</p><br><br>

    </div>
    <div class="edit">
      <p style="font-size:21px;width:100%;margin-left:30px;margin-top:35px;">Want to edit your profile?</p>
      <a href="editmyprofile.php">
      <button style="background-color:lightskyblue;color:black;padding:15px;width:80px; border-radius:10px;margin-top:75px;margin-left:110px;border:0px;">Edit<button>
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
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 3){
        counter = 1;
      }
    }, 2000);
    </script>
    
    </body>
</html>