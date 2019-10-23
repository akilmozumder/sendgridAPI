<?php
require_once ('vendor/autoload.php');
include '../lib/Database.php';
$db=new Database();
$email = $_POST['email'];


$query="Select * from user WHERE email='$email' limit 1";
$result=$db->select($query);
if($result){
        $password=rand(000000,999999);
        $cpassword=$password;
        $query="Update user set password='$password',cpassword='$cpassword' WHERE email='$email'";
        $db->update($query);
        $from = new SendGrid\Email("$name", "$email");
        $subject = "From: BD House Rent";
        $to = new SendGrid\Email("Bd House Rent", "$email");
        $message="Congratulation your password is reseted. your new password is $cpassword";
        $content = new SendGrid\Content("text/html", "
        
        Message: {$message}
        ");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        $apiKey = ('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');
        $sg = new \SendGrid($apiKey);
        $response = $sg->client->mail()->send()->post($mail);
        header('location:../login.php?success');
   
}else{
    header('location:../forgetpass.php?invalidemail');
}


?>