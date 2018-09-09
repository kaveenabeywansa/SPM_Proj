<?php
    require 'dbconnectionsup.php';
    $email=$_GET['email'];
    $result=$conn->query("select FormI_1,FormI_1_Up from student_forms where Email_student='$email'");
    if($result->num_rows == 1) {
        // Get the row
            $row = mysqli_fetch_assoc($result);
            // Print data
            header("Content-Type: ". $row['FormI_1_Up']);
            // header("Content-Length: ". $row['size']);
            // header("Content-Disposition: attachment; filename=". $row['name']);

            echo $row['FormI_1'];
        }
        else {
            echo 'No Form Found !';
        }
?>