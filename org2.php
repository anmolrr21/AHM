<!DOCTYPE html>
<html>
    <head>
        <title>Organization SignUp</title>
        <link rel="stylesheet" href="css/org2.css?v=<?php echo time(); ?>">
        <script src="js_files/org2.js"></script>
    </head>
    <body>
    <!-- <div class="header"> -->

    <div class="logo">
    <img src="images/logo.png" style="margin-left:-10px;margin:-10px;"width="90px">
    </div>
    <div class="head">
        <p style="margin-left:80px;margin-top:-60px;font-size:25px;color:white;"><b>ConnecTTogether<b></p>
    </div>
        <?php
         include 'common/_dbconnect.php';
        ?>
    
        
        <div class="headings">
        <h1>ConnecTTogether</h1>
        <h2>For Organizations</h2>
        <p>Find people,connect and help society develop</p>
    </div>
        <div id="details2-form" class="details2-form">
            <form class="form" method="post" action="after_org_signup.php">
                <div class="form-item">
                    <div class="first-form-item">
                        <label for="need">Do you need?</label>
                            <select name="need" id="need">
                                <option value="v">Volunteers</option>
                                <option value="d">Donors</option>
                                <option value="vd">Both</option>
                            </select>
                </div>
        </div>
        <div class="form-item">
            <div class="desc">
                <label for="desc">Describe your organization:</label>
                 <textarea rows="4" cols="54" name="textarea_desc" id="textarea_desc" placeholder="Description"></textarea>   
            </div>         
        </div>
            <div class="form-item">
                <div class="second-form-item">
                <label for="domain">Domain You work on:</label>
                <select id="domain" name="select_domain[]" multiple onchange='whichDomain(domain)'>
                <?php 
                    
                    $sql1="select domain from domains_available";
                    $result1=mysqli_query($conn,$sql1);
                    while($row1=mysqli_fetch_assoc($result1)){
                        $domain_value = $row1['domain'];
                        echo '<option value=' . $domain_value . '>'. $domain_value .'</option>';
                    }
                ?>
                
                </select>
                <input type="text" name="other_domain" id="other_domain" placeholder="Other Domain" style="display:none"></input>
           <p>(Hold down the <b>Ctrl (windows) or Command (Mac)</b> button to select multiple options.)</p> 
        </div>
        </div>

       <input type="submit" id="submit_btn" class="button">
            </form>
        </div>

    </body>
</html>