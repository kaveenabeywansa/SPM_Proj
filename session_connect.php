<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = @mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db name", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from student where user_name='$user_check'", $connection);
$row=mysql_fetch_array($ses_sql);
$login_session =$row['user_name'];

    $email = $row['email'];//." ".$row['vLastName'];
    $username = $row['user_name'];
    $password = $row['password'];
    $photo = $row['photo'];
//if(!isset($login_session)){
//mysql_close($connection); // Closing Connection
//header('Location: index.html'); // Redirecting To Home Page
//}
?>