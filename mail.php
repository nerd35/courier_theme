<?php $Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone']
$message = $_POST['message'];
$formcontent="From: $name \n Email: $Email \n Phone Number: $Phone \n Message: $message";
$recipient = "emailaddress@here.com";
$subject = "Contact Form";
$mailheader = "From: $Email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>