<?php session_start();
if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];
$username=$_SESSION['userid'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="change.css">
</head>



<body>


<h1 class="challenge-title">Change Password</h1>
<div class="login-card">
	<div class="login-form-container">
		<h5 class="login-title">
			Enter new password
		</h5>
		<form action="change_update.php" method="post">
			<div class="form-control">
				<label for="security"></label>
				<input id="psw" name="psw" type="password" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   placeholder="New-password" required />
			</div>
			
			<div class="form-control">
				<label for="security"></label>
				<input id="cpsw" name="cpsw" type="password" placeholder="Confirm New-password" onChange="onChange()" required />
			</div>
			<div class="form-control">
				<button class="btn btn-full" ">
					Save 
				</button>
			</div>
		</form>
		
		
		 
		 
		
		
		<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
</div>
<script src='change.js'></script>
</body>
</html>