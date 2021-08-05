<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "auction";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Failed to connect!");
}
?>