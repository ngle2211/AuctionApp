<?php 
session_start();

	include("db.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<body>
    <h2>MENU</h2>
    <br>
	Hello <?php echo $user_data['fname'];  ?>. Welcome to the auction menu !
    <ul>
        <li><a href = "create_auc.php">Create auction product </a> </li>
        <br/>
        <li><a href = "view_auc.php">View auction product list</a></li>
    </ul>

    <h3><a href="logout.php">Log out</a></h3>
    </body>
</html>
