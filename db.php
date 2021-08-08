<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "auction";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_errno())
{
	echo "Failed to connect!" . mysqli_connect_error();
} else {
	//echo "Database connected successfully";
}
?>