<?php

	ini_set('display_errors', 1);
	$db = mysqli_connect('localhost','root','asdf6245','HHDemo');
	
	$errors = array();
	

	
	if (isset($_POST['survey'])){
		
		if(!$db){
		echo "Failure: Could not connect to server." ;
		}
		

		
		if (empty($_POST['rate3'])){
			array_push($errors, "Please select a state.");
		}
		
		if (empty($_POST['rate4'])){
			array_push($errors, "Please rate your physician.");
		}
		
		
	
		
		
		
		if (count($errors) == 0){
			
			$improve = mysqli_real_escape_string($db,$_POST['rate1']);
			$sat = mysqli_real_escape_string($db,$_POST['rate2']);
			$used = mysqli_real_escape_string($db,$_POST['quantity']);
			$rate = mysqli_real_escape_string($db,$_POST['rate3']);
			$rec = mysqli_real_escape_string($db,$_POST['rate4']);
			$text = mysqli_real_escape_string($db,$_POST['message']);
			
			if ($used >20){
				
				$used = 20;
				
			}

			$sql = "INSERT INTO responses (improve, sat, used, rate, rec, text) 
						VALUES ('$improve','$sat','$used','$rate','$rec','$text')";
						
			mysqli_query($db,$sql);
			
			echo "Success! Thank you for participating in our demo.";
			header("Location: panel.html");

			
		}else{
			
			echo count($errors);
			
		}
		
		
		
	} else {
		echo "failed";
		#header("Location: demo.html");
	die();}
		
		

			
?>	
			
	
	
	
	
