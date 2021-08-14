<!DOCTYPE html>
<html lang="en">
  <head> 
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

   <link rel="stylesheet" type="text/css" href="CSS/userReg.css">
		<title>Sign Up</title>


<script type="text/javascript">
	

	function RegisterValid()
	{


   
    var email    =Registerform.email;
    var phone    =Registerform.phone;
    var fname    =Registerform.fname;
    var lname    =Registerform.lname;
    var address  =Registerform.address;
    var city    =Registerform.cty;
    var country    =Registerform.country;
    var id_num    =Registerform.id_num;
    var password   =Registerform.password;

    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 10)
    {
        window.alert("Please  your telephone number must be 10 digit.");
        phone.focus();
        return false;
    }

    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    return true;
}

 
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>
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

        $profilepic = "upload/".$_FILES['profilepic']['name'];
        $filename    = $_FILES['profilepic']['tmp_name']; 
        move_uploaded_file($filename, $profilepic); 

		if(!empty($email) && !empty($password) && !is_numeric($email) 
        )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (
                user_id,email,phone, fname,lname,address,city,country,id_num,profilepic,password) 
                values ('$user_id','$email','$phone','$fname','$lname','$address','$city','$country','$id_num','$profilepic','$password')";

			mysqli_query($con, $query);

            echo '<script language="javascript">';
            echo 'alert("Registration successfully")';
            echo '</script>';

            header("Location: signup.php");
			die;
		}   else
		{
			echo "<p style='color:red;'>Please enter some valid information!</p>";
		}
	}

?>  

		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h2>Sign Up Form</h2>
					<form method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
						
						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Email</span>
									<input type="email" class="form-control" name="email" id="email" required/>
								</div>
							</div>
						</div>
                        <br>
					    <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Phone</span>
									<input type="text" class="form-control" name="phone" id="phone" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="insput-group-addon">First Name</span>
									<input type="text" class="form-control" name="fname" id="fname" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Last Name</span>
									<input type="text" class="form-control" name="lname" id="lname" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Address</span>
									<input type="text" class="form-control" name="address" id="address" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">City</span>
									<input type="text" class="form-control" name="city" id="city" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Country</span>
									<input type="text" class="form-control" name="country" id="country" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Identification Number</span>
									<input type="text" class="form-control" name="id_num" id="id_num" required/>
								</div>
							</div>
						</div>
                        <br>
                        <div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon">Password</span>
									<input type="password" class="form-control" name="password" id="password" required/>
								</div>
							</div>
						</div>
                        <br>
						<div class="form-group">
							<label class="cols-sm-2 control-label"><b>Your Profile Picture</b></label>
							<div class="cols-sm-10">
								<div class="input-group">
								
									<input type="file" name="profilepic">
								</div>
							</div>
						</div>
                        <br>
						<div class="form-group ">
							<input  type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">
						</div>
                        
						<p> Already have account? <a href="login.php"> Login </a></p>
   						<p> Wanna go back ? <a href="index.html"> Click </a></p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>