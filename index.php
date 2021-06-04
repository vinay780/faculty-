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
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="leave_summary.css">

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
				<a href="courses_main.php" class="sidebar-nav-link">
					<div>
						<i class="fa fa-bell"></i>
					</div>
					<span class='span'>Notifications</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link active">
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
	<!-- main content -->
	<?php
							
						
							$query = "SELECT * FROM attendance WHERE Fac_ID LIKE '$username'  and start_date >'2020-06-04' Order by start_date desc";
							$query_run = mysqli_query($con,$query);
							$query1 = "SELECT type,DATEDIFF(end_date,start_date) AS dy FROM attendance WHERE Fac_ID LIKE '$username' and start_date >'2020-06-04' and status like 'Accepted'";
							$query_run1 = mysqli_query($con,$query1);
							include('link_db.php');
	?>
	<div class="wrapper">
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card1">
					<div class="card-header">
						<h3>
							Attendance
						</h3>
						<a href="attendance_summary.php">
							
						<i>
							<?php echo $presentdays;?>/<?php echo $days;?>
						</i>
					</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card1">
					<div class="card-header">
						<h3>
							Percentage of leave taken
						</h3>
						<a href="leave_chart.php">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					</div>
					<div class="card-content">
						<div class="progress-wrapper">
							<p>
								On Duty 
								<span class="float-right"><?php
									if((($ODleaveref-$ODleave)/$ODleaveref)*100 > 80)
									{
										$alertod = 'bg-danger';
									}
									echo (($ODleaveref-$ODleave)/$ODleaveref)*100;
								?>
									%
								</span>
							</p>
							<div class="progress">
								<?php
								$leave1 = (($ODleaveref-$ODleave)/$ODleaveref)*100;
								if((($ODleaveref-$ODleave)/$ODleaveref)*100 > 80){
									
									?>	<progress  id="file" value="<?php echo $leave1; ?>" max="100" style='height:20px;width:100%'></progress>
										<!-- <div class="progress-bar  bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width</div> -->
									<?php }
								else{ ?>
									<progress id="file" value="<?php echo $leave1; ?>" max="100" style='height:20px;width:100%'></progress>
								<!-- <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: %"></div> -->
							<?php } ?>
							</div>
						</div>
						<hr>
						<div class="progress-wrapper">
							<p>
								Sick Leave
								<span class="float-right"><?php
									echo (($sickleaveref-$sickleave)/$sickleaveref)*100;
								?>
									%</span>
							</p>
							<div class="progress">
								<?php
								$leave2 = (($sickleaveref-$sickleave)/$sickleaveref)*100;
								if((($sickleaveref-$sickleave)/$sickleaveref)*100 > 80){
									
									?>
									<progress id="file" value="<?php echo $leave2; ?>" max="100" style='height:20px;width:100%'></progress>
										<!-- <div class="progress-bar bt-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: ?>%"></div> -->
							<?php 
								}
								else{ 
									
							?>
								<progress id="file" value="<?php echo $leave2; ?>" max="100" style='height:20px;width:100%'></progress>
									<!-- <progress id="file" value="<?php echo $num; ?>" max="100"> 32% </progress> -->
								<?php } ?>
							</div>
						</div>
						<hr>
						<div class="progress-wrapper">
							<p>
								Casual Leave
								<span class="float-right"><?php
									echo (($casualleaveref-$casualleave)/$casualleaveref)*100;
								?>
									%</span>
							</p>
							<div class="progress">
								<?php
								$leave3 = (($casualleaveref-$casualleave)/$casualleaveref)*100;
								if((($casualleaveref-$casualleave)/$casualleaveref)*100 > 80){
									?>
										<progress id="file" value="<?php echo $leave3; ?>" max="100" style='height:20px;width:100%'></progress>
									<?php }
								else{ ?>
							  			<progress id="file" value="<?php echo $leave3; ?>" max="100" style='height:20px;width:100%'></progress>
							  <?php } ?>
							</div>
						</div>
						<hr>
						<div class="progress-wrapper">
							<p>
								Paid Leave
								<span class="float-right"><?php
									echo (($paidleaveref-$paidleave)/$paidleaveref)*100;
								?>
									%</span>
							</p>
							<div class="progress">
								<?php
								$leave4 = (($paidleaveref-$paidleave)/$paidleaveref)*100;
								if((($paidleaveref-$paidleave)/$paidleaveref)*100 > 80){
									?>
										<progress id="file" value="<?php echo $leave4; ?>" max="100" style='height:20px;width:100%'></progress>
									<?php }
								else{ ?>
										<progress id="file" value="<?php echo $leave4; ?>" max="100" style='height:20px;width:100%'></progress>
							  <?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
						
			
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card1 ">
					<div class="card-header">
						<h3>
							Leave Application Summary
						</h3>
						<a href="leave_summary.php">
						<i class="fa fa-ellipsis-h"></i>
					</a>
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>Type of leave</th>
									<th>Start date</th>
									<th>End date</th>
									<th>Status</th>
								</tr>
							</thead>
							<?php
								if($query_run)
								{
									foreach($query_run as $row)
									{
								
									
							?>
							<tbody>
								<tr>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['start_date']; ?></td>
									<td><?php echo $row['end_date']; ?></td>
									<td> <?php echo $row['status']; ?></td>
								</tr>			
							</tbody>
							<?php
									}
								}
								
								else
								{
									echo "No Record Found";
								}

							?>
						</table>
					</div>
				</div>
				</div>
			<a href="leave.php"  rel="noopener noreferrer" class="float">
				<i class="fa fa-ellipsis-h my-float"></i>
			</a>
			<div class="label-container">
			<div class="label-text">Apply for Leave</div>
				<i class="fa fa-play label-arrow"></i>
			</div>
		</div>
	</div>



	<!-- end main content -->

<script src='leave_summary.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>

</html>

