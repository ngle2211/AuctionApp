<?php
session_start();

include("db.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $id_num = $_POST['id_num'];
        $profilepic = $_POST['profilepic'];
		$password = $_POST['password'];


		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (
                user_id,email,phone, fname,lname,address,city,country,id_num,profilepic,password) 
                values ('$user_id','$email','$phone','$fname','$lname','$address','$city','$country','$id_num','$profilepic','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}

        elseif (!empty($phone) && !empty($password) && !is_numeric($phone)){
            //save to database
			$user_id = random_num(20);
			$query = "insert into users (
                user_id,email,phone, fname,lname,address,city,country,id_num,profilepic,password) 
                values ('$user_id','$email','$phone','$fname','$lname','$address','$city','$country','$id_num','$profilepic','$password')";

			mysqli_query($con, $query);

			header("Location: login2.php");
			die;
        }

        
        else
		{
			echo "Please enter some valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<h2>SIGN UP</h2>
<form method="post">
  <div>
      <span>Email</span>
      <input type="email" name="email" required >
  </div>
  <br/>
  <div>
      <span>Phone</span>
      <input type="text" name="phone" required >
  </div>
  <br/>
  <div>
      <span>First Name</span>
      <input type="text" name="fname"required  >
  </div>
  <br/>
  <div>
      <span>Last Name</span>
      <input type="text" name="lname"required  >
  </div>
  <br/>
  <div>
      <span>Address</span>
      <input type="text" name="address" required >
  </div>
  <br/>
  <div>
      <span>City</span>
      <input type="text" name="city" required >
  </div>
  <br/>
  <div>
      <span>Country</span>
      <input type="text" name="country" required >
  </div>
  <br/>
  <div>
      <span>Identification number</span>
      <input type="text" name="id_num" required >
  </div>
  <br/>
  <div>
      <span>Profile Pic</span>
      <input type="text" name="profilepic"required  >
  </div>
  <br/>
  <div>
      <span>Password</span>
      <input type="password" name="password"required >
   </div>
   <br/>
   <div>
      <input type="submit" name="act" value="Sign up"required >
   </div>
   <p> Already have account ? <a href="login.php"> Log In </a></p>
   <p> Go back to Home ? <a href="index.html"> Home </a></p>
</form>
</html>