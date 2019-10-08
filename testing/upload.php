<?php 

if(isset($_POST['upload'])){

    error_reporting(0);

    // echo "<pre>";

    // print_r($_FILES['file_upload']);

    // echo "</pre>";

    $upload_errors = array(

        UPLOAD_ERR_OK           => "Tidak ada Error",
        UPLOAD_ERR_INI_SIZE     => "",
        UPLOAD_ERR_FORM_SIZE    => "",
        UPLOAD_ERR_PARTIAL      => "file yang diunggah hanya sebagian",
        UPLOAD_ERR_NO_FILE      => "tidak ada file yang diunggah",
        UPLOAD_ERR_NO_TMP_DIR   => "tidak ada folder sementara",
        UPLOAD_ERR_CANT_WRITE   => "Gagal untuk menulis ke disk",
        UPLOAD_ERR_EXTENSION    => "PHP extension berhenti mengunggah file"
    );

    // tmp_name
    $temp_name = $_FILES['file_upload']['tmp_name'];
    $file = $_FILES['file_upload']['name'];
    $directory = "uploads";

    // move uploaded file
    if(move_uploaded_file($temp_name, $directory . "/" . $file)){
        $msg = "File Sukses diupload";

    } else {
        $the_error = $_FILES['file_upload']['error'];
        $msg = $upload_errors[$the_error];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
    <h2>
    <?php
        if(!empty($upload_errors)){

            echo $msg;
        }
    ?>
    </h2>
        <input type="file" name="file_upload" />  <br />
        <input type="submit" name="upload" value="Upload" />
    </form>
</body>
</html>