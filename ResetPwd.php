<!DOCTYPE html>
<html>	

<head>
<title>Reset Password</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<script>

function validate()
{
	var code = document.getElementById("code").value;
	var pass = document.getElementById("newPass").value;
	var confirmpass = document.getElementById("confirmPass").value;
	
	if(isCode(code))
		if(passValidate(pass))
			if(confirmPass(pass,confirmpass))
				return true;
			else
				return false
		else
			return false
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
function passValidate(val)
{
	if(!checkEmpty(val,"Password"))
	{
		if(val.length>=8)
		{
			return true;
		}else
		{
			alert("Password should be atleast 8 characters !");
			return false;
		}
	}else
		return false;
}
function confirmPass(pass,confirmpass)
{
	if(!checkEmpty(confirmpass,"Confirm Password"))
	{
		if(pass==confirmpass)
			return true;
		else
		{
			alert("The passwords do not match !");
			return false;
		}
	}else
		return false;
}
function isCode(val)
{
	var temp = /^[0-9]+$/;
	if(!checkEmpty(val,"Verification Code"))
	{
		if(val.match(temp))
		{
			if(val.length==4)
				return true;
			else
			{
				alert("Verification code should consist of 4 digits !");
				return false;
			}
		}else
		{
			alert("Verification code should only consist of Numeric characters !");
			return false;
		}
	}else
		return false;
}

</script>

    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <!-- onlinefonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //Custom-Stylesheet-Links -->
</head>
	<body>
	
	<header>
        <h1 class="title-agile text-center">Reset Password Form</h1>
    </header>
	
	<section class="login-wrap">
        <div class="main_w3agile">
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked>
            <label for="tab-2" class="tab">Reset Password</label>	
	<div class="login-form">
		<div class="signup_wthree">

		<!-- Get email and get security question if email is correct -->
		<form method="POST" action="" id="resetp1">
            <div class="group">
                <label for="user1" class="label">Email Address</label>
                <input name="resetemail" id="resetemail" type="text" class="input" required>
            </div>
			<div class="group">
                <input type="submit" class="button" value="Confirm">
            </div>
		</form>

		<form method="POST" action="" id="resetp2">
			<div class="group">
				<input type="hidden" id="realsecans" name="realsecans" value="">
                <label id='secqst' for="user1" class="label">Security Question<br><?php  ?></label>
                <input id="secans" name="secans" type="text" class="input" required>
            </div>
			<div class="group">
                <input type="submit" class="button" value="Confirm">
            </div>
		</form>

		<form onsubmit="return validate()" method="POST" action="" id="resetp3">
                        <div class="group">
                            <label for="password1" class="label"> New Password</label>
                            <input id="newPass" name="newPass" type="password" class="input" data-type="password" required>
                        </div>
						
                        <div class="group">
                            <input type="submit" class="button" value="Confirm">
                        </div>
        </form>
		</div>
		</div>
		</div>
		</section>
	<body>				
</html>
<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = new mysqli("localhost","root","","spm");

	if(isset($_POST['resetemail'])){
		// Email entered
		$result1 = $connection->query("select Security_ques, Security_ans from student where Email_student='".$_POST['resetemail']."'");
		// if($connection->query("select Security_ques, Security_ans from student where Email_student='".$_POST['resetemail']."'")){
		// 	echo 'success';
		// }else
		// 	echo 'failed - '.mysql_error();
		if($result1->num_rows>0){
			// Email is in the system
			echo '<script>document.getElementById("resetp1").style.display="none"</script>';
			echo '<script>document.getElementById("resetp3").style.display="none"</script>';
			while($row=$result1->fetch_assoc()){
				echo '<script>document.getElementById("secqst").innerHTML+="'.$row['Security_ques'].'";</script>';
				echo '<script>document.getElementById("realsecans").value="'.$row['Security_ans'].'";</script>';
			}
		}else{
			// Email not found on the system db
			echo '<script>alert("Email provided did not match any record on the database !");</script>';
			echo '<script>document.getElementById("resetp2").style.display="none"</script>';
			echo '<script>document.getElementById("resetp3").style.display="none"</script>';
		}
	}else if(isset($_POST['realsecans'])){
		// question answered
		echo '<script>document.getElementById("resetp1").style.display="none"</script>';
		echo '<script>document.getElementById("resetp3").style.display="none"</script>';
		if($_POST['realsecans']===$_POST['secans']){
			// Security question passed
			echo '<script>document.getElementById("resetp1").style.display="none"</script>';
			echo '<script>document.getElementById("resetp2").style.display="none"</script>';
			echo '<script>document.getElementById("resetp3").style.display="inline"</script>';
		}else{
			// Security Question failed
			echo '<script>alert("Your answer did not match ! Please re-try !");</script>';
			echo '<script>document.getElementById("resetp1").style.display="inline"</script>';
			echo '<script>document.getElementById("resetp2").style.display="none"</script>';
			echo '<script>document.getElementById("resetp3").style.display="none"</script>';
		}
	}else if(isset($_POST['newPass'])){
		// New passwords entered. Change DB
		$pass=$_POST['newPass'];
		if($connection->query("update log set Password='$pass'")){
			echo '<script>alert("Password changed successfully !");</script>';
			echo '<script>window.location.replace("login.html");</script>';
		}else
			echo '<script>alert("An error occured ! Please re-try !");</script>';
	}else{
		// Email not entered
		echo '<script>document.getElementById("resetp2").style.display="none"</script>';
		echo '<script>document.getElementById("resetp3").style.display="none"</script>';
	}
?>