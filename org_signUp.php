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
            <form class="form" method="POST">
                <div class="form-item">
                    <div class="personal-details">
                        <input type="text" id="name" placeholder="Name of your NGO/organization">
                        <input type="email" id="email" placeholder="Email">
                        <input type="password" id="password" placeholder="Password">
                        <input type="password" id="c_password" placeholder="Confirm Password">
                        <input type="text" id="location" placeholder="Location">
                        <input type="tel" id="phone" placeholder="Contact">
                        <input type="text" id="desc" placeholder="Location"><br>
                        <label for="myfile">Add a proof of your organization:</label><br>
                        <input type="file" id="myfile" name="myfile"><br><br>
  
                    </div>

                </div>

               
       
        <a href="org2.html" class="button" id="submit_btn" onclick="submit()">Submit</a>

            </form>
        </div>

    </body>
</html>
