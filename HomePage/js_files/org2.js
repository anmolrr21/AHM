// $("#domain").change(function(){
//     console.log(('#domain option:selected').text());
// });

function whichDomain(domain) {
  
    var selectedText = domain.options[domain.selectedIndex].innerHTML;
    var selectedValue = domain.value;
    console.log("Selected Text: " + selectedText + " Value: " + selectedValue);
    if(selectedText=="Others"){
      document.getElementById('details2-form').style.height = "520px"
      // document.getElementById('submit_btn').style.height = "520px"
        console.log("hi");
        document.getElementById('other_domain').style.display='block';
        var added=document.getElementById('other_domain').value;
        console.log(added);

          } else {
            console.log("hhi");
            document.getElementById('other_domain').style.display='none';
          }
         
}

function submit() {
    console.log("entered");
    var added=document.getElementById('other_domain').value;
        console.log(added);

        // getting added but getting stored permanently
       
        var option=document.createElement(option);
        option.value=added;
        domain.appendChild(option);

        element = document.getElementById('domain');
        element.innerHTML += "<option>"+ added + "</option>";
        domain.options[domain.options.length] = new Option(added, added);

        var x = document.getElementById("domain");
        var option = document.createElement("option");
        option.text = "Kiwi";
        x.add(option);
    
}

