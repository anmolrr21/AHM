<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/adminLogin.css?v=<?php echo time(); ?>">
       
    </head>
    <body>
        <div class="header">
        </div>
        <div class="logo">
        <img src="images/logo.png" style="margin-left:-10px;margin-top:-40px;margin:-10px;"width="90px">
        </div>
        <div class="head">
            <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
        </div>
        <?php
         include 'common/_dbconnect.php';
        ?>
         <?php $error=$_GET['error'];
    
            if($error=='true'){
            echo' <div class="msg msg-empty">
                <b>Failed!</b> Wrong credentials.
            </div>';
            }
            ?>
        
        <div class="headings">
        <h1>ConnecTTogether</h1>
        <h2>Admin Login</h2>
       
        
        <div id="details2-form" class="details2-form">
            <form action="after_adminLogin.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <div class="personal-details"> 
                        <input type="email" name="email" placeholder="Email"><br>
                        <input type="password" name="password" placeholder="Password"><br>
                        <input type="submit" value="Log In" name="submitt" class="button" id="submit_btn"  >
                    </div>
                </div>

            </form>
        </div>

    </body>
</html>