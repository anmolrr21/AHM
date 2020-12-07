<!DOCTYPE html>
<html>
    <head>
        <title>Organization's SignUp</title>
        <link rel="stylesheet" href="css/org.css?v=<?php echo time(); ?>">
        <script src="js_files/org2.js"></script>
        
        
    </head>
    <body>
    <div class="header">
    </div>
    <div class="logo">
    <img src="images/logo.png" style="margin-left:-10px;margin-top:40px;margin:-10px;"width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div>
    <div class="back">
    <!-- <button style="margin-top:-50px;">Home</button> -->
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
        <div class="headings">
        <h1>ConnecTTogether</h1>
        <h2>For Ngos/organizations</h2>
        <p>Find citizens,connect with them to make earth a better place !</p>
    </div>
    
        <div id="details2-form" class="details2-form">
            <form action="org_users.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <div class="personal-details">
                        <input type="text" name="name" placeholder="Name of your NGO/organization">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <input type="password" name="c_password" placeholder="Confirm Password">
                        <input type="text" name="location" placeholder="Location">
                        <input type="tel" name="phone" placeholder="Contact">
                        <label for="myfile">Add a proof of your organization:</label><br>
                        <input type="file"  name="file" accept="image/*" ><br><br>
                        <input type="submit" value="submit" name="submitt" class="button" id="submit_btn"  >
    
                    </div>
                </div>

            </form>
        </div>

    </body>
</html>
