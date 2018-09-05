<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db name", $connection);


			 	 	 	  $fname = $_POST["fname"];   
						  $lname = $_POST["lname"];   
						  $nic = $_POST["nic"];
						  $email = $_POST["email"];
						  $password = $_POST["password1"];
						  $password2 = $_POST["password2"];
						  $addre = $_POST["Address"];
						  $mobile = $_POST["Mobile"];
						  
			
						 
					
							$insertString = "INSERT INTO #table_name VALUES('$fname','$lname','$nic','$email','$password','$addre','$mobile')";

							 $result = $conn->query($insertString);      
						 	 if(mysql_error($result)) 
							 {
						 	 	     die('Error : '.mysql_error());    
							 } 
							 else 
							 {
							 	       
							 	     echo "<script type='text/javascript'>s alert ('Account created successfully.......')</script>";
;    
							 } 
						 	
					
?>