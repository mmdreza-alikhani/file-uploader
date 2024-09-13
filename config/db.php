<?php

$con = new mysqli('localhost', 'root', '', 'uploader');
if($con->connect_error){
    die("connection error: $con->connect_error");
}
