<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("spm", $connection);


							$First_Name = $_POST["fname"];   
							$Last_Name = $_POST["lname"];   
							$Nic_Passport = $_POST["nic"];
							$Email_student = $_POST["email"];
							$Password = $_POST["password1"];
							$Address = $_POST["address"];
							$Mobile = $_POST["mobile"];
							$Company = $_POST["company_name"];
							$Security_ques=$_POST["security_question"];
							$Security_ans=$_POST["security_answer"];
							//$Type	= $_GET["Type"];
			
						 
							$insertString1 = "INSERT INTO log VALUES('$Email_student','$Password','$Type')";
							
							$insertString = "INSERT INTO student VALUES('$First_Name','$Last_Name','$Nic_Passport','$Email_student','$Mobile','$Company','$Address',NULL,'$Security_ques','$Security_ans',0)";
							if(mysql_query($insertString1))
							{
								if(mysql_query($insertString ))
								{
									//echo 'Successfully Created';
									header('Location: StudentSignup.html');
								}
								else{
									echo 'Failed student table - '.mysql_error();
								}
							}
							else{
									echo 'Failed loging table - '.mysql_error();
								}
							
							//$insertString = "INSERT INTO student VALUES('$First_Name','$Last_Name','$Nic_Passport','$Email','$Mobile','$Company','$Address',NULL,'$Security_ques','$Security_ans',0)";

							
							
							//if(mysql_query($insertString1) && mysql_query($insertString)){
								//echo 'Successfully Created';
							//}else
								//echo 'Failed - '.mysql_error();
							
							
							
							
							
							
							 /*$result = mysql_query($insertString);
							$result1 = mysql_query($insertString1);
						 	 if(mysql_error($result)) 
							 {
								 if(mysql_error($))
								 {
									die('Error : '.mysql_error());    
									 
								 }
						 	 	     die('Error : '.mysql_error());    
							 } 
							 else 
							 {  
							 	     echo "<script type='text/javascript'>s alert ('Account created successfully.......')</script>" ;  
							 } 
						 	*/
					
?>