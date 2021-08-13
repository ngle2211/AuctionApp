<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View auction</title>
    <title>Webslesson Tutorial | Ajax Jquery Column Sort with PHP & MySql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
          
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
    <h2>VIEW OPEN AUCTION</h2>
    <div id="table">
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product name</th>
                <th><a class="column_sort" data-order="desc" href="#" id="closing_time">Closing time</a></th>
                <th>Description</th>
                <th>Minimum Price</th>

                <th>Action</th>
            </tr>
        </thead>
        <?php
            include 'db.php';
            
            $sql = "SELECT * 
                    FROM products 
                    WHERE NOT user_id = '".$_SESSION['user_id']."'
                    ORDER BY closing_time ASC ";
            $result = mysqli_query($con,$sql);

            

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){

        ?>
        
        <tbody>
            <tr>
                <td ><?php echo $row['prod_id']; ?></td>
                <td ><?php echo $row['prod_name']; ?></td>
                <td><?php echo $row['closing_time']; ?></td>
                <td><?php echo $row['prod_desc']; ?></td>
                <td><?php echo $row['min_price']; ?></td>
              
                <td><a href="bidding.php?bidnow=<?php echo $row['prod_id']; ?>">
                <button type="button"> Bid Now</button></a></td>
            </tr>
        </tbody>
        <?php
                }
            } else {
                echo "<p style='color:red;'>Result Not Found!</p>";
            }
        ?>
    </table>
    </div>
    <br>
    <p> Go back to the menu? <a href="menu.php"> Menu </a></p>
</body>
</html>

<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("id");  
           var order = $(this).data("order");  
           var arrow = '';  
           //glyphicon glyphicon-arrow-up  
           //glyphicon glyphicon-arrow-down  
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  
 </script>
