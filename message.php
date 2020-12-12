
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ConnecTTogether</title>
        <link rel="stylesheet" href="css/message.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/0cf079388a.js"></script>
        <style>
            <?php 
                include 'css/admin.css'
            ?>
        </style>
    </head>
    <body>
    <section id="header">
        <ul id="top" class="topnav">
            <li><img src="images/logo.png" width="90px"></li>
            <li><a href="index.html">ConnecTTogether</a></li>
            
            <li><a class="nav1" href="/AHM/">Back</a></li>

            <div class="menuIcon" onclick="display()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </ul>
    </section>
        <?php 
            $verify=$_GET['verify'];
            
            echo '
            <div class="message-box">'; 
            if($verify=='process'){
            echo " 
                <h1>Verification under process!</h1>
                <p>Your organization is under verification.You'll receive a mail for the same.<br>Till then Please wait.</p>";
            }else if($verify=='decline'){
                echo "
                <h1>Verification Done!</h1>
                <p>Your organization is has not been approved.You cannot move further.</p>";

            }
            echo '</div>';
        ?>
    </body>