var aTagContainer = document.getElementById("top");
var aTags = aTagContainer.getElementsByClassName("nav1");
for (var i = 0; i < aTags.length; i++) {
    aTags[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// function myFunction(x,y) {
//     display(x,y+1);
//     x.classList.toggle("change");
    
//     x.classList.toggle("change");
// }
function display(){
    if(document.getElementById('smallS').style.display=="none"){
        document.getElementById('smallS').style.display="block";
    }
    else{
        document.getElementById('smallS').style.display="none";
        
    }
}