<?php
error_reporting(0);
?>
<?php

 session_start();
if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];
$username=$_SESSION['userid'];

include("db.php");



  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = $filename;
          
  
        // Get all the submitted data from the form
		$sql="update faculty set image_path='$filename' where Fac_ID='$username' || mobile='$username'; ";
  
        // Execute query
        mysqli_query($con, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
			echo "<script> alert('Photo updated successfully.');</script>";
    	 echo "<script> window.location='settings.php';</script>";	
        }else{
            $msg = "Failed to upload image";
			echo "<script> alert('Error in updating photo.');</script>";
    	 echo "<script> window.location='settings.php';</script>";	
      }
  }
  $result = mysqli_query($con, "SELECT *Fac_ID, image_path FROM faculty");
?>