<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db name", $connection);


			 	 	 	  $ITM_name = $_POST["ITM_name"];   
						  $mobile = $_POST["mobile"];   
						  $email = $_POST["email"];
						  $password = $_POST["password1"];
						  $password2 = $_POST["password2"];
						  
						  if($password ==  $password2){
							  
							  $insertString = "INSERT INTO #table_name VALUES('ITM_id','$ITM_name','$mobile','$email','$password')";

							 $result = $conn->query($insertString);      
						 	 if(mysql_error($result)) 
							 {
						 	 	     die('Error : '.mysql_error());    
							 } 
							 else 
							 {
							 	       
							 	     echo "<script type='text/javascript'>s alert ('Account created successfully.......')</script>"   
							 } 
						  }
							
						 	
					
?>