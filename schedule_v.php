<?php
    session_start();
	include('dbconnect_v.php');
	if(isset($_SESSION['username'])){	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>View Schedule</title>
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
						<a class="nav-link" href="forms_v.php">Form Submission</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
						<a class="nav-link" href="schedule.php">Viva Schedule
                            <span class="sr-only">(current)</span>
                        </a>
					</li>
					<li class="nav-item">
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
					<h1 style="font: 25px bold black;">Viva Schedule</h1>
					<div class="login-form">
                    <table class="table">
                        <thead>
                            <tr>
								<th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Venue</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="select v.Email_student as ES,v.Date as Date,v.Time as Time,v.Venue as Venue from viva v,student s where v.Email_student=s.Email_student"; 
								$result=mysqli_query($con,$query);
								$i=1;
                                while($row=mysqli_fetch_array($result)){
                                   echo '<tr>
										<form method="post" action="dbAction.php">
											<th scope="row">'.($i++).'</th>
											<td>'.$row['ES'].'</td>
											<td>'.$row['Date'].'</td>
											<td>'.$row['Time'].'</td>
											<td>'.$row['Venue'].'</td>
										</form>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
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
		header("Location: http://localhost/SPM_Proj/index.html");
	}
?>