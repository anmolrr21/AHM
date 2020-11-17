<!DOCTYPE html>
<html>
    <head>
        <title>Individual's SignUp</title>
        <link rel="stylesheet" href="css/org.css">
        <script src="js_files/org2.js"></script>
    </head>
    <body>
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
                        <input type="text" name="desc" placeholder="Location"><br>
                        <label for="myfile">Add a proof of your organization:</label><br>
                        <input type="file"  name="file"><br><br>
                        <input type="submit" value="submit" name="submitt" class="button" id="submit_btn"  >
    
                    </div>
                </div>

            </form>
        </div>

    </body>
</html>
