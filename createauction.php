<?php 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create auction page</title>
</head>

<body>
    <form id = "form1" name="form1" method="POST" >
        <h2>CREATE AUCTION</h2>
        <table  cellspacing='5' cellpadding='5'>
            <tr>
                <td>Item Name</td>
                <td><input type="text" name="item" id="item"></td>
            </tr>
            <tr>
                <td valign="top">Description</td>
                <td><textarea name="description" id ="description" 
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
