<?php
//Create Database
$conn = new mysqli("localhost", "root", "password") or die("Connection Error");
$sql = "CREATE DATABASE IF NOT EXISTS munimji";
$conn->query($sql) or die("Error In Database Creation");

//Create tables
$con = new mysqli("localhost", "root", "password", "munimji");
$sql = "CREATE TABLE IF NOT EXISTS transactions(id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, reason VARCHAR(100) NOT NULL, deposit INT(8), withdraw INT(8), balance INT(8) NOT NULL, cur_date TIMESTAMP)";
$con->query($sql) or die("Error In Database Creation");

//Closing Connection
$conn->close();
$con->close();

echo "Successfull";
?>