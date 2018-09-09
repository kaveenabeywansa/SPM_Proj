<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("spm", $connection);


			 	 	 	  $Name = $_POST["ITM_name"];   
						  $Mobile = $_POST["mobile"];  
						  //$Company = $_POST["company_name"];
						  $Email_Itm = $_POST["email"];
						  $Password = $_POST["password1"];
						   $Security_ques=$_POST["security_question"];
						  $Security_ans=$_POST["security_answer"];
						  $Type	= 'ITM';
						  
						  
					
							  
							  $insertString1 = "INSERT INTO log VALUES('$Email_Itm','$Password','$Type')";
							  $insertString = "INSERT INTO it_manager VALUES('$Name','$Mobile','$Email_Itm','$Security_ques','$Security_ans')";
							 
							 if(mysql_query($insertString1))
							{
								if(mysql_query($insertString ))
								{
									//echo 'Successfully Created';
									header('Location: ITMSignup.html');
								}
								else{
									echo 'Failed supervisor table - '.mysql_error();
								}
							}
							else{
									echo 'Failed loging table - '.mysql_error();
								}
							
							//if(mysql_query($insertString1) && mysql_query($insertString)){
								//echo 'Successfully Created';
						//	}else
							//	echo 'Failed - '.mysql_error();
							
							
						 	
					
?>