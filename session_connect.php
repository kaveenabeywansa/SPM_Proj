<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "","spm");
// Selecting Database
//$db = mysql_select_db("spm", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
//SQL Query To Fetch Complete Information Of User
$sql_loging="select * from log where Username='user_check'";
$ses_sql=mysqli_query($connection,$sql_loging);
$row1=mysqli_fetch_array($ses_sql);
$login_session =$row1['Username'];
$type =$row1['Type'];
if($type == "student"){
	
	$sql=mysqli_query($connection,"select * from $type where Email_student='$login_session'");
	$row2=mysqli_fetch_array($sql);
	
    $fname = $row2['First_Name'];
    $lname = $row2['Last_Name'];
    $nic = $row2['NIC_Passport'];
	$email = $row2['Email_student'];
    $mobile = $row2['Mobile'];
	$company = $row2['Company'];
	$address = $row2['Address'];
	$grading = $row2['Grading'];
	$Userype = 'student';
}
else if($type == "supervisor"){

	$sql=mysqli_query($connection, "select * from $type where Email_supervisor = '$login_session '");
	$row2=mysqli_fetch_array($sql);

	$email = $row2['Email_supervisor'];
    $company = $row2['Company'];
    $mobile = $row2['Mobile'];
	$Userype = 'supervisor';
}
else{
	$sql=mysqli_query($connection, "select * from $type where Email_Itm = '$login_session '" );
	$row2=mysqli_fetch_array($sql);
	$name = $row2['Name'];
    $mobile = $row2['Mobile'];
    $email = $row2['Email_itm'];
	$Userype = 'it_manager';
	
	

}

if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.html'); // Redirecting To Home Page
}
?>