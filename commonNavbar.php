<nav class="homeNav">
    <img src="images/logo.png">
    <h3>ConnecTTogether</h3>
    <form action="#">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    <ul id="top">
        <li class="decide"><i class="fa fa-home fa-lg" aria-hidden="true" style="color:white"></i><a href="/AHM/homePage.php" id="this1" class="nav1">Home</a></li>
        <li class="decide"><i class="fa fa-users fa-lg" aria-hidden="true" style="color:white"></i><a href="/AHM/connections.php" id="this2" class="nav1">Connections</a></li>
        <li class="decide"><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true" style="color:white"></i><a href="/AHM/recommendation.php" id="this3" class="nav1">Recommendations</a>
        </li>
        <li class="decide"><i class="fa fa-bell fa-lg" aria-hidden="true" style="color:white"></i><a href="/AHM/notification.php" id="this4" class="nav1">Notifications</a></li>
        <li id="thisOnee"><img src="images/user.png"><a href="#" onclick="myFunction()" class="nav1">Me</a></li>
    </ul>
    <div class="dropdown">
        <!-- <button  class="dropbtn"><i class="fa fa-caret-down" aria-hidden="true"></i></button> -->
        <div id="myDropdown" class="dropdown-content">
            <a href="myprofile.php">View Profile</a>
            <a href="#">Raise Fund</a>
            <a href="#">Settings</a>
            <a href="#">Contact</a>
            <a href="#">Help</a>
            <a href="#">Logout</a>
        </div>
    </div>
</nav>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#"><i class="fa fa-eye fa-lg" aria-hidden="true"></i>Profile</a>
  <a href="#"><i class="fa fa-home fa-lg" aria-hidden="true"></i>Home</a>
  <a href="#"><i class="fa fa-users fa-lg" aria-hidden="true"></i>Connections</a>
  <a href="#"><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true"></i>Recommendations</a>
  <a href="#"><i class="fa fa-bell fa-lg" aria-hidden="true"></i>Raise Funds</a>
  <a href="#"><i class="fa fa-cogs fa-lg" aria-hidden="true"></i>Settings</a>
  <a href="#"><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i>Help</a>
  <a href="#"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>Logout</a>
</div>

<script>
    var upperData = window.location.href;
    var first = document.getElementById('this1');
    var second = document.getElementById('this2');
    var third = document.getElementById('this3');
    var fourth = document.getElementById('this4');
    if(upperData.includes("homePage")){
        first.className += " active";
        second.className.replace(" active", "");
        third.className.replace(" active", "");
        fourth.className.replace(" active", "");
    }
    else{
        if(upperData.includes("connections")){
            document.getElementById('this2').className += " active";
            first.className.replace(" active", "");
            third.className.replace(" active", "");
            fourth.className.replace(" active", "");
        }
        else{
            if(upperData.includes("recommendation")){
                third.className += " active";
                first.className.replace(" active", "");
                second.className.replace(" active", "");
                fourth.className.replace(" active", "");
            } 
            else{
                if(upperData.includes("notification")){
                    fourth.className += " active";
                    first.className.replace(" active", "");
                    second.className.replace(" active", "");
                    third.className.replace(" active", "");
                }
            }
        }
    }
    if(window.innerWidth<500){
        document.getElementById('thisOnee').style.marginLeft="-40px";
    }
    
//For dropdown menu
function myFunction() {
    if(window.innerWidth>500){
        document.getElementById('myDropdown').classList.toggle("show");
    }
    else{
        openNav() ; 

    }
    
}
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
//For underline on current
var aTagContainer = document.getElementById("top");
var aTags = aTagContainer.getElementsByClassName("nav1");
for (var i = 0; i < aTags.length; i++) {
    aTags[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

//For sidenav on small screens
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


