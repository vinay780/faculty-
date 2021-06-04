<?php session_start();
if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];

$username=$_SESSION['userid'];
include("db.php");

$password=$_POST['psw'];

$password=stripcslashes($password);
$password=mysqli_real_escape_string($con,$password);
$hash_pass=SHA1($password);

$s = "select * from login where Fac_ID='$username' ";

$result= mysqli_query($con, $s);
$row=mysqli_fetch_assoc($result);

if($row['Fac_ID']==$username){
	$sql="update login set passwd='$hash_pass' where Fac_ID='$username'";
	
	if (mysqli_query($con, $sql)) {
         echo "<script> alert('Password updated successfully.');</script>";
    	 echo "<script> window.location='login.php';</script>";	
} else {
  
  echo "<script> alert('Error updating password.');</script>";
  echo "<script> window.location='forget.php';</script>";	
}
	
}




















?>