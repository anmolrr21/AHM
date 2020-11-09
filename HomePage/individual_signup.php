<!DOCTYPE html>
<html>
    <head>
        <title>Individual's SignUp</title>
        <link rel="stylesheet" href="css/ind.css">
        <script src="js_files/org2.js"></script>
    </head>
    <body>
        <div class="headings">
        <h1>SiteName</h1>
        <h2>For Individuals</h2>
        <p>Find NGO'S,connect and help society develop</p>
    </div>
        <div id="details2-form" class="details2-form">
            <form class="form" method="POST">
                <div class="form-item">
                    <div class="personal-details">
                        <input type="text" id="name" placeholder="First & Last name">
                        <input type="email" id="email" placeholder="Email">
                        <input type="password" id="password" placeholder="Password">
                        <input type="password" id="c_password" placeholder="Confirm Password">
                        <input type="number" id="age" placeholder="Age">
                        <input type="tel" id="phone" placeholder="Phone">
                        <input type="text" id="location" placeholder="Location">
                    </div>

                </div>

                <div class="form-item">
                    <div class="first-form-item">
                        <label for="need">Serve as?</label>
                            <select name="need" id="need">
                                <option value="v">Volunteers</option>
                                <option value="d">Donors</option>
                                <option value="vd">Both</option>
                            </select>
                </div>
             </div>
       
            <div class="form-item">
                <div class="second-form-item">
                <label for="domain">Domain of Interest:</label>
                <select id="domain" multiple onchange='whichDomain(domain)'>
                  
                        <option selected value="e">Education</option>
                        <option value="w">Women Safety</option>
                        <option value="c">Cleaning</option>
                        <option value="f">Provide Food</option>
                        <option value="p">For physically disabled</option>
                        <!-- <option value="o">Others</option> -->
                       
                </select>
                <!-- <input type="text" id="other_domain" placeholder="Other Domain" style="display:none"></input> -->
           <p>(Hold down the <b>Ctrl (windows) or Command (Mac)</b> button to select multiple options.)</p> 
        </div>
        </div>

       
        <a href="#" class="button" id="submit_btn" onclick="submit()">Submit</a>

            </form>
        </div>

    </body>
</html>
