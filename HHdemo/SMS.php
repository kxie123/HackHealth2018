<?php
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
ini_set('display_errors', 1);
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC379c2523a13788a76f0b5691cc9ffc2e';
$token = 'f26c6fcd516eb9436ff759401a449134';
$client = new Client($sid, $token);



if (isset($_POST['phone'])){
	
	$number = $_POST['phone'];
	
	$pre = "+1";
	$full = $pre.$number;

	try{
		$client->messages->create(
			$full,
			array(
				'from' => '+19804304326',
				'body' => "Thank you for opting to participate in the PrescribeAware Demo. We kindly ask you to complete this survey which will assist us in our presentation today. http://prescribeaware.com/HHdemo/survey.php"
			)
			
			
		);
		
		echo "SMS message successfully sent to your phone.";
		header("Location: thanks.html");

	
	}catch (Exception $e){
		
		echo "You entered a number that is either invalid or currently unsupported. Please enter another number.";
	}
		
	

} else {
	

		header("Location: demo.html");
	die();}
?>