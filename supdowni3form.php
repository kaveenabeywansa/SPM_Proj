<!DOCTYPE html>
<?php
    require 'dbconnectionsup.php';
    // check if user has logged in using sessions
    $cmpRes =$conn->query("SELECT * 
    FROM supervisor s inner join log l on l.Username=s.Email_supervisor
    WHERE l.Username='admin@a.com' LIMIT 1"); // Get email from user sessions
    $row = $cmpRes->fetch_assoc();
    $comp = $row['Company'];
    //get data related to the supervisor
    $results=$conn->query("select * 
    from student s inner join student_forms sf ON s.Email_student=sf.Email_student
    inner join supervisor_forms sp ON sp.Email_student=s.Email_student
    where Company='$comp' AND verfication=1 AND sf.FormI_3 is not null and (sp.FormI_3 is null or sp.FormI_3='')");
?>
<html lang="en">
<head>
	<title>Attest Form I-3</title>
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
    <link rel="stylesheet" type="text/css" href="css/supervisor.css">
	<!-- Font-Awesome-Icons-CSS -->
    
    <!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Acme" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Web-Fonts -->

    <!-- Check if returning from upload page and show message -->
    <?php
        if(isset($_GET['ustatus'])){
            if($_GET['ustatus']==='true'){
                echo '<script>alert("Successfully uploaded !");</script>';
            }else if($_GET['type']==='file'){
                echo '<script>alert("Error occured while uploading to server ! Please re-try !");</script>';
            }else if($_GET['type']==='db'){
                echo '<script>alert("Error occured while saving information to database ! Please re-try !");</script>';
            }
        }
    ?>
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
						<a class="nav-link" href="supverifystudent">Verify Students</a>
					</li>
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="supdowni1form">Fill Form I-1</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
						<a class="nav-link" href="supdowni3form">Attest I-3 Forms
                        <span class="sr-only">(current)</span></a>
					</li>
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="supdowni5form">Feedback Form I-5</a>
					</li>
					 
					<!--<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="formI-6.php">I-6 form</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="login.html">Sign In | Sign Up</a>
					</li>
				</ul>
			</div>
        </nav>
        <div class="suphead">
        <center>
            <h1>Download & Re-Upload I-3 Forms</h1>
        </center>
        </div>
		<div class="supform">
        <table class="dsptab">
            <tr>
                <th width="20%">NIC</th>
                <th width="50%">Name</th>
                <th width="15%">Download</th>
                <th width="15%">Upload</th>
            </tr>
            <?php
            //
            $count=0;
            if($results->num_rows>0){
                while($row=$results->fetch_assoc()){ //$row['fname']
                    $count++;
                    echo '<tr>
                        <td>'.$row["NIC_Passport"].'</td>
                        <td>'.$row["First_Name"]." ".$row["Last_Name"].'</td>
                        <td>
                            <center>
                                <a href="supervisorformi3download.php?email='.$row["Email_student"].'" ><img src="images/downloadicon.png" alt="Download Form" height="50" width="50"></a>
                            </center>
                        </td>
                        <td><div class="uploaddiv">
                            <form action="supi3formupload.php" method="post" enctype="multipart/form-data"">
                                <input type="hidden" name="stdid" id="stdid" value="'.$row["Email_student"].'">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="clicked(this,'.$count.')">
                                        </td>
                                    </tr>
                                    <tr><td></td></tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="Upload Form I-3" name="submit" id="formuploadbtn'.$count.'">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            </div>
                        </td>
                    </tr>';
                }
            }else{
                echo 'No any pending submissions !';
            }
            ?>
        </table>
        </div>
<script>
    //hide all upload buttons at first
    var y = <?php echo $results->num_rows?>;
    for(var i=1;i<=2;i++){
        document.getElementById('formuploadbtn'+i).style.display = 'none';
    }
    function clicked(sel,count){
        //alert(sel.value);
        if(sel.value==null ||sel.value==""){
            //null
            document.getElementById('formuploadbtn'+count).style.display = 'none';
        }
        else{
            //not null
            document.getElementById('formuploadbtn'+count).style.display = 'inline';
        }
    }
</script>
</body>
</html>
