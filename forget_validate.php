<?php
session_start();
include('db.php');
 
$username=$_POST['user']; 
$sq11=$_POST['sq1'];
$sq22=$_POST['sq2'];
  
$hashed_sq1=SHA1($sq11);
$hashed_sq2=SHA1($sq22);

$s = "select * from login where sq1='$hashed_sq1'  && sq2='$hashed_sq2' && Fac_ID='$username' ";

$result= mysqli_query($con, $s);
$row=mysqli_fetch_assoc($result);


if($row['sq1']==$hashed_sq1 && $row['sq2']==$hashed_sq2 && $row['Fac_ID']==$username){
	    //$query="select Name from faculty where Fac_ID='$username';
	    $_SESSION['userid']=$username;
        header('location:change.php');
}
else {
    header('location:forget.php?forget=notValid');
}




?>