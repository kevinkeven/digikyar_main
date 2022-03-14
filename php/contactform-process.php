<?php
$errorMSG = "";

$name = $_POST["cname"];
$email = $_POST["cemail"];
$message = $_POST["cmessage"];

$EmailTo = "sales@digikyar.org";
$Subject = "New message from SALES digikyar";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success){
   echo "success";
}else{
    echo "failed"
}
?>