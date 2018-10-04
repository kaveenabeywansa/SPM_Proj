<?php
	session_start();
	//Looking for autherized user
	if(isset($_SESSION['username'])){	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Form Submission</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	
    
    <!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/lightbox.css">
	<!-- gallery light box -->
	<link rel="stylesheet" href="css/style1_v.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
    
    <!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Acme" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Web-Fonts -->
    
</head>

<body class="container-fluid">
	<!-- header -->
		<!-- navbar -->
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
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="schedule.php">Viva Schedule</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
						<a class="nav-link" href="forms.html">Form Submission
                            <span class="sr-only">(current)</span>
                        </a>
					</li>
					<li class="nav-item">
					<!-- To check whether the user has logged in or not -->
					<?php
							if(isset($_SESSION['username'])){
								echo '<a class="nav-link" href="logout_v.php">Log Out</a>';
							}
							else{
								echo '<a class="nav-link" href="login.html">Sign In | Sign Up</a>';
							}
						?>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container py-xl-5 py-lg-5">
			<div class="container py-xl-5 py-lg-5">
			<section class="login-wrap">
				<div class="main_w3agile">
					<h1 style="font: 25px bold black;">Form I-1 Submission</h1>
					<div class="login-form">
						<!-- Forms to submit -->
						<form method="post" action="dbAction.php" enctype="multipart/form-data">
							<div class="group">
								<input type="file" size="500" class="input" id="doc1" name="doc1">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Submit" name="submit1" onclick="return confirm('Are you sure?');">
							</div>
                            <div class="hr"></div>
                            <h1 style="font: 25px bold black;">Form I-3 Submission</h1>
                            <div class="group">
								<input type="file" size="50" class="input" id="doc3" name="doc3">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Submit" name="submit3" onclick="return confirm('Are you sure?');">
                            </div>
                            <div class="hr"></div>
                            <h1 style="font: 25px bold black;">Form I-6 Submission</h1>
                            <div class="group">
								<input type="file" size="50" class="input" id="doc6" name="doc6">
							</div>
							<div class="group">
								<input type="submit" class="button" value="Submit" name="submit6" onclick="return confirm('Are you sure?');">
							</div>
						</form>
						<!-- /Form to submit -->
					</div>
				</div>
    		</section>
			<div>
		<div>
</body>
</html>
<?php
	}
	else{
		//
		header("location:/SPM_Proj/index.html");
	}
?>