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
	Hello <?php echo $user_data['fname'];  ?>. Here is the menu !
    <ul>
        <li><a href = "create_prod.php">Create new auction product</a> </li>
        <br/>
        <li><a href = "view_prod.php">View auction product list</a></li>
        <br/>
        <li><a href = "view_auc.php">View open auction</a></li>
        
        
    </ul>

    <h3><a href="logout.php">Log out</a></h3>
    </body>
</html>
