<?php
    require 'dbconnectionsup.php';
    $itnumber=$_GET['itnum'];
    $result=$conn->query("select FormI_3 from student_forms where It_number='$itnumber'");
    if($result->num_rows == 1) {
        // Get the row
            $row = mysqli_fetch_assoc($result);
            // Print data
            header("Content-Type: ". $row['mime']);
            header("Content-Length: ". $row['size']);
            header("Content-Disposition: attachment; filename=". $row['name']);

            echo $row['FormI_1'];
        }
        else {
            echo 'No Form Found !';
        }
?>