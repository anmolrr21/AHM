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
 var id_dash=document.getElementById("dashboard");
 var id_ad=document.getElementById("ad-sect");
 var id_deluser=document.getElementById("delete-user");
 console.log(id_dash.style.display);
 if((id_dash.style.display=="")|| (id_dash.style.display=="none")){
     id_ad.style.display="none";
     id_dash.style.display="block";
     id_deluser.style.display="none";
 } 
}

function func_ad() {
    console.log("ad sec");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    console.log(id_ad.style.display);
    if((id_ad.style.display=="") || (id_ad.style.display=="none") ){
        console.log("hi");
        id_ad.style.display="block"
        id_dash.style.display="none"; 
        
    } 
   }

   function deleteUser() {
    console.log("delete");
    var id_deluser=document.getElementById("delete-user");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    
    console.log(id_deluser.style.display);
    
    if((id_deluser.style.display=="")|| (id_deluser.style.display=="none")){
       
        console.log("1");
        id_dash.style.display="none";
        id_deluser.style.display="block";
        console.log("2");
        id_ad.style.display="none";
        console.log("3");
        console.log("4");
    } 
   }





// function func_viewComp() {
//   console.log("view comp sec");
//   document.getElementById("dashboard").style.display = "none";
//   document.getElementById("ad_sect").style.display = "none";
//   document.getElementById("delete-user").style.display = "none";
//   document.getElementById("view-comp").style.display = "block";
//   document.getElementById("add-domain").style.display = "none"; 
    
// }

// function func_addDomain() {
//   console.log("add domain sec");
//   document.getElementById("dashboard").style.display = "none";
//   document.getElementById("ad_sect").style.display = "none";
//   document.getElementById("delete-user").style.display = "none";
//   document.getElementById("view-comp").style.display = "none";
//   document.getElementById("add-domain").style.display = "block"; 
    
//   }