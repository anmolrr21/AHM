<?php

    $emailTo = "2018.hitesh.dhameja@ves.ac.in"; //Jisko mail bhejna hai uska email-id
    $subject = "Check mail trial";  // Subject of mail
    $content = "How are you? I am fine"; //Actually jo mail body may bejna hai
    $headers = 'From : hiteshdhameja49@gmail.com'; // jisse mail bhejna hai 
    mail($emailTo,$subject,$content,$headers); //bhej do mail
    echo ' mail sent successfully!'; // just for checking

    

?>