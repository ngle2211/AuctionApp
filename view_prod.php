<?php
 session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>View product list</title>
</head>

<body>
    <h2>VIEW YOUR AUCTION PRODUCT LIST</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product name</th>
                <th>Closing time</th>
                <th>Description</th>
                <th>Minimum Price</th>
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
        <script>
            // Set the date we're counting down to
        var countDownDate = new Date("<?php echo $row['closing_time'] ?>").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
        }, 1000);
        </script>
        <tbody>
            <tr >
                <td><?php echo $row['prod_id']; ?></td>
                <td><?php echo $row['prod_name']; ?></td>
                <td><?php echo $row['closing_time']; ?></td>
                <td><?php echo $row['prod_desc']; ?></td>
                <td><?php echo $row['min_price']; ?></td>
                <td><a href="bid_info.php?view=<?php echo $row['prod_id']; ?>">
                <button type="button" class="btn btn-info">View Bid Info</button></a></td>
            </tr>
        </tbody>
        <?php
                }
            } else {
                echo "<p style='color:red;'>The list is empty now!</p>";
            }

        ?>
       
    </table>
    <p>Create new product? <a href = "create_prod.php">Click</a></p>
    <p> Go back to the menu? <a href="menu.php"> Menu </a></p>
</body>

</html>
