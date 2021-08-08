<?php 
session_start();
if(isset($_POST['post'])){
    //create database connection
    include "db.php";
    

    $prod_name = $_POST['prod_name'];
    $min_price = $_POST['min_price'];
    $closing_time = $_POST['closing_time'];
    $prod_desc = $_POST['prod_desc'];

    $sql = "INSERT INTO products(user_id, prod_name, min_price, closing_time, prod_desc)
    VALUES ('".$_SESSION['user_id']."','$prod_name' , '$min_price','$closing_time' , '$prod_desc' )";

    $result = mysqli_query($con, $sql);
    if ($result){
        echo "Post successfully!";
        header('Location: create_auc.php?Post Successfully!');
        exit();
    } else{
        echo "Failed to post!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create auction</title>
</head>

<body>
    <form action="" method="POST" >
        <h2>CREATE NEW AUCTION PRODUCT</h2>
        <table  cellspacing='5' cellpadding='5'>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="prod_name" required ></td>
            </tr>
            <tr>
                <td>Minimum Price (in USD)</td>
                <td><input type="int" name="min_price" required></td>
            </tr>
            <tr>
                <td>Closing time</td>
                <td><input type="datetime-local" name="closing_time" 
                 required></td>
            
            </tr>

            <br>
            <tr>
                <td valign="top">Description</td>
                <td><textarea name="prod_desc"  
                cols= "45" rows= "5" required ></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type ="submit" name="post" id="button"
                 value="Post" ></td>
            </tr>
        </table>
        <p>View auction product list? <a href = "view_auc.php">Click</a></p>
        <p> Go back to the Menu? <a href="menu.php"> Menu </a></p>
    </form>
</body>
</html>
