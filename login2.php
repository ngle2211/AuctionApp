<?php
session_start();

include("db.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$phone = $_POST['phone'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//read from database
			$query = "select * from users where phone = '$phone' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: menu.php");
						die;
					}
				}
			}
			
			echo "<p style='color:red;'> Wrong phone or password. Please try again! </p>";
		}else
		{
			echo "<p style='color:red;'> Wrong phone or password. Please try again! </p>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login by phone</title>
	
</head>
<h2>LOGIN FORM</h2>
<form method="post">
  <div>
      <span>Phone</span>
      <input type="text" name="phone" required >
  </div>
  <br/>
  <div>
      <span>Password</span>
      <input type="password" name="password" required>
   </div>
   <br/>
   <div>
      <input class="btn btn-danger" type="submit" name="act" value="Login">
   </div>
   <p> Login by email? <a href="login.php"> Click </a></p>
   <p> Create new account? <a href="signup.php"> Sign Up </a></p>
   <p> Wanna go back ? <a href="index.html"> Click </a></p>
</form>
</html>