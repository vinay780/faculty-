<?php
  session_start();
  if($_SESSION['userid'] != 'HFAC001')
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
	
	<link rel="stylesheet" type="text/css" href="head_faculty.css">
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
				
				echo $row['Name'];
			
				?></b>
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
				<a href="hprofile.php" class="sidebar-nav-link">
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
			<li class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link  active">
					<div>
						<i class="fa fa-edit"></i>
					</div>
					<span class='span'>
						Manage pass
					</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="gatepass_hfac.php" class="sidebar-nav-link">
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
  	

  	<?php
						
							$today = date("Y-m-d");
							$query = "SELECT *,DATEDIFF(end_date,start_date) AS dy FROM Attendance WHERE  start_date >'2020-06-04' and status like 'Pending' Order by start_date desc " ;
							$query_run2 = mysqli_query($con,$query);

						
	?>
	<div class="wrapper">
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3>
							Manage Leave Application
						</h3>
					</div>
	
    <!-- End Title -->
    	<section class="component-section" id="employee">
        <table class="table pmd-table table-hover pmd-table-card">
                <thead class="thead-light">
                    <tr>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>No of Leave</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php
								if($query_run2)
								{
									foreach($query_run2 as $row)
									{
										$temp = $row['Fac_ID'];
										$query1 = "SELECT type,DATEDIFF(end_date,start_date) AS dy FROM Attendance WHERE fac_id LIKE '$temp' and start_date >'2020-06-04' and status like 'Accepted'";
										$query_run1 = mysqli_query($con,$query1);
										include('link_db.php');
									
							?>
                <tbody>

                    <tr class="card1">
                        <td data-title="Employee"><?php echo $row['Fac_ID']; ?></td>
                        <td data-title="Leave Type"><?php echo $row['type']; ?></td>
                        <td data-title="Start Date"><?php echo $row['start_date']; ?></td>
                        <td data-title="End Date"><?php echo $row['end_date']; ?></td>
                        <td data-title="Reason"><?php echo $row['reason']; ?></td>
                        <td data-title="No of Leave"><?php echo $row['dy']; ?></td>
                        <td data-title="Status"><?php echo $row['status']; ?></td>
                        
                        <?php
                        include('head_facautoreject.php');
                        $today = date("Y-m-d");
                        if($set == 1 || $row['start_date'] < $today){
                        ?>
                        	<td data-title="Action">
                            <a href="reject.php?start_date=<?php echo $row['start_date'];?>&Fac_ID=<?php echo $row['Fac_ID']; ?>">Reject</a>
                            </td>
                        <?php
                        }
                        else
                        {
                        ?>
                        <td data-title="Action">
                            <a href="approve.php?start_date=<?php echo $row['start_date']; ?>&Fac_ID=<?php echo $row['Fac_ID']; ?>">Approve</a>
                            <a href="reject.php?start_date=<?php echo $row['start_date'];?>&Fac_ID=<?php echo $row['Fac_ID']; ?>">Reject</a>
                                
                        </td>
                        <?php
                    }
                    ?>
                    </tr >
                    
                </tbody>
                <?php
									}
								}
								
								else
								{?>
									<tbody>
									 <tr class="card1">
									 	<td>No Record Found</td>
									</tr>
								</tbody>
							<?php
						}

							?>
        </table>
    </section>
</div>
</div>
</div>
</div>

<script src='head_faculty.js'></script>

	
</body>
</html>
