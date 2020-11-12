
function whichDomain(domain) {
  
    var selectedText = domain.options[domain.selectedIndex].innerHTML;
    var selectedValue = domain.value;
    // console.log("Selected Text: " + selectedText + " Value: " + selectedValue);
    if(selectedText=="Others"){
      document.getElementById('details2-form').style.height = "650px"
        document.getElementById('other_domain').style.display='block';
        var added=document.getElementById('other_domain').value;
        // console.log(added);
        
          } else { 
            document.getElementById('other_domain').style.display='none';
          }
         
}

function submit() {
    // console.log("entered");    
    // console.log(document.getElementById('other_domain').value);  
}





