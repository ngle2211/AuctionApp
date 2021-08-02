<?php

// $user = 'app_user';
// $pass = 'password';

// global $dbh;

// $dbh = new PDO('mysql:host=localhost;dbname=user_db', $user, $pass);

//create a databse connection
$conn = mysqli_connect("localhost","root","") or die('Internal server error, cannot connect to the local host');

//select a database to use
$db_select = mysqli_select_db($conn, "auction") or die('Internal server error, cannot connect to the database');


?>