<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<!--CSS -->
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

<body>
<h1 class="challenge-title">Faculty Dashboard</h1>
<div class="login-card">
	<div class="login-glass">
		<img src="logo1.png" alt="logo" width="250" height="250">
			
	</div>
	<div class="login-form-container">
		<h3 class="login-title">
			Sign in to your account
		</h3>
		<form action="validate.php" method="post" onsubmit="return login()">
			<div class="form-control">
				<label for="user"></label>
				<input id="user" name="user" type="text" value="<?php if(isset($_COOKIE["c_username"])) { echo $_COOKIE["c_username"]; } ?>"  autocomplete="on" class="input-field" placeholder="Username" required autofocus />
			</div>
			<div class="form-control">
				<label for="password"></label>
				<input id="pass" name="pass" type="password" value="<?php if(isset($_COOKIE["c_password"])) { echo $_COOKIE["c_password"]; } ?>" class="input-field" placeholder="Password" required />
			    <i class="far fa-eye" id="togglePassword" style="cursor:pointer; margin-left:-37px; margin-right:20px; color:#727070"></i>
			</div>
			<div class="form-control">
				<div class="form-remembe">
					<input id="remember" name="remember" type='checkbox' /> <label for="remember">Remember me</label>
				</div>
				<div class="form-forgot">
					<a href="forget.php">Forgot your password?</a>
				</div>
			</div>
			<div class="form-control">
				<button class="btn btn-full" id='btn' name='Login' type='submit'>
					Sign in
				</button>
			</div>
		</form>
		
		
		<!-- <?php
          $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($fullUrl,"")==true)
          {
            echo "<script> alert('Invalid Username or Password') </script>";
            exit();
          }

         ?> -->
</div>
<script src="login.js"></script>
</body>
<html>



