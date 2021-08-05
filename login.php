<?php
session_start();

include("db.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
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
			
			echo "<p style='color:red;'> Wrong username or password. Please try again! </p>";
		}else
		{
			echo "<p style='color:red;'> Wrong username or password. Please try again! </p>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login by email</title>
</head>
<h2>LOGIN</h2>
<form method="post">
  <div>
      <span>Email</span>
      <input type="email" name="email" required >
  </div>
  <br/>
  <div>
      <span>Password</span>
      <input type="password" name="password" required>
   </div>
   <br/>
   <div>
      <input type="submit" name="act" value="Login">
   </div>
   <p> Create new account? <a href="signup.php"> Sign Up </a></p>
   <p> Go back to Home ? <a href="index.html"> Home </a></p>
</form>
</html>