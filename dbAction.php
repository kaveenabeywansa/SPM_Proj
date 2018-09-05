<?php
    session_start();
    include('dbconnect_v.php');
    
//CompanyReg
    if(isset($_POST['allocate'])){
        $contact=$_POST['company'];
        $age=$_POST['password'];
        $date=$_POST['start'];
        if(isset($_SESSION['username'])){
            mysqli_query($con,"insert into employees(Contact,Position,Dob) values('".$contact."','".$age."','".$date."')");
            header("Location: http://localhost/SPM_Proj/companyReg.php"); /* Redirect browser */
            exit();
        }
        
    }

//FormI-1
	if(isset($_POST['submit1'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc1']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name1 = $con->real_escape_string($_FILES['doc1']['name']);
                $file1 = $con->real_escape_string(file_get_contents($_FILES  ['doc1']['tmp_name']));
                mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file1."')");
                header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                exit();
            }
            else{
                echo 'alert("error")';
                header("Location: http://localhost/SPM_Proj/forms_v.php");
            }
            
        }
		
    }

//FormI-3
	if(isset($_POST['submit3'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc3']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name3 = $con->real_escape_string($_FILES['doc3']['name']);
                $file3 = $con->real_escape_string(file_get_contents($_FILES  ['doc3']['tmp_name']));
                mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file3."')");
                header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                exit();
            }
            else{
                echo 'alert("error")';
                header("Location: http://localhost/SPM_Proj/forms_v.php");
            }
        }
		
    }

//FormI-6
	if(isset($_POST['submit6'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc6']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name6 = $con->real_escape_string($_FILES['doc6']['name']);
                $mime6 = $con->real_escape_string($_FILES['doc6']['type']);
                $file6 = $con->real_escape_string(file_get_contents($_FILES  ['doc6']['tmp_name']));
                $size6 = intval($_FILES['doc6']['size']);
                mysqli_query($con,"insert into employees(Contact,Position,a) values('aaa','aaa','".$file6."')");
                header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                exit();
            }
            else{
                echo 'alert("error")';
                header("Location: http://localhost/SPM_Proj/forms_v.php");
            }
        }
		
    }

//Viva_schedule
    if(isset($_POST['schedule'])){
        if(isset($_SESSION['username'])){
            $name=$_SESSION['username'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            $venue=$_POST['venue'];
                mysqli_query($con,"insert into employees(username,date,time,venue) values('".$name."','".$date."','".$time."','".$venue."')");
                header("Location: http://localhost/SPM_Proj/viva_schedule_v.php"); /* Redirect browser */
                exit();
        }
    }
	mysqli_close($con);
?>