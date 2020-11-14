<!DOCTYPE html>
<html>
    <head>
        <title>Individual's SignUp</title>
        <link rel="stylesheet" href="css/ind.css">
        <!-- <script src="js_files/org2.js"></script> -->
    </head>
    <body>
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
