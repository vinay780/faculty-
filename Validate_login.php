<?php


require_once 'dbConnect.php';  
session_start();  
    class dbFunction {  
            
        function __construct() {  
              
            // connecting to database  
            $db = new dbConnect();;  
               
        }  
        // destructor  
        function __destruct() {  
              
        }    
        public function Login($username, $password){ 
		    
            $username=stripcslashes($username);
            $password=stripcslashes($password);
            $username=mysqli_real_escape_string($con,$username);
            $password=mysqli_real_escape_string($con,$password);

            $hashed_pass=SHA1($password);

            $s = "select * from login where Fac_ID='$username' || mobile='$username' && passwd='$hashed_pass' ";

            $result= mysqli_query($con, $s);
            $row=mysqli_fetch_assoc($result);

            if($row['Fac_ID']==$username || $row['mobile']==$username && $row['passwd']==$hashed_pass){
	    //$query="select Name from faculty where Fac_ID='$username';
	             
				return TRUE;
			}
			else  
            {  
                return FALSE;  
            } 
	 
             
        }   
		
		public function set_cookies($username, $password){
			
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
		}
		
        public function isUserExist($user){  
            $qr = mysqli_query("SELECT * FROM login WHERE Fac_ID = '".$username."'");  
            echo $row = mysqli_num_rows($qr);  
            if($row > 0){  
                return true;  
            } else {  
                return false;  
            }  
        }  
    }  























/*
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

if($row['Fac_ID']==$username || $row['mobile']==$username && $row['passwd']==$hashed_pass){
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
    header('location:login.php?login=notValid');
	
  }

*/
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
