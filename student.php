<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
  $_SESSION['userid']=$_SESSION['userid'];
  $_SESSION['passw']=$_SESSION['passw'];
  include('db.php');
   if(isset($_POST['save'])){
  $assid =$_POST['myassid'];
  $sid =$_POST['mysid'];
  }


  $conn = new mysqli("localhost","root","","faculty_dashboard");
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'C:/xampp/htdocs/student/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    } else {
        // move the uploaded (temporary) file to the specified destination
        $today = date("Y-m-d");
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO show_submission (Assignment_ID, S_ID, submsn_name) VALUES ('$assid','$sid','$filename')";
            if (mysqli_query($conn, $sql)) {
            }
        } else {
        }
   }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>



	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="courses.css">

</head>
<body class="overlay-scrollbar">
	<!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fa fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item faculty">
				<b><?php  
				$username=$_SESSION['userid'];
				
				$sql = "select * from faculty, login where (login.Fac_ID='$username' || login.mobile='$username') && login.Fac_ID=faculty.Fac_ID ";
				$result=mysqli_query($con,$sql);
		        $row=mysqli_fetch_assoc($result);
				
				echo $row['Name'];				?></b>
			</li>
		</ul>
		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="Search..">
			<i class="fa fa-search"></i>
		</form>
		<!-- end form -->
		<!-- nav right -->
		<ul class="navbar-nav nav-right">
			<li class="nav-item mode">
				<a class="nav-link" href="#" onclick="switchTheme()">
					<i class="fa fa-moon-o dark"></i>
				</a>
			</li>
			<li>
				<div>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link">
      				<i class="fa fa-bell" aria-hidden="true"></i>
   				 </a>
   			<li>
   			<li>
   				<div>
				</div>
			</li>
			<li class="nav-item avt-wrapper">
				<div class="avt dropdown">
					
          <img src="<?php echo $row['image_path'] ?>" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
					<ul id="user-menu" class="dropdown-menu">
						<li class="dropdown-menu-item">
							<a href="settings.php" class="dropdown-menu-link">
								<div>
									<i class="fa fa-cog"></i>
								</div>
								<span>Settings</span>
							</a>
						</li>
						<li  class="dropdown-menu-item">
							<a href="logout.php" class="dropdown-menu-link">
								<div>
									<i class="fa fa-sign-out"></i>
								</div>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>
		<!-- end nav right -->
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link">
					<div>
						<i class="fa fa-calendar"></i>
					</div>
					<span class='span'>
						Schedule
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="profile.php" class="sidebar-nav-link">
					<div>
						<i class="fa fa-user"></i>
					</div>
					<span class='span'>My profile</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link">
					<div>
						<i class="fa fa-bell"></i>
					</div>
					<span class='span'>Notifications</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link">
					<div>
						<i class="fa fa-th-list"></i>
					</div>
					<span class='span'>Attendance</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="gatepass_fac.php" class="sidebar-nav-link">
					<div>
						<i class="fa fa-home"></i>
					</div>
					<span class='span'>Gatepass</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="student.php" class="sidebar-nav-link active">
					<div>
						<i class="fa fa-question-circle"></i>
					</div>
					<span class='span'>Help</span >
				</a>
			</li>
		</ul>
	</div>
	<!-- main content -->
	<div class="wrapper">
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card1 ">
					<div class="card-header">
					<form action="student.php" method="post" enctype="multipart/form-data" >
				          <h3>Make Assignment</h3>
				          <hr>
				          <div class=hralyn>
				          <input type="file" name="myfile"><br>
				          <input type="text" name="myassid">
				          <input type="text" name="mysid">
				          <button class="button btnFade btnLightBlue" type="submit" name="save">CREATE</button>
				          <div>
				        </form>
				    </div>
			</div>
		</div>
</div>
	
			
			



	<!-- end main content -->

<script src='leave_summary.js'></script>
<!-- Latest compiled and minified CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>

</html>

