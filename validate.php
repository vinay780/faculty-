<?php
session_start();
$username=$_POST['user'];
$password=$_POST['pass'];

include("db.php");
//$con = new mysqli("localhost","root","","faculty_dashboard");

//to prevent mysql injection
$username=stripcslashes($username);
$password=stripcslashes($password);
$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);

$hashed_pass=SHA1($password);

$s = "select * from login where Fac_ID='$username' || mobile='$username' && passwd='$hashed_pass' ";

$result= mysqli_query($con, $s);
$row=mysqli_fetch_assoc($result);

if(($username=='HFAC001' || $username=='9876543210')&& $row['passwd']==$hashed_pass){
	    //$query="select Name from faculty where Fac_ID='$username';
	    $_SESSION['userid']=$username;
		$_SESSION['passw']=$hashed_pass;
		if(!empty($_POST["remember"])) {
	       setcookie ("c_username",$username,time()+ 3600);
		   setcookie ("c_password",$password,time()+ 3600);
        } 
        else { 
               if(isset($_COOKIE["c_username"]))   
                {  
                    setcookie ("c_username","");  
                 }
				 if(isset($_COOKIE["c_password"]))   
                {  
                    setcookie ("c_password","");  
                 }
            }
        
        header('location:hprofile.php');
}

 
  
else
{

   
   if(($row['Fac_ID']==$username || $row['mobile']==$username) && $row['passwd']==$hashed_pass){
	    //$query="select Name from faculty where Fac_ID='$username';
	    $_SESSION['userid']=$username;
		$_SESSION['passw']=$hashed_pass;

		if(!empty($_POST["remember"])) {
	       setcookie ("c_username",$username,time()+ 3600);
		   setcookie ("c_password",$password,time()+ 3600);
        } 
        else { 
               if(isset($_COOKIE["c_username"]))   
                {  
                    setcookie ("c_username","");  
                 }
				 if(isset($_COOKIE["c_password"]))   
                {  
                    setcookie ("c_password","");  
                 }
            }
        
        header('location:profile.php');
}
   else {
      echo "<script> alert('Invalid Username/Password.');</script>";
  	  echo "<script> window.location='login.php';</script>";	
	
  }

}

/*session_start();
$con = new mysqli("localhost","root","","faculty_dashboard");
$name=$_POST['user'];
$pass=$_POST['pass'];

$s = "select * from login where Fac_ID='$name' || mobile='$name && passwd='$pass' ";

$result= mysqli_query($con, $s);
$num= mysqli_num_rows($result);

if($num == 1){
  $_SESSION['username']=$name;
  header('location:profile.html');
}
else {
    header('location:login.php?login=notValid');
  }
*/


 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
