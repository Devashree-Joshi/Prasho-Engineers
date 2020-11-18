<?php

 error_reporting(E_ALL);
 ini_set('display_errors', TRUE);

$message = "";

$message .= "Name - ".$_POST["name"]."<br>";

$message .= "Contact Number - ".$_POST["contact_number"]."<br>";

$message .= "Email Address - ".$_POST["email_address"]."<br>";

$message .= $_POST["message"]."<br>";

$to = "devashree2512@gmail.com";
$subject = "Quote Request from ".$_POST["name"];
$from = "devashree2512@gmail.com";


//header 
    $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
	$headers .= "Content-Type: text/html; charset=UTF-8". "\r\n";

$targetDir = "uploads/";
        //$allowTypes = array('jpg','png','jpeg','gif');
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
            // File upload path
            $file_name = basename($_FILES['files']['name'][$key]);
            
            $targetFilePath = $targetDir . $file_name;
            // Check whether file type is valid
            $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                        $message .= "<img src=\"".$targetFilePath."\">";
                    }           
                }
            }
    

// To send HTML mail, the Content-type header must be set

 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers)){
     echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
} 

?>
