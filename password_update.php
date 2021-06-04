<?php session_start();

if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];

$username=$_SESSION['userid'];

include("db.php");

$curr_pass=$_POST['pass'];
$password=$_POST['psw'];

$hash_curr=SHA1($curr_pass);




if($_SESSION['passw']==$hash_curr){
	
	$password=stripcslashes($password);
$password=mysqli_real_escape_string($con,$password);
$hash_pass=SHA1($password);



$s = "select * from login where Fac_ID='$username' || mobile='$username' ";

$result= mysqli_query($con, $s);
$rows=mysqli_fetch_assoc($result);

if($rows['Fac_ID']==$username or $rows['mobile']==$username){
	$sql="update login set passwd='$hash_pass' where Fac_ID='$username' || mobile='$username'; ";
	
	if (mysqli_query($con, $sql)) {
         echo "<script> alert('Password updated successfully.');</script>";
    	 echo "<script> window.location='settings.php';</script>";	
} else {
  
  echo "<script> alert('Error updating password.');</script>";
  echo "<script> window.location='settings.php';</script>";	
}
	
}
}

else{
	echo "<script> alert('Wrong Password Entered.');</script>";
    echo "<script> window.location='settings.php';</script>";
}
	
	
	
	
	
























?>