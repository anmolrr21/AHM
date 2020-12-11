<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial scale=1.0" />
    <link rel="stylesheet" href="css/edit.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
    <?php include 'css/navbar.css';

    ?>
    body{
      overflow-x: hidden;
    }
    .header {
        background-color: #0e76a8;
        margin: -10px;
        margin-left: -10px;
        height: 90px;

    }

    .logo {
        margin-top: -70px;

    }

    .intro {
        height: 125px;
        width: 800px;
        margin-top: 240px;
        margin-left: 150px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.3);
    }

    .exp {
        height: 350px;
        width: 800px;
        margin-top: 15px;
        margin-left: 150px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.3);
    }

    .Save-btn {
        background-color: #0e76a8;
        width: 80px;
        height: 40px;
        color: #fff;
        border: 1px solid;
        border-radius: 5px;
        outline: none;
    }

    @media screen and (min-width: 1522px) {
        .name {
            margin-left: 400px;
        }

        .user {
            margin-left: 690px;

        }

        .about {
            margin-left: 400px;
            margin-top: -10px;
        }

        .exp {
            margin-left: 400px;
        }

        .intro {
            margin-left: 400px;
            margin-top: 250px;
        }



    }
    </style>
    <title>My profile</title>
</head>

<body>
    <?php include 'common/_dbconnect.php';
          include 'commonNavbar.php';
    ?>
    <?php
       if(isset($_POST["submit"])) {
          $name = $_REQUEST['location'];
          $nameOfUser = $_SESSION["username"];
          $sql = "UPDATE `users`  SET location='$name' where `name`='$nameOfUser'";
          $result = mysqli_query($conn,$sql);
          // header("Location: ./myprofile.php");
      }

      if(isset($_POST["intro"])) {
        $intro = $_REQUEST['introo'];
        $nameOfUser = $_SESSION["username"];
    
        if( $_SESSION["type"] == "Individual"){
          $sql = "UPDATE `individual_users` SET intro='$intro' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        } else {
          $sql = "UPDATE `org_users` SET intro='$intro' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["serve1"])) {
        $serve = $_REQUEST['serve2'];
        $nameOfUser = $_SESSION["username"];
        if( $_SESSION["type"] == "Individual"){
          $sql = "UPDATE `individual_users` SET serve_as='$serve' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["domainAdd"])) {
        $domainn = $_POST['domainT'];
        if( $_SESSION["type"] == "Individual"){
          $nameOfUser = $_SESSION["username"];
          $sql2 = "Select user_id FROM `users` WHERE `name`='$nameOfUser'";
          $result2 = mysqli_query($conn,$sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $id = $row2['user_id'];
          $sql = "INSERT INTO `ind_interest` (`ind_id`, `interest`) VALUES ('$id', '$domainn')";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["domainRemove"])) {
        $domainn = $_REQUEST['domainT'];
        if( $_SESSION["type"] == "Individual"){
          $nameOfUser = $_SESSION["username"];
          $sql2 = "Select user_id FROM `users` WHERE `name`='$nameOfUser'";
          $result2 = mysqli_query($conn,$sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $id = $row2['user_id'];
          $sql = "DELETE FROM `ind_interest` WHERE `ind_interest`.`ind_id` = $id AND `ind_interest`.`interest` = '$domainn'";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["about"])) {
        $about = $_REQUEST['about1'];
        if( $_SESSION["type"] == "Individual"){
          $nameOfUser = $_SESSION["username"];
          $sql = "UPDATE `individual_users` SET about='$about' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
      }

      if(isset($_POST["need"])) {
        $need = $_REQUEST['need3'];
        $nameOfUser = $_SESSION["username"];
        if( $_SESSION["type"] == "Organization"){
          $sql = "UPDATE `org_users` SET need='$need' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["domainOrg"])) {
        $domainn = $_POST['domainThis'];
        if( $_SESSION["type"] == "Organization"){
          $nameOfUser = $_SESSION["username"];
          $sql2 = "Select user_id FROM `users` WHERE `name`='$nameOfUser'";
          $result2 = mysqli_query($conn,$sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $id = $row2['user_id'];
          $sql = "INSERT INTO `org_domain` (`org_id`, `domain`) VALUES ('$id', '$domainn')";
          $result = mysqli_query($conn,$sql);
          $sql2 = "SELECT * FROM `domains_available` where `domain`=$domainn";
          $result2 = mysqli_query($conn,$sql2);
          if($result2){
            $row = mysqli_fetch_assoc($result2);
            if($row<1){
              $sql3 = "INSERT INTO `domains_available` (`sno`, `domain`) VALUES (NULL, '$domainn')";
              $result3 = mysqli_query($conn,$sql3);
            }
          }
        }
      }
      if(isset($_POST["domainRemoveOrg"])) {
        $domainn = $_REQUEST['domainThis'];
        if( $_SESSION["type"] == "Organization"){
          $nameOfUser = $_SESSION["username"];
          $sql2 = "Select user_id FROM `users` WHERE `name`='$nameOfUser'";
          $result2 = mysqli_query($conn,$sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $id = $row2['user_id'];
          $sql = "DELETE FROM `org_domain` WHERE `org_domain`.`org_id` = $id AND `org_domain`.`domain` = $domainn";
          $result = mysqli_query($conn,$sql);
        }
      }
      if(isset($_POST["aboutOrgF"])) {
        $about = $_REQUEST['aboutOrg'];
        if( $_SESSION["type"] == "Individual"){
          $nameOfUser = $_SESSION["username"];
          $sql = "UPDATE `org_users` SET `description` ='$about' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
      }



    //   if(isset($_POST["aboutData"])) {
    //     if( $_SESSION["type"] == "Individual"){
    //     $about = $_REQUEST['aboutData'];
    //     $nameOfUser = $_SESSION["username"];
    //     $sql = "UPDATE `individual_users` SET about='$about' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
    //     $result = mysqli_query($conn,$sql);
    //   } else {
    //     $about = $_REQUEST['aboutData'];
    //     $nameOfUser = $_SESSION["username"];
    //     $sql = "UPDATE `org_users` SET description='$about' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
    //     $result = mysqli_query($conn,$sql);
    //   }
    //     // header("Location: ./myprofile.php");
    // }
    if(isset($_POST["expp1"])) {
      $nameOfUser = $_SESSION["username"];
      $exp1 = $_REQUEST['exp1'];
      $exp2 = $_REQUEST['exp2'];

      if( $_SESSION["type"] == "Individual"){
        if($exp1 && !$exp2){
          $sql = "UPDATE `individual_users` SET exp1='$exp1' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
        else{
          if($exp2 && !$exp1){
            $sql = "UPDATE `individual_users` SET exp2='$exp2' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
          }
          else{
            if($exp1 && $exp2){
              $sql = "UPDATE `individual_users` SET exp1='$exp1',exp2='$exp2' where `ind_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
              $result = mysqli_query($conn,$sql);
            }
          }
        }
      } else {
        if($exp1 && !$exp2){
          $sql = "UPDATE `org_users` SET exp1='$exp1' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
          $result = mysqli_query($conn,$sql);
        }
        else{
          if($exp2 && !$exp1){
            $sql = "UPDATE `org_users` SET exp2='$exp2' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
            $result = mysqli_query($conn,$sql);
          }
          else{
            if($exp1 && $exp2){
              $sql = "UPDATE `org_users` SET exp1='$exp1',exp2='$exp2' where `Org_uid`=(Select user_id FROM `users` WHERE `name`='$nameOfUser')";
              $result = mysqli_query($conn,$sql);
            }
          }
        }
      }
      
      // header("Location: ./myprofile.php");
  }
    
  
    
    // header("Location: ./myprofile.php");

    ?>
    <!-- <div class="header" >
    </div>
    <div class="logo">
    <img src="images/logo.png" style="margin-left:10px;margin-top:40px;margin:-10px;"width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div> -->

    <div class="name">
        <div class="sub-name">
            <p>
                <?php
          echo $_SESSION["username"];
          $nameOfUser = $_SESSION["username"];
          $sql = "SELECT * FROM `users` where `name`='$nameOfUser'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);

          echo '
          </p><br><br><br>
          <form method="post">
          <input type="text" name="location" style="width:190px;height:30px;margin-top:120px;margin-left:270px;"placeholder="Enter location" value="'.$row["location"].'">
          
          <input type="submit" class="Save-btn" name="submit" value="Save">
      
         
          </form>
         ';
         ?>
                <br><br>
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
             echo '
                <p style="color:blue;font-size:24px;margin-left:295px;margin-top:-25px; position:relative">'.$total.' connections</p>';
            ?>

        </div>
    </div>
    <div class="user">
        <image src=images/user.png height="170px">
    </div>


    <?php

    echo '
     <div class="intro" style="margin-bottom:30px;">
     <p style="font-size:24px;color:black;margin-left:20px; margin-top:10px;">Intro
        </p>
        <form method="post">
     <input name="introo" type="text" placeholder="Enter your Intro/Bio" maxlength="30" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px; margin-top:50px;"></p>
     <input type="submit" name="intro" class="Save-btn" placeholder="Enter your Intro/Bio" value="Save">
        </form>
     </div>
    
    ';
    ?>

    <div class="about">
      <?php
      if($_SESSION["type"] == "Individual"){
        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Serve As
        </p><br><br><br>';
        echo'<form method="post">
                  <select id="serve" name="serve2" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;">
                    <option value="Volunteers">Volunteers</option>
                    <option value="Donors">Donors</option>
                    <option value="Volunteers and Donors">Volunteers and Donors</option>
                  </select>
                <input type="submit" style="margin-left:130px; margin-top:-28px;" class="Save-btn" name="serve1" value="Save">
              </form>';

        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Domain
        </p><br><br><br>';
        $sql3 = "SELECT * FROM `domains_available`";
        $result3 = mysqli_query($conn,$sql3);
        echo'<form method="post">
        <select id="serve" name="domainT" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;">';
            while($row3 = mysqli_fetch_assoc($result3)){
              echo'<option value="'.$row3['domain'].'">'.$row3['domain'].'</option>';}
                  echo'</select>
                <input type="submit" style="margin-left:190px; margin-top:-28px;" class="Save-btn" name="domainAdd" value="Save">
                <input type="submit" style="margin-left:30px; margin-top:-28px;" class="Save-btn" name="domainRemove" value="Remove">
              </form>';

        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Your Description
        </p><br><br><br>';
        echo'<form method="post">
        <input name="about1" type="text" placeholder="Enter your description" maxlength="250" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;"></p>
                <input type="submit" style="margin-left:110px; margin-top:-28px;" class="Save-btn" name="about" value="Save">
              </form>';
      }

      else{
        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Need
        </p><br><br><br>';
        echo'<form method="post">
                  <select id="serve" name="need3" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;">
                    <option value="Volunteers">Volunteers</option>
                    <option value="Donors">Donors</option>
                    <option value="Volunteers and Donors">Volunteers and Donors</option>
                  </select>
                <input type="submit" style="margin-left:130px; margin-top:-28px;" class="Save-btn" name="need" value="Save">
              </form>';

        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Domain
        </p><br><br><br>';
        echo'<form method="post">
        <input name="domainThis" type="text" placeholder="Enter your domain" maxlength="250" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;"></p>
                <input type="submit" style="margin-left:110px; margin-top:-28px;" class="Save-btn" name="domainOrg" value="Save">
                <input type="submit" style="margin-left:30px; margin-top:-28px;" class="Save-btn" name="domainRemoveOrg" value="Remove">
              </form>';

        echo'<p style="font-size:24px;color:black;margin-left:20px; margin-top:10px; ">Your Description
        </p><br><br><br>';
        echo'<form method="post">
        <input name="aboutOrg" type="text" placeholder="Enter your description" maxlength="250" style="font-size:20px;font-weight:light;color:#333333;margin-left:20px;"></p>
                <input type="submit" style="margin-left:110px; margin-top:-28px;" class="Save-btn" name="aboutOrgF" value="Save">
              </form>';
      }
      ?>
        

</div>

    <div class="exp">
        <p style="margin-left:15px;font-size:24px;margin-top:10px;">Past Experiences</p><br><br>
        <?php
      echo '
      <form method="post">
      <input name="exp1" style="width:450px;height:75px;margin-left:45px;font-size:21px;margin-top:30px;color:#333333;" placeholder="Enter your past experiences of social welfare"></p><br><br>
      <hr style="margin-left:40px; margin-top:20px; color:lightgrey;"><br><br>
      <input name="exp2" style="width:450px;height:75px;margin-left:45px;font-size:21px;margin-top:-20px;color:#333333;" placeholder="Enter your past experiences of social welfare"></p><br><br>
      <input type="submit" style="margin-left:130px; margin-top:-28px;" class="Save-btn" name="expp1" value="Save">
      </form>
      ';
    ?>


        <!-- <p style="margin-left:65px;font-size:19px;margin-top:30px;color:#595959;"> * At muskan foundation on 21st august</p><br><br>
      <hr style="margin-left:40px; margin-top:30px; color:lightgrey;"><br><br>
      <p style="margin-left:45px;font-size:21px;margin-top:-30px;color:#333333;">Donater for an orphanage</p><br><br>
      <p style="margin-left:65px;font-size:19px;margin-top:-30px;color:#595959;" onlick="/#"> * At milaap NGO on 1st december</p><br><br> -->

    </div>



    <div class="edit">
        <a href=myprofile.php>
            <button
                style="background-color:lightskyblue;color:black;padding:15px;width:100px; border-radius:10px;margin-top:50px;margin-left:110px;border:0px;">Update<button>
        </a>
    </div>

</body>

</html>