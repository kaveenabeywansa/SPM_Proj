<?php
    require 'dbconnectionsup.php';
    $email = $_GET['email'];
    $qry="update student set verfication=1 where Email_student='$email'";
    if($conn->query($qry)){
        // echo '<script>alert("Activated !")</script>';
        header('Location: '.'supverifystudent');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //header('Location: '.'supdowni1form?ustatus=false&type=db');
    }
?>
