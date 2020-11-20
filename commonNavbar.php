<nav class="homeNav">
    <img src="images/logo.png" width="80px" height="60px">
    <form action="#">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    <ul id="top">
        <li class="decide"><i class="fa fa-home fa-lg" aria-hidden="true" style="color:white"></i><a href="#" class="nav1 active">Home</a></li>
        <li class="decide"><i class="fa fa-users fa-lg" aria-hidden="true" style="color:white"></i><a href="#" class="nav1">Connections</a></li>
        <li class="decide"><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true" style="color:white"></i><a href="#" class="nav1">Recommendations</a>
        </li>
        <li class="decide"><i class="fa fa-bell fa-lg" aria-hidden="true" style="color:white"></i><a href="#" class="nav1">Notifications</a></li>
        <li><img src="images/user.png" width="30px" height="20px"><a href="#" class="nav1">Me</a></li>
    </ul>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-caret-down" aria-hidden="true"></i></button>
        <div id="myDropdown" class="dropdown-content">
            <a href="#">View Profile</a>
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

