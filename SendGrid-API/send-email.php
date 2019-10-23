<?php
require_once ('vendor/autoload.php');
$name = $_POST['name'];
$email = $_POST['email'];
$mobile=$_POST['mobile'];
$price=$_POST['price'];
$id=$_POST['id'];

$selleremail = $_POST['selleremail'];
$message = $_POST['message'];
$from = new SendGrid\Email("$name", "$email");
$subject = "From: BD House Rent";
$to = new SendGrid\Email("Bd House Rent", "$selleremail");
$content = new SendGrid\Content("text/html", "
price: {$price}
mobile: {$mobile}
Message: {$message}
");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = ('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');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
header('location:property_details.php?id=$id&msg')
?>

