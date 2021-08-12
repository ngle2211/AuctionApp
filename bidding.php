<?php
    session_start();
    include "db.php";
        // check connection
    if (mysqli_connect_errno()){
        echo "Falied to connect to Mysql" . mysqli_connect_error();
    }
    // check if user session is not set then this page will jump to login page
    if (!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
if(isset($_GET['bidnow'])){
    include 'db.php';
    $prod_id = $_GET['bidnow'];

}


?>
<form action="" method="POST" >
        <h2>ADD BID</h2>
        <table  cellspacing='5' cellpadding='5'>
            <tr>
                <td>Product ID</td>
                <td><input type="text" name="prod_id" required 
                value="<?php echo $prod_id;  ?>"></td>
            </tr>
            <tr>
                <td>Price (in USD)</td>
                <td><input type="int" name="price" required></td>
            </tr>
           
            <tr>
                <td>&nbsp;</td>
                <td><input type ="submit" name="bid" id="button"
                 value="Submit Proposal" ></td>
            </tr>
        </table>
        
        <p> Wanna go back? <a href="view_auc.php"> Click </a></p>

        <?php
        if(isset($_POST['bid'])){
            include 'db.php';

            $prod_id = mysqli_real_escape_string($con,$_POST['prod_id']) ;
            $price = mysqli_real_escape_string($con,$_POST['price']) ;

            $sql = "INSERT INTO bids (user_id, price, prod_id, bid_time)
            VALUES (".$_SESSION['user_id'].",'$price', '$prod_id', NOW())";

            $result = mysqli_query($con,$sql);
            if ($result){
                echo "<p style='color:red;'>Proposal Submit Successfully!</p>";
                exit();
            } else{
                echo "Failed to submit!";
                }
        }
?>
</form>
</body>

</html>