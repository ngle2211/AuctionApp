<?php 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create auction</title>
</head>

<body>
    <form id = "form1" name="form1" method="POST" >
        <h2>CREATE AUCTION PRODUCT</h2>
        <table  cellspacing='5' cellpadding='5'>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="prod_name" ></td>
            </tr>
            <tr>
                <td>Minimum Price</td>
                <td><input type="text" name="min_price"></td>
            </tr>
            <tr>
                <td valign="top">Description</td>
                <td><textarea name="description"  
                cols= "45" rows= "5" ></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type ="submit" name="buton" id="button"
                 value="Submit" ></td>
            </tr>
        </table>
        <p> Go back to the menu? <a href="menu.php"> Menu </a></p>
    </form>
</body>
</html>
