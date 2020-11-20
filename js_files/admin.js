
function func_dash() {
 console.log("dash sec");
 var id_dash=document.getElementById("dashboard");
 var id_ad=document.getElementById("ad-sect");
 var id_deluser=document.getElementById("delete-user");
 var id_vc=document.getElementById("view-comp");
 var id_domain=document.getElementById("add-domain");
 console.log(id_dash.style.display);
 if((id_dash.style.display=="")|| (id_dash.style.display=="none")){
     id_dash.style.display="block";
     id_ad.style.display="none";
     id_deluser.style.display="none";
     id_vc.style.display="none"; 
     id_domain.style.display="none";  
 } 
}

function func_ad() {
    console.log("ad sec");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    var id_deluser=document.getElementById("delete-user");
    var id_vc=document.getElementById("view-comp");
    var id_domain=document.getElementById("add-domain");
    console.log(id_ad.style.display);
    console.log("deluserkk");
    console.log(id_deluser.style.display);
    if((id_ad.style.display=="") || (id_ad.style.display=="none") ){
        id_dash.style.display="none";  
        id_deluser.style.display="none";  
        id_vc.style.display="none"; 
        id_domain.style.display="none";  
        id_ad.style.display="block";
        
    } 
   }

   function deleteUser() {
    console.log("delete");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    var id_deluser=document.getElementById("delete-user");
    var id_vc=document.getElementById("view-comp");
    var id_domain=document.getElementById("add-domain");
    
    if((id_deluser.style.display=="")|| (id_deluser.style.display=="none")){ 
        id_dash.style.display="none";
        id_ad.style.display="none"; 
        id_deluser.style.display="block";  
        id_vc.style.display="none"; 
        id_domain.style.display="none";    
    } 
   }

   function viewComp() {
    console.log("comp");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    var id_deluser=document.getElementById("delete-user");
    var id_vc=document.getElementById("view-comp");
    var id_domain=document.getElementById("add-domain");
    
    if((id_vc.style.display=="")|| (id_vc.style.display=="none")){ 
        id_dash.style.display="none";
        id_deluser.style.display="none";  
        id_ad.style.display="none";  
        id_domain.style.display="none"; 
        id_vc.style.display="block";   
    } 
   }

   function addDomain() {
    console.log("domain");
    var id_dash=document.getElementById("dashboard");
    var id_ad=document.getElementById("ad-sect");
    var id_deluser=document.getElementById("delete-user");
    var id_vc=document.getElementById("view-comp");
    var id_domain=document.getElementById("add-domain");
    
    
    if((id_domain.style.display=="")|| (id_domain.style.display=="none")){ 
        id_dash.style.display="none";
        id_ad.style.display="none";
        id_deluser.style.display="none";  
        id_vc.style.display="none"; 
        id_domain.style.display="block";    
    } 
   }

