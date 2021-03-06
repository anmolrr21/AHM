<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <title>ConnecTTogether</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/0cf079388a.js"></script>
    </head>
    <body>
        <!----------------------HomePage-------------------------------------------->
        <section id="header">
            <ul id="top" class="topnav">
                <li><img src="images/logo.png" width="90px"></li>
                <li style="font-size:24px;"><a href="index.html"><b>ConnecTTogether<b></a></li>
                <li class="bigs"><a class="nav1 active" href="#" >HOME</a></li>
                <li class="bigs"><a class="nav1" href="#about">ABOUT US</a></li>
                <li class="bigs"><a class="nav1" href="#features">WHY US?</a></li>
                <li class="bigs"><a class="nav1" href="#contact">CONTACT US</a></li>
                <li class="right nav1"><a href="login.php?status=none">LOGIN</a></li>
                <div class="menuIcon" onclick="display()">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                  </div>
            </ul>
            <div id="smallS" class="smallS">
                <ul id="small" class="small">
                    <li><a class="nav1 active" href="#" >HOME</a></li>
                    <li><a class="nav1" href="#about">ABOUT US</a></li>
                    <li><a class="nav1" href="#features">WHY US?</a></li>
                    <li><a class="nav1" href="#contact">CONTACT US</a></li>
                    <li class="right nav1"><a href="#">LOGIN</a></li>
                </ul>
            </div>
            <div class="headerText">
                <h1>Purpose to enhance the environment <br>by the people,for the people</h1>
                <span class="square"></span>
                <p id="join1"> <b>Welcome to the world of ConnecTTogether ! </b><br>Are you are an Organization and want to enhance the society? here you can focus on dedicated public. or Are you willing to inculcate your help? Join Us at @ConnecTTogether </p>
               <a href="org_signUp.php?status=false"><button class="commonBtn">For NGO's</button></a> 
                <a href="individual_signup.php?status=false"><button class="commonBtn">For Users</button></a>
                <h3 class="new" >Join US!</h3>
                <div class="line">
                    <span class="line1"></span><br>
                    <span class="line2"></span><br>
                    <span class="line3"></span>   
                </div>
                <img class="mainImage" src="images/clean2.jpg">
            </div>
            
        </section>
        
        
        
        <!----------------------AboutUsPage-------------------------------------------->
        <section id="about">
            <div class="aboutLeftColumn">
                <img src="images/about.jpg" alt="">
            </div>
            <div class="aboutRightColumn">
                <div class="aboutText">
                    <h1>About Us</h1>
                    <span class="square"></span>
                    <p> We at ConnecTTogether help our fam to connect to right people at right time as per need with ease and convinence. Being an NGO,you can get the fund raisers,volunteers and many more...Else you can volunteer, donate your extras to right community! </p><br><br>
                    <div class="line">
                        <span class="line1"></span><br>
                        <span class="line2"></span><br>
                        <span class="line3"></span>
                    </div>
                    <h2>"Nothing happens when ONE does, but everything happens when EACH ONE does"</h2>
                    <h3>- ABHI & NIYU</h3>
                </div>
            </div>
        </section>

        <!----------------------Why Us?Page-------------------------------------------->
        <section id="features">
            <div class="featureHeading">
                <h2>Why Us?</h2>
            </div>
            <div class="featureRow">
                <div class="featureColumn">
                    <img src="images/first.jpg">
                    <h4>Connect with HELP</h4>
                    <p>We give you the platform to fulfill your nature of spreading kindness.</p>
                </div>
                <div class="featureColumn">
                    <img src="images/second.jpg">
                    <h4>Be a Volunteer</h4>
                    <p>Help others...Volunteer them. Because if you have why not to share :)</p>
                </div>
                <div class="featureColumn">
                    <img src="images/third.jpg">
                    <h4>NGO</h4>
                    <p>If you are an organization, then you can find number of people of your domain and interest</p>
                </div>
            </div>
            <div class="featureBtn">
                <div class="line">
                    <span class="line1"></span><br>
                    <span class="line2"></span><br>
                    <span class="line3"></span>
                </div> 
               <a href="#join1"><button class="commonBtn">Join US</button></a>
            </div>
        </section>

        <!----------------------ContactUsPage-------------------------------------------->
        <section id="contact">
            <div class="container contactRow">
                <div class="contactLeftColumn">
                    <h1>SignUp to Join <br>Our Community</h1>
                    <form>
                        <input type="text" placeholder="Enter Name">
                        <input type="email" placeholder="Enter Email">
                        <input type="password" placeholder="Enter Query">
                        <div class="btnBox">
                            <button type="submit" class="commonBtn"><span><i class="fa fa-envelope" style="color:#1c86ee" aria-hidden="true"></i></span> SEND EMAIL</button>
                        </div>
                    </form>
                    <div class="line">
                        <span class="line1"></span><br>
                        <span class="line2"></span><br>
                        <span class="line3"></span>
                    </div> 
                </div>
                <div class="contactRightColumn">
                    <img src="images/contactUs.jpg" alt="">
                </div>

            </div>
        </section>

        <!----------------------Footer-------------------------------------------->
        <section id="footer">
            <div class="container footerRow">
                <hr>
                <div class="footerLeftColumn">
                    <div class="footerLinks">
                        <div class="linkTitle">
                            <h4>Product</h4>
                            <small>Our Plan</small><br>
                            <small>Free Trial</small>
                        </div>
                        <div class="linkTitle">
                            <h4>About Us</h4>
                            <small>Request Demo</small><br>
                            <small>FAQs</small>
                        </div>
                        <div class="linkTitle">
                            <h4>Support</h4>
                            <small>Features</small><br>
                            <small>Contact Us</small>
                        </div>
                        <div class="linkTitle">
                            <h4>Explore</h4>
                            <small>Find a nonprofit</small><br>
                            <small>Corporate solution</small>
                        </div>
                    </div>
                </div>
                <div class="footerRightColumn">
                    <div class="footerInfo">
                        <div class="copyrightText">
                            <small>support@gmail.com</small><br>
                            <small>Copyright &#169; 2020 ConnecTTogether</small>
                        </div>
                        <div class="footerLogo">
                            <img src="images/logo.png">
                            <button class="bottomButton">English</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
        <script src="js_files/script.js"></script>
    </body>
</html>