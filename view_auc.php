<?php
 session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>View auction list</title>
</head>

<body>
    <h2>VIEW AUCTION PRODUCT LIST</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
            include 'db.php';
            $sql = "SELECT * FROM products where user_id = '".$_SESSION['user_id']."' ";
            $result = mysqli_query($con,$sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){

        ?>
        <tbody>
            <tr>
                <td><?php echo $row['prod_id']; ?></td>
                <td><?php echo $row['prod_name']; ?></td>
                <td><?php echo $row['prod_desc']; ?></td>
                <td><a href="bid_info.php?view=<?php echo $row['prod_id']; ?>">
                <button type="button" class="btn btn-info">View</button></a></td>
            </tr>
        </tbody>
        <?php
                }
            } else {
                echo 'Result Not Found!';
            }

        ?>
       
    </table>
    <p>Create new auction product? <a href = "create_auc.php">Click</a></p>
    <p> Go back to the menu? <a href="menu.php"> Menu </a></p>
</body>

</html>
