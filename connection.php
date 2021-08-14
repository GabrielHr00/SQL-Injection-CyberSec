<?php

$dbhost= "localhost";
$dbuser= "root";
$dbpass = "";
$dbname = "log_in";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
	die("Connection failed!");
}