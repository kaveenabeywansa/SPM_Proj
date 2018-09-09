<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $email and $password
$email=$_POST['email'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "","spm");
// Selecting Database
//$db = mysql_select_db("spm", $connection);
// SQL query to fetch information of registerd users and finds user match.

$query = mysqli_query($connection,"select * from log where Password = '$password' AND Username = '$email'" );

//$query = $connection->query("select * from log where password = '$password' AND Username = '$email'");

$rows = $query->num_rows;

if ($rows == 1) {
$_SESSION['login_user']=$username;// Initializing Session
header("location: index.html");// Redirecting To Other Page
} else {
$error = "email or Password is invalid";
echo '<script>alert("Incorrect credentials");</script>';

}
mysqli_close($connection); // Closing Connection
}
}
?>



























