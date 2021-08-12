<?php
session_start();
include 'db.php';

$output = '';
$order = $_POST["order"];

if($order == 'desc')  
{  
     $order = 'asc'; 
     echo "<p style='color:red;'>IN DESC MODE</p>";
}  
else  
{  
     $order = 'desc'; 
     echo "<p style='color:red;'>IN ASC MODE</p>";
}

$query = "SELECT * 
          FROM products 
          WHERE NOT user_id = '".$_SESSION['user_id']."'
          ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."  ";  
$result = mysqli_query($con, $query);  

$output .='
<table>
        <thead>
            <tr>

                <th>Product ID</th>
                <th>Product name</th>
                <th><a class="column_sort" data-order="'.$order.'" href="#" id="closing_time">Closing time</a></th>
                <th>Description</th>
                <th>Minimum Price</th>
                <th>Action</th>
            </tr>
        </thead>
';
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '
        <tbody>
            <tr>
                <td>' . $row["prod_id"] . '</td>
                <td>' . $row["prod_name"] . '</td>
                <td>' . $row["closing_time"] . '</td>
                <td>' . $row["prod_desc"] . '</td>
                <td>' . $row["min_price"] . '</td>
                <td><a href="bidding.php?bidnow=' . $row["prod_id"] . '">
                <button type="button"> Bid Now</button></a></td>
            </tr>
        </tbody>
        ';
    }

} else {
    echo "<p style='color:red;'>Result Not Found!</p>";
}

$output .= '</table>';
echo $output;
?>