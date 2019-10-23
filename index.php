<?php
require_once ('SendGrid-API/vendor/autoload.php');
$from = new SendGrid\Email("Your Name", "example@example.com");
				$subject = "This is subject";
				$message="This is your message";
				$to = new SendGrid\Email("Your Name", "you@example.com");
				$content = new SendGrid\Content("text/html", "
				{$message}
				
				");
				$mail = new SendGrid\Mail($from, $subject, $to, $content);
				$apiKey = (''); //api key provided by sendgrid
				$sg = new \SendGrid($apiKey);
				$response = $sg->client->mail()->send()->post($mail);
?>