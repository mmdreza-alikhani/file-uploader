<?php
require_once "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آپلودر</title>
    <style>
        *{
            font-family: "Calibri Light", serif;
        }
        body {
            direction: rtl;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        .text-right{
            text-align: right!important;
        }

        .uploader-form {
            max-width: 400px;
            margin: auto;
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>آپلودر</h2>

    <form action="controllers/upload.php" method="post" enctype="multipart/form-data" class="uploader-form">
        تصویر خود را انتخاب کنید.
        <input class="input" type="file" name="image" id="image">
        <input class="submit-button" type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>