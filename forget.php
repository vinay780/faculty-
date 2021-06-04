<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
	

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="forget.css">
</head>



<body>

<h1 class="challenge-title">Security Questions</h1>
<div class="login-card">
	<div class="login-form-container">
		<h5 class="login-title">
			Enter answers for the given security questions
		</h5>
		<form action="forget_validate.php" method="post">
		
		    <div class="form-control">
				<label for="user"></label>
				<input id="user" name="user" type="text"  autocomplete="on" class="input-field" placeholder="Username" required autofocus />
			</div>
			
			<div class="form-control">
				<label for="security"></label>
				<input id="text" name="sq1" type="password" placeholder="What is the name of your first grade teacher?" required autofocus />
			</div>
			<div class="form-control">
				<label for="security"></label>
				<input id="text" name="sq2" type="password" placeholder="In what city was your first job?" required />
			</div>
			<div class="form-control">
				<button class="btn btn-full">
					Change Password
				</button>
			</div>
		</form>
		
		<?php
          $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($fullUrl,"forget=notValid")==true)
          {
            echo "<script> alert('Invalid answers to the security questions') </script>";
            exit();
          }
		  

         ?>
</div>
</body>
<html>