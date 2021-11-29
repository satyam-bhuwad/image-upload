<?php
//database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "staff";

//create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//check connection
if ($db->connect_error) {
	die("connection failed:" . $db->connect_error);
}

?>