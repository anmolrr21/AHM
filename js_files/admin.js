// $("#dash_link").on('click', function() {
//     document.getElementById("dash_link").style.display = "block";
//     document.getElementById("ad_link").style.display = "none";

// });



// $("#ad_link").on('click', function() {
//     console.log("hi");
//     document.getElementById("dash_link").style.display = "none";
//     document.getElementById("ad_link").style.display = "block";

// });

function func_dash() {
 console.log("dash sec");
 document.getElementById("right-part").style.display = "block";
 document.getElementById("ad_sect").style.display = "none";
 document.getElementById("delete-user").style.display = "none";
 document.getElementById("view-comp").style.display = "none";
 document.getElementById("add-domain").style.display = "none";
   
}

function func_ad() {
  console.log("approve sec");
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("ad_sect").style.display = "block";
  document.getElementById("delete-user").style.display = "none";
  document.getElementById("view-comp").style.display = "none";
  document.getElementById("add-domain").style.display = "none"; 
}

function func_deleteUser() {
  console.log("delete user sec");
  document.getElementById("right-part").style.display = "none";
  document.getElementById("ad_sect").style.display = "none";
  document.getElementById("delete-user").style.display = "block";
  document.getElementById("view-comp").style.display = "none";
  document.getElementById("add-domain").style.display = "none"; 
    
  }

function func_viewComp() {
  console.log("view comp sec");
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("ad_sect").style.display = "none";
  document.getElementById("delete-user").style.display = "none";
  document.getElementById("view-comp").style.display = "block";
  document.getElementById("add-domain").style.display = "none"; 
    
}

function func_addDomain() {
  console.log("add domain sec");
  document.getElementById("dashboard").style.display = "none";
  document.getElementById("ad_sect").style.display = "none";
  document.getElementById("delete-user").style.display = "none";
  document.getElementById("view-comp").style.display = "none";
  document.getElementById("add-domain").style.display = "block"; 
    
  }