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
    <title>Home | ConnecTTogether</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/complaint.css?v=<?php echo time(); ?>">

    <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <style>
    <?php 
   
    include 'css/navbar.css';
    
    
    ?>
    </style>
</head>

<body>
    <!-- Including common files -->

    <?php
       include 'commonNavbar.php';  
       include 'common/_dbconnect.php';
    ?>
    <?php $status=$_GET['status'];
    
    if($status=='success'){
       echo'<div class="msg msg-success">
        <b>Success!</b> Your complaint has been noted.
      </div>';
    }
    else if($status=='fail'){
        echo' <div class="msg msg-fail">
        <b>Failed!</b> Wrong credentials.
      </div>';
    }
    
?>

    
<div class="headings">
        <h1>Contact Us</h1>
        <p>Got some queries or having some suggestions for us. Drop your message here.  Will catch you soon.</p>
    </div>
        <div id="details2-form" class="details2-form">
            <form class="form" method="post" action="complaint_insertion.php">
                <div class="form-item">
                        <label for="username">Your Name:</label>
                        <input type="text" name="username" placeholder="Enter your name">
                </div>
                <div class="form-item">
                        <label for="username">Your Email:</label>
                        <input type="email" name="email" placeholder="Enter your email">
                </div>

        <div class="form-item">
            <div class="desc">
                <label for="desc">Message:</label>
                 <textarea rows="10" cols="54" name="complaint" id="textarea_desc" placeholder="Enter your suggestion / query here"></textarea>   
            </div>         
        </div>
        
       <input type="submit" id="submit_btn" class="button">
            </form>
        </div>
</body>
</html>    
