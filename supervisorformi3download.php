<?php
    require 'dbconnectionsup.php';
    $email=$_GET['email'];
    $result=$conn->query("select FormI_3,FormI_3_Up from student_forms where It_number='$email'");
    if($result->num_rows == 1) {
        // Get the row
            $row = mysqli_fetch_assoc($result);
            // Print data
            header("Content-Type: ". $row['FormI_3_Up']);
            // header("Content-Length: ". $row['size']);
            // header("Content-Disposition: attachment; filename=". $row['name']);

            echo $row['FormI_3'];
        }
        else {
            echo 'No Form Found !';
        }
?>