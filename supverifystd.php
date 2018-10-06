<?php
    require 'dbconnectionsup.php';
    $email = $_GET['email'];
    $qry="update student set verfication=1 where Email_student='$email'";
    $qry2="insert into supervisor_forms(Email_student,Date) values('$email',NOW())";
    if($conn->query($qry)){
        // echo '<script>alert("Activated !")</script>';
        $conn->query($qry2);
        header('Location: '.'supverifystudent');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //header('Location: '.'supdowni1form?ustatus=false&type=db');
    }
?>
