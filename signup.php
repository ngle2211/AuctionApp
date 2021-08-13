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
        $password = $_POST['password'];

        $profilepic = $_FILES['profilepic']['name'];

        $target = "upload/".basename($profilepic);
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);
        

		if(!empty($email) && !empty($password) && !is_numeric($email) 
        )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (
                user_id,email,phone, fname,lname,address,city,country,id_num,profilepic,password) 
                values ('$user_id','$email','$phone','$fname','$lname','$address','$city','$country','$id_num','$profilepic','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
           
			die;
		}else
		{
			echo "<p style='color:red;'>Please enter some valid information!</p>";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
    
</head>
<h2>SIGN UP FORM</h2>
<form action="signup.php" method="post">
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
      <input type="file" name="profilepic" required  >
  </div>
  <br/>
  <div>
      <span>Password</span>
      <input type="password" name="password"required >
   </div>
   <br/>
   <div>
      <input class="btn btn-danger" type="submit" name="act" value="Sign up"required >
   </div>
   <p> Already have account ? <a href="login.php"> Log In </a></p>
   <p> Wanna go back? <a href="index.html"> Click </a></p>
</form>
</html>