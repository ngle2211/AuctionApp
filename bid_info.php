<?php
 session_start();
 
?>
<!DOCTYPE html>
<html>

<body>
<div>
<h2>AUCTION PRODUCT BID INFORMATION</h2>
<table>
        <thead>
            <tr>
                <th colspan="2">Product ID</th>
                <th colspan="2">Product name</th>
                <th colspan="2">Description</th>
                <th colspan="2">Closing time</th>
               
            </tr>
        </thead>
        <?php
            if(isset($_GET['view'])) {
                include 'db.php';
                $prod_id = $_GET['view'];
                $sql = "SELECT * FROM products where prod_id = '".$_GET['view']."' ";
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
            
        
            <tr>
                <td colspan="2"><?php echo $row['prod_id']; ?></td>
                <td colspan="2"><?php echo $row['prod_name']; ?></td>
                <td colspan="2"><?php echo $row['prod_desc']; ?></td>
                <td colspan="2" ><?php echo $row['closing_time']; ?></td>
                <td colspan="2"><a href="bid_info.php?view=<?php echo $row['prod_id']; ?>">
                
            </tr>

            <tr>
                <td><b>Time Left:</b></td>
                <td colspan="3"> <p id="demo"></p></td>
            </tr>
            
        </tbody>
        <?php
                }
            } else {
                echo 'Result Not Found!';
            }
        }

        ?>
    </table>

</div>



</body>
</html>