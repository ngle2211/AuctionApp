<!DOCTYPE html>
<html>
<head>
	<title>Login by email</title>
    <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/userlogin.css"> -->

<script type="text/javascript">
  
  function ValidUser()
  {
    var email = UserLogin.email;
    var password=UserLogin.password;

    if(email.value=="")
    {
      window.alert("Email Field Can Not Be Empty");
      email.focus();
      return false;
    }
    if(password.value=="")
    {
      window.alert("Password Field Can Not Be Empty");
      password.focus();
      return false;
    }
    return true;
  }


</script>
</head>

<body>


<?php 
session_start();
include("db.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $query="select * from users where email='$email' and password='$password' limit 1";
    $result = mysqli_query($con, $query);

    if($result){
      if($result && mysqli_num_rows($result) > 0){
        $Rows=mysqli_fetch_assoc($result);

        if($Rows['email']==$email && $Rows['password']==$password){
        
        $_SESSION['user_id'] = $Rows['user_id'];
        header("Location:menu.php");
        die;
      }
     }
    }
    else
    {
      
      echo "<p style='color:red;'> Wrong email or password. Please try again! </p>";
    }
    echo "<p style='color:red;'> Wrong email or password. Please try again! </p>";
      mysqli_close($con);                     
   }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title"><b>Login form by email</b></h2>
                <form class="form-signin" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();">
                  <div class="form-group ">
                      <p class="insput-group-addon">Email</p>
                      <input type="email" class="form-control" name="email" required>
                  </div>
                    
                  <div class="form-group ">
                    <p class="insput-group-addon">Password</p>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                    <br>
                  <div class="form-group ">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                  </div>
                </form>
                <p> Login by phone? <a href="login2.php"> Click </a></p>
                <p> Create new account? <a href="signup.php"> Sign Up </a></p>
                <p> Wanna go back ? <a href="index.html"> Click </a></p>
            
            
        </div>
    </div>
</div>
</div>
</body>
</html>
