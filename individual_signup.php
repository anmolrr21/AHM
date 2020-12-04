<!DOCTYPE html>
<html>
    <head>
        <title>Individual's SignUp</title>
        <link rel="stylesheet" href="css/ind.css?v=<?php echo time(); ?>">
        <!-- <script src="js_files/org2.js"></script> -->
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
    </head>
    <body>
    <div class="header" style="background-color:#0e76a8">
    </div>
    <div class="logo">
    <img src="images/logo.png" style="margin-left:-10px;margin-top:40px;margin:-10px;"width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div>
    <?php $status=$_GET['status'];
    
    if($status=='empty'){
       echo' <div class="msg msg-empty">
        <b>Failed!</b> All Fields are required.
      </div>';
    }
    else if($status=='password'){
        echo' <div class="msg msg-empty">
        <b>Failed!</b> Passwords do not match.
      </div>';
    }
    else if($status=='email'){
        echo' <div class="msg msg-empty">
        <b>Failed!</b> Please enter correct email account.
      </div>';
    }
?>
    <?php
         include 'common/_dbconnect.php';?>
        <div class="headings">
        <h1>ConnecTTogether</h1>
        <h2>For Individuals</h2>
        <p>Find NGO'S,connect and help society develop</p>
    </div>
        <div id="details2-form" class="details2-form">
            <form class="form" method="POST" action="individual_insertion.php">
                <div class="form-item">
                    <div class="personal-details">
                        <input type="text" name="name" placeholder="First & Last name">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="c_password" placeholder="Confirm Password">
                        <input type="number" name="age" placeholder="Age">
                        <input type="tel" name="phone" placeholder="Phone">
                        <input type="text" name="location" placeholder="Location">
                    </div>

                </div>

                <div class="form-item">
                    <div class="first-form-item">
                        <label for="need">Serve as!</label>
                        <select name="need" id="need">
                                <option value="v">Volunteers</option>
                                <option value="d">Donors</option>
                                <option value="vd">Both</option>
                            </select>
                </div>
             </div>
       
            <div class="form-item">
                <div class="second-form-item" id="domain_of_interest" style="background-color:#ffffff">
                <label for="domain">Domain of Interest:</label>
                <select id="domain" name="select_domain[]" multiple onchange='whichDomain(domain)'>
                <?php 
                    
                    $sql1="select domain from domains_available";
                    $result1=mysqli_query($conn,$sql1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        $domain_value = $row1['domain'];
                        if($domain_value != "Others"){
                        echo '<option value=' . $domain_value . '>'. $domain_value .'</option>';
                        }
                    }
                ?>
                
                </select>
               
           <p>(Hold down the <b>Ctrl (windows) or Command (Mac)</b> button to select multiple options.)</p> 
        </div>
        </div>
        <input type="submit" id="submit_btn" class="button">
            </form>
        </div>

    </body>
</html>

