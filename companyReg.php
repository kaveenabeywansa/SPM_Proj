<?php
	include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Company Allocation</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Fabricate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
    
    <!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/lightbox.css">
	<!-- gallery light box -->
	<link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
    
    <!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Acme" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Web-Fonts -->
	
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-2.2.3.min.js"></script>
    
</head>

<body class="container-fluid" data-target=".fixed-top" data-spy="scroll">
	<header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">
				<span>I</span>ntern<span>s</span>hip</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			 aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center mr-lg-5">
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="#profile">Profile</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
						<a class="nav-link" href="companyReg.php">Company
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="forms.html">Form Submission</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Sign In | Sign Up</a>
					</li>
				</ul>
			</div>
		</nav>
		</header>
		<div class="container py-xl-5 py-lg-5">
			<div class="container py-xl-5 py-lg-5">
			<section class="login-wrap">
				<div class="main_w3agile">
					<h1 style="font: 25px bold black;">Company Allocation</h1>
					<div class="login-form">
						<form method="post" action="dbAction.php">
							<div class="group">
								<label for="company" class="label">Company Name</label>
								<select id="company" value="Company" class="input" name="company" required>
								<?php
									$result=mysqli_query($con,"select Name from employees");
									while($row=mysqli_fetch_array($result)){
										echo "<option name='".$row['Name']."'>".$row['Name']."</option>";
									}
									mysqli_close($con);
								?>
								</select>
							</div>
							<div class="group">
								<label for="start" class="label">Start Date</label>
								<input id="start" type="date" class="input" name="start" required>
							</div>
							<div class="group">
								<label for="password" class="label">Student Password</label>
								<input id="password" type="password" class="input" name="password" required>
							</div>
							<div class="group">
								<input type="submit" class="button" value="Allocate" name="allocate" onclick="return confirm('Are you sure?');">
							</div>
							<div class="hr"></div>
							<div class="foot-lnk">
								<h2><a href="#">Forgot Password?</a></h2>
							</div>
						</form>
					</div>
				</div>
    		</section>
			<div>
		<div>
	</body>
</html>
	