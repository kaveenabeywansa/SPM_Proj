<?php
    session_start();
    //Database file
    include('dbconnect_v.php');

//FormI-1 submission
	if(isset($_POST['submit1'])){
        if($con->real_escape_string(file_get_contents($_FILES['doc1']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name1 = $con->real_escape_string($_FILES['doc1']['name']);
                $file1 = $con->real_escape_string(file_get_contents($_FILES['doc1']['tmp_name']));
                $content = $con->real_escape_string($_FILES['doc1']['type']);
                if(mysqli_query($con,"insert into student_forms (Email_student,FormI_1,FormI_1_Up) values ('".$_SESSION['username']."','".$file1."','".$content."')")){
                    header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                    exit();
                }
            }
            else{
                header("Location: http://localhost/SPM_Proj/logout.php");
            }
        }
        else{
            die("error");
        }
        
        header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
            

    }

//FormI-3 submission
	if(isset($_POST['submit3'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc3']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name1 = $con->real_escape_string($_FILES['doc3']['name']);
                $file3 = $con->real_escape_string(file_get_contents($_FILES['doc3']['tmp_name']));
                $content = $con->real_escape_string($_FILES['doc3']['type']);
                if(mysqli_query($con,"insert into student_forms (Email_student,FormI_3,FormI_3_Up) values ('".$_SESSION['username']."','".$file3."','".$content."')")){
                    header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                    exit();
                }
                else{
                    die("error");
                }
            }else{
                header("Location: http://localhost/SPM_Proj/logout.php");
            }
        }
        else{
            echo 'alert("Error in submitting)';
        }
        header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
        exit();
		
    }

//FormI-6 Submission
	if(isset($_POST['submit6'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc6']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name6 = $con->real_escape_string($_FILES['doc6']['name']);
                $mime6 = $con->real_escape_string($_FILES['doc6']['type']);
                $file6 = $con->real_escape_string(file_get_contents($_FILES['doc6']['tmp_name']));
                $size6 = intval($_FILES['doc6']['size']);
                if(!mysqli_query($con,"update student_forms set FormI_7='".$file6."',FormI_6_Up='".$mime6."' where Email_student='".$_SESSION['username']."'")){
                    die("error");
                }
                header("Location: http://localhost/SPM_Proj/forms_v.php"); /* Redirect browser */
                exit();
            }
            else{
                echo "<script type='text/javascript'>alert('error');</script>";
                header("Location: http://localhost/SPM_Proj/forms_v.php");
            }
        }
		
    }

//Viva_schedule
    if(isset($_POST['schedule'])){
        if(isset($_SESSION['username'])){
            $name=$_POST['name'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            $venue=$_POST['venue'];
            //Check whether fields are empty
            if($name == '' && $date == '' && $time == '' && $venue == ''){
                die("error");
            }
            else{
                if(mysqli_query($con,"insert into viva(Email_student,Date,Time,Venue) values('".$name."','".$date."','".$time."','".$venue."')")){
                    echo "<script type='text/javascript'>alert('hi');</script>";
                }
                header("Location: http://localhost/SPM_Proj/viva_schedule_v.php"); /* Redirect browser */
                exit();
            }
                
        }
    }
	mysqli_close($con);
?>