<?php
global $con;
require_once "../config/db.php";
$target_dir = "../uploads/";
$target_file = $target_dir . "format-" . time() . "-" . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "فایل آپلود شده تصویر نیست.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "فابل از قبل وجود دارد.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    echo "حجم فایل باید کمتر از پنج مگابایت باشد.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $fileName = basename($_FILES["image"]["name"]);
        $insert = $con->query("INSERT INTO files (name) VALUES('$fileName')");
        echo "تصویر شما با نام: ". htmlspecialchars( basename( $_FILES["image"]["name"])). "با موفقیت آپلود شد. ";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>