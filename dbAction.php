<?php
    include('dbconnect_v.php');
    
//CompanyReg
    if(isset($_POST['allocate'])){
        $contact=$_POST['company'];
        $age=$_POST['password'];
        $date=$_POST['start'];
        mysqli_query($con,"insert into employees(Contact,Position,Dob) values('".$contact."','".$age."','".$date."')");
        header("Location: http://localhost/web/companyReg.php"); /* Redirect browser */
        exit();
    }

//FormI-1
	if(isset($_POST['submit1'])){
		$name1 = $con->real_escape_string($_FILES['doc1']['name']);
        $file1 = $con->real_escape_string(file_get_contents($_FILES  ['doc1']['tmp_name']));
		mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file1."')");
        header("Location: http://localhost/web/forms.html"); /* Redirect browser */
        exit();
    }

//FormI-3
	if(isset($_POST['submit3'])){
		$name3 = $con->real_escape_string($_FILES['doc3']['name']);
        $file3 = $con->real_escape_string(file_get_contents($_FILES  ['doc3']['tmp_name']));
		mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file3."')");
        header("Location: http://localhost/web/forms.html"); /* Redirect browser */
        exit();
    }

//FormI-6
	if(isset($_POST['submit6'])){
		$name6 = $con->real_escape_string($_FILES['doc6']['name']);
        $mime6 = $con->real_escape_string($_FILES['doc6']['type']);
        $file6 = $con->real_escape_string(file_get_contents($_FILES  ['doc6']['tmp_name']));
        $size6 = intval($_FILES['doc6']['size']);
		mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file6."')");
        header("Location: http://localhost/web/forms.html"); /* Redirect browser */
        exit();
    }
	mysqli_close($con);
?>