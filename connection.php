<?php
$con = new mysqli("localhost", "root", "password", "munimji", "3306");

if($con->connect_error){
    die("Database Connection Error");
}
?>