<?php
require 'dbconnectionsup.php';

$target_dir = "uploads/i1/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 25000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $ext = end((explode(".", $_FILES["fileToUpload"]["name"])));
    $target_file2 = $target_dir . $_POST['stdid'] .'_'. date('d_m_Y_H_i_s') . '.'. $ext;
    // $qry="insert into supervisor_forms(Username,Student_id,Date,FormI_1) values('admin','".$_POST['stdid']."','".date('Y-m-d')."','$target_file2')";
    $qry="update supervisor_forms set FormI_1='".$target_file2."' where Email_student='".$_POST['stdid']."'";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {
        if($conn->query($qry)){
            header('Location: '.'supdowni1form?ustatus=true');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //header('Location: '.'supdowni1form?ustatus=false&type=db');
        }
    } else {
        header('Location: '.'supdowni1form?ustatus=false&type=file');
    }
    
}
?>