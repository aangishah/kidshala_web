<?php
$uploadDir = '3d_uploads/';

$verifyToken = md5('unique_salt');

if (!empty($_FILES)) {
    $tempFile   = $_FILES['userfile']['tmp_name'];
    $uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
    $targetFile = $uploadDir . $_FILES['userfile']['name'];
    // Save the file
    move_uploaded_file($tempFile, $targetFile);
    echo 1;
}

?>