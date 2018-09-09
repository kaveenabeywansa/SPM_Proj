<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db name", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
$query =mysql_query("select form_6 from student where user_name='$user_check'", $connection);
$row=mysql_fetch_array($ses_sql);
if($row==1){
	
	
}
else{
	echo "This student not submitted form_6";
}
?>