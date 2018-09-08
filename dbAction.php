<?php
    session_start();
    include('dbconnect_v.php');
    $_SESSION['username']="IT11";

//FormI-1
	if(isset($_POST['submit1'])){
        if($con->real_escape_string(file_get_contents($_FILES['doc1']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name1 = $con->real_escape_string($_FILES['doc1']['name']);
                $file1 = $con->real_escape_string(file_get_contents($_FILES['doc1']['tmp_name']));
                $res=mysqli_query($con,"select * from student_forms where It_number='".$_SESSION['username']."' and FormI_1='".$file1."'");
                if($res==null){
                    if(!mysqli_query($con,"insert into student_forms (It_number,FormI_1) values ('".$_SESSION['username']."','".$file1."')")){
                        die("error");
                    }
                }
                else{
                    die("Cannot Submit because you already submitted that.");
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

//FormI-3
	if(isset($_POST['submit3'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc3']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name1 = $con->real_escape_string($_FILES['doc3']['name']);
                $file3 = $con->real_escape_string(file_get_contents($_FILES['doc3']['tmp_name']));
                if(mysqli_query($con,"insert into student_forms (It_number,FormI_3) values ('".$_SESSION['username']."','".$file3."')")){
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

//FormI-6
	if(isset($_POST['submit6'])){
        if($con->real_escape_string(file_get_contents($_FILES  ['doc6']['tmp_name']))!=null){
            if(isset($_SESSION['username'])){
                $name6 = $con->real_escape_string($_FILES['doc6']['name']);
                $mime6 = $con->real_escape_string($_FILES['doc6']['type']);
                $file6 = $con->real_escape_string(file_get_contents($_FILES['doc6']['tmp_name']));
                $size6 = intval($_FILES['doc6']['size']);
                if(!mysqli_query($con,"update student_forms set FormI_6='".$file6."' where It_number='".$_SESSION['username']."'")){
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
                if(mysqli_query($con,"insert into viva(It_number,Date,Time,Venue) values('".$name."','".$date."','".$time."','".$venue."')")){
                    echo "<script type='text/javascript'>alert('hi');</script>";
                }
                header("Location: http://localhost/SPM_Proj/viva_schedule_v.php"); /* Redirect browser */
                exit();
            }
                
        }
    }
	mysqli_close($con);
?>