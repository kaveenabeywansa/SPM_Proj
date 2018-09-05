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
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("#db", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from #table_name where password = '$password' AND email = '$email'" , $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username;// Initializing Session
header("location: index.html");// Redirecting To Other Page
} else {
$error = "email or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>





























<?php
	require 'dbconnect.php';
	session_start();
	
	if($_SESSION['logged']==0)
		loggedOut();
	else if($_SESSION['logged']==1)
		loggedIn();
	
	function loggedIn()
	{
		//echo '<script>alert("In")</script>';
		?>
		<style type="text/css">
		.signinbutton{	display: none;	}
		.signoutbutton{	display: unset;	}
		</style>
		<?php
	}
	function loggedOut()
	{
		//echo '<script>alert("Out")</script>';
		?>
		<style type="text/css">
		.signinbutton{	display: unset;	}
		.signoutbutton{	display: none;	}
		</style>
		<?php
	}
?>
<!DOCTYPE html>
<html>
<head>

<?php

if(isset($_GET['action'])=='Login')
	login();

function login()
{
	$adminresult = mysql_query("select password from Admin where username='".$_POST['username']."'");
	$adminpassword = mysql_fetch_array($adminresult);
	
	$result = mysql_query("select Customer_ID,Password from Customers where Email='".$_POST['username']."'");
	$password = mysql_fetch_array($result);
	
	if($adminpassword[0]==$_POST['password'])
	{
		echo '<script>alert("Welcome Admin !")</script>';
		echo "<script>location.href='adminHome.php'</script>";
	}else if($password['Password']==$_POST['password'])
	{
		//log the user in
		$_SESSION['logged']=1;
		$_SESSION['username']=$_POST['username'];
		$_SESSION['UserID']=$password['Customer_ID'];
		$_SESSION['cartCount']=0;
		$songs = array();
		$_SESSION['cartItems']=$songs;
		
		echo "<script>location.href='index.php'</script>";
	}else
	{
		//incorrect user details
		echo '<script>alert("Incorrect email address or password !")</script>';
	}
}

?>

<script>
function validate()
{
	var email = document.getElementById("username").value;
	var pass = document.getElementById("password").value;
	
	if(checkUsername(email))
		if(!checkEmpty(pass,'Password'))
			return true;
		else
			return false;
	else
		return false;
}

function checkEmpty(val,field)
{
	if(val=="" || val==null)
	{
		alert("You cannot have "+field+" field empty !");
		return true;
	}else
	{
		return false;
	}
}
function checkUsername(val)
{
	if(!checkEmpty(val,"Username"))
	{
		var at = val.indexOf("@");
		var dot = val.indexOf(".");
		if(at<1 || dot+2>=val.length || at+2>dot)
		{
			alert("Enter a valid email address as username");
			return false;
		}else
			return true;
	}else
		return false;
}
</script>

<!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <!-- onlinefonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //Custom-Stylesheet-Links --> <!--heading-->

<button onclick="location.href='logout.php'" class="signoutbutton" style="float: right;">
	Log Out
</button>

<button onclick="location.href='ResetPwd.php'" class="signoutbutton" style="width:170px;float: right;">
	Password Reset
</button>


<button onclick="location.href='login.php'" class="signinbutton" style="float: right;">
	Login
</button>

<button onclick="location.href='register.php'" class="signinbutton" style="float: right;">
	Register
</button>


</head>
<nav>
	<table  width="100%" class="navtab">
<tr align="center">
		<td><a href="index.html" class="navLinks">Home</a></td>
		<td><a href="Contact Us.php" class="navLinks">Contact Us</a></td>
		<td><a href="FAQ.php" class="navLinks">FAQ</a></td>
	</tr>
</table>
</nav>

<body>
	
</body>
<footer>
        <div class="copy-wthree text-center">
            <p>© 2018 All rights reserved
            </p>
        </div>
    </footer>
    <!-- //footer -->
</html>
	