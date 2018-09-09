<?php
    //Connection with the database
    $con=mysqli_connect('localhost','root','','spm');

    if(mysqli_connect_errno()){
        echo "Failed to connect to Database".mysqli_connect_error();
    }
?>