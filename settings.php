<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:profile.php');
  }
  $_SESSION['userid']=$_SESSION['userid'];
  $_SESSION['passw']=$_SESSION['passw'];
  include('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	
	
	
	<link rel="stylesheet" type="text/css" href="settings.css">
	
	
</head>

<body>



<div class="container">
  <div class="leftbox">
    <nav>
      <a id="x" ><i></i></a>
      <a id="profile" class="active"><i class="fa fa-user"></i></a>
      <a id="y"><i></i></a>
      <a id="z"><i></i></a>
      <a id="password"><i class="fa fa-key"></i></a>
      
      <a id="z"><i></i></a>
      <a id="y"><i></i></a>
       <a id="goback"><i class="fa fa-arrow-left" onclick="window.location.href='profile.php' "></i></a>
    </nav>
  </div>
  

  
  <?php
                                  $username=$_SESSION['userid'];
	                              $s="Select * from faculty,login where (login.Fac_ID='$username' || login.mobile='$username') && login.Fac_ID=faculty.Fac_ID  ";
		                            $res=mysqli_query($con,$s);
		                            $check=mysqli_fetch_assoc($res);
									//faculty.Fac_ID, faculty.Name,faculty.email_id,faculty.qualification,faculty.position,faculty.interest,faculty.address,faculty.dept,login.mobile
									?>
  
  
  
  <div class="rightbox">
    
    <div class="profile">
      <h1>Edit Profile</h1>
	  
	<!--<div class="profile-pic" alt="User image" style="background-image: url('<?php echo $check['image_path'] ?>')" >
	  <span class="fa fa-camera"></span>
      <span>Change Photo</span>
	  </div>-->
	  
	  <div id="content">
  
        <form method="POST" action="photo_update.php" enctype="multipart/form-data">
         
		<img id="imgFileUpload" alt="Change Photo" class="profile-pic"  title="Select File" src="<?php echo $check['image_path'] ?>" style="cursor: pointer" />
		
		
<br />
<span id="spnFilePath"></span>
<input type="file" id="FileUpload1" name="uploadfile" style="display: none" />
<!--<script type="text/javascript">
    window.onload = function () {
        var fileupload = document.getElementById("FileUpload1");
        var filePath = document.getElementById("spnFilePath");
        var image = document.getElementById("imgFileUpload");
        image.onclick = function () {
            fileupload.click();
        };
        fileupload.onchange = function () {
            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
            filePath.innerHTML = "<b>Choosen: </b>" + fileName;
        };
    };
</script>-->
			
			
		<div><button class="fancy-button bg-gradient1" style="border:none; background: none;" type="submit" name="upload"> <span>Change Photo </span></button>
            </div>
        </form>
      </div>
	  
	  </p>
	  
	  
	  <form action="profile_update.php" method="post">
	  
      <p><h2>Name</h2><input type='text' name='name' value='<?php echo  $check['Name'] ?>' disabled ></p>
	  
	  <p><h2>Faculty ID</h2><input type='text' name='id' value='<?php echo  $check['Fac_ID'] ?>' disabled ></p>
	  
	  <p><h2>Email ID</h2><input type='email' name='email' value='<?php echo  $check['email_id'] ?>' required ></p>
	  
	  <p><h2>Phone No.</h2><input type='text' name='phone'  value='<?php echo  $check['mobile'] ?>' disabled ></p>
	  
	  <p><h2>Department</h2><input type='text' name='dept' value='<?php echo  $check['dept'] ?>' disabled ></p>
	  
	  <p><h2>Areas of Interest</h2><input type='text' name='interest' value='<?php echo  $check['interest'] ?>' required ></p>
	  
	  <p><h2>Residential Address</h2><input type='text' name='address' value='<?php echo  $check['address'] ?>' required></p>
	  
      <button type='submit' name='updatepro' class="fancy-button bg-gradient1" style="border:none; background: none;"><span>Update profile</span></button>
	  </form>
	  
	  
    </div>
    
    <div class="password noshow">
      <h1>Change password</h1>
	  
	  <form action="password_update.php" method="post">
       <label for="password" ></label>
			<input id="pass" name="pass" type="password"  class="input-field" placeholder="Current Password" onChange="onSame()" required />
		
		<label for="security"></label>
				<input id="psw" name="psw" type="password" onChange="onChange();onSame();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"   placeholder="New-password" required />
			
		<label for="security"></label>
				<input id="cpsw" name="cpsw" type="password" placeholder="Confirm New-password" onChange="onChange()" required />
		
		<button type='submit' name='updatepass' class="fancy-button bg-gradient1" style="border:none; background: none;"><span>Update password</span></button>
</form>
		<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
	  
</div>



    
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

<script src='settings.js'></script>
<script src='change.js'></script>

</body>
</html>



