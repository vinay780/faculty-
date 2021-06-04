<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
  $_SESSION['userid']=$_SESSION['userid'];
  $_SESSION['passw']=$_SESSION['passw'];
  include('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="profile.css">
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
			<li class="nav-item">
				<a class="nav-link">
      				<i class="fa fa-bell" aria-hidden="true"></i>
   				 </a>
   			<li>
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
				<a href="#" class="sidebar-nav-link active">
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
				<a href="index.php" class="sidebar-nav-link">
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
				<a href="#" class="sidebar-nav-link">
					<div>
						<i class="fa fa-question-circle"></i>
					</div>
					<span class='span'>Help</span>
				</a>
			</li>
		</ul>
	</div>
  
	<div class="wrapper">
		
		<div class="row">
      
			<div class="col-10 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h1>
							Profile
						</h1>
          <!--  <i><a href="#" class="fancy-button bg-gradient1"><span>Edit Profile</span></a></i>-->
 </div>
 
 <?php
	                              $s="Select * from faculty,login where (login.Fac_ID='$username' || login.mobile='$username') && login.Fac_ID=faculty.Fac_ID  ";
		                            $res=mysqli_query($con,$s);
		                            $check=mysqli_fetch_assoc($res);
									//faculty.Fac_ID, faculty.Name,faculty.email_id,faculty.qualification,faculty.position,faculty.interest,faculty.address,faculty.dept,login.mobile
									?>
 
					<div class="card-content">
						<table>
							<tbody>
								<tr>
									<td></td>
									<td> <img src="<?php echo $check['image_path'] ?>" alt="User image" class="mainphoto"></td>
									
								</tr>
								
								
		 
						
								
								
								<tr>
									<td>Name</td>
									<td><?php echo  $check['Name'] ?></td>
                  
                  <tr>
									<td>Faculty ID</td>
									<td><?php echo  $check['Fac_ID'] ?></td>
                    
								<tr>
									<td>Qualifications</td>
									<td><?php echo  $check['qualification'] ?></td>
                  
                <tr>
									<td>Email ID</td>
									<td><?php echo  $check['email_id'] ?></td>
                  
				  
                 <tr>
									<td>Phone No.</td>
									<td><?php echo  $check['mobile'] ?></td>
                   
                  <tr>
									<td>Position</td>
									<td><?php echo  $check['position'] ?></td>
                    
					<tr>
									<td>Department</td>
									<td><?php echo  $check['dept'] ?></td>
									
                    <tr>
									<td>Areas of Interest</td>
									<td><?php echo  $check['interest'] ?></td>
                      
                       <tr>
									<td>Residential Address</td>
									<td><?php echo  $check['address'] ?></td>
									
									
									
									<tr>
									<td>e-wallet</td>
									<td>Rs. <?php echo  $check['wallet'];  if ($check['wallet']<200){
										echo "<i class='fa fa-exclamation-triangle' style='color:red;margin-left:100px;'> <b style='color:red;margin-left:10px;'> Kindly recharge your e-wallet!</b></i>";
									} ?> 
									</td>
									
									
									<!--<tr>
									<td></td>
									<td id='wallet' style="color:red;">
									<?php // if ($check['wallet']<200){
										//echo "Kindly recharge your e-wallet!";
									//} ?></td>-->
									
					
									
                <!--         
                   <tr>
									<td>Password</td>
                     <td><p align='centre' ><span class="hidetext"><?php //echo  $check['passwd'] ?></span>
                   <a href="change.php" class="fancy-button bg-gradient1"><span>Change Password</span></a></p></td> -->
                  
									
							</tbody>
						</table>
					</div>
          <div class="col-11 col-m-12 col-sm-12" id="publication">
				<div class="card">
					<div class="card-header">
						<h3>
							Publications details
						</h3>
						
						
										<?php
                                      $query="Select * from publication,login where (login.Fac_ID='$username' || login.mobile='$username') && login.Fac_ID=publication.Fac_ID";
		                              $r=mysqli_query($con,$query);
		                              $resultcheck=mysqli_num_rows($r);?>
            <table>
			<thead>
			<tr>
				<th width=20% style='font-weight:bold; font-size:1.23rem;'>Year</th>
				<th  style='font-weight:bold;font-size:1.23rem;' >Title</th>

				</tr>
		</thead>
		 <?php while($resultcheck=mysqli_fetch_assoc($r)):?>
							<tbody>
								
								<tr>
									<td><?php echo $resultcheck['year']; ?></td>
									<td><?php echo $resultcheck['title']; ?></td>
									
                  
                 
									
							</tbody>
							<?php endwhile;?>
						</table>
					</div>
					
			
						
					</div>
				</div>
			</div>
		</div>
	</div>

<script src='profile.js'></script>

	
</body>
</html>

