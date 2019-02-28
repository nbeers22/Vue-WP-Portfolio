<?php

$first_name = $_POST['firstName'];
$last_name  = $_POST['lastName'];
$email      = $_POST['email']  ;
$company    = isset($_POST['company']) ? $_POST['company'] : 'N/A';
$message    = $_POST['message'];

$to      = 'nbeers22@gmail.com';
$from    = 'From: noreply@nathanbeers.com';
$subject = 'Nathanbeers.com Contact Form Submission';
$body = <<<EOD
First Name: $first_name
Last Name: $last_name
Email: $email
Company: $company
Messaage: $message
EOD;

mail($to,$subject,$body,$from);

$to      = $email;
$from    = 'From: noreply@nathanbeers.com';
$subject = 'Submission Confirmation Nathanbeers.com';
$body = <<<EOD
$first_name

I have received your message and will be contacting you shortly

Nathan Beers
EOD;

mail($to,$subject,$body,$from);

echo 'Mail was sent';
?>