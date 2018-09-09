<?php
include('session_connect.php')
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Home</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Fabricate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/lightbox.css">
	<!-- gallery light box -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Acme" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body data-spy="scroll" data-target=".fixed-top">
	<!-- header -->
	<header>
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
					<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="viva_shedule.html">Viva Shedule</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link scroll" href="grading.html">Gradings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#logout">Log out</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile
						<span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- //navbar ends here -->
	</header>
	<!-- //header -->

<body class="banner-w3l">

<div class="title-agile">

        <h1 class="title-agile text-center">Profile</h1>
    
	</div>
	 <section class="login-wrap">
        <div class="main_w3agile">
            
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked>
            <label for="tab-2" class="tab">Profile</label>
            <div class="login-form">
                <!-- profile  -->
                <div class="signup_wthree">
                    <?php
					if($Userype == "student"){
					echo "<h1>"."Student profile"."</h1>"."<br/>"."<br/>";
					echo "First Name				:".$fname."<br/>"."<br/>";
					echo "Last Name				    :".$lname."<br/>"."<br/>";
					echo "NIC				        :". $nic."<br/>"."<br/>";
					echo "email				        :".$email."<br/>"."<br/>";
					echo "mobile				    :".$mobile."<br/>"."<br/>";
					echo "company				    :".$company."<br/>"."<br/>";
					echo "address				    :".$address."<br/>"."<br/>";
					echo "grading				    :".$grading."<br/>"."<br/>";
					}
					else if($Userype == "supervisor"){
						echo "<h1>"."Supervisor profile"."</h1>"."<br/>"."<br/>";
					echo "Email						:".$email."<br/>"."<br/>";
					echo "Company				    :".$company."<br/>"."<br/>";
					echo "Mobile				    :".$mobile."<br/>"."<br/>";
					}
					else{
						echo "<h1>"."ITM profile"."</h1>"."<br/>"."<br/>";
					echo "Name						:".$name."<br/>"."<br/>";
					echo "Mobile				    :".$mobile."<br/>"."<br/>";
					echo "email				        :".$Email_itm."<br/>"."<br/>";
					}
					?>
                </div>
                <!-- //profile -->
               
        </div>
    </section>
	
	 <footer>
        <div class="copy-wthree text-center">
            <p>© 2018 All rights reserved
            </p>
        </div>
    </footer>
	
	
<!--<section class="login-wrap">
<div class="main_w3agile">
<div class="login-form">


</div>
</div>
</section>-->
</body>


</html>
