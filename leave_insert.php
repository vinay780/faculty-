<?php session_start();
if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];
$username=$_SESSION['userid'];
 include('db.php');

$type=$_POST['leave-type'];
$start=$_POST['start_date'];
$end=$_POST['end_date'];
$reason=$_POST['reason'];

$today = date("Y-m-d");

$sql = "insert into attendance values('$username','$today','$start','$end','$reason','$type','Pending');";


if (mysqli_query($con, $sql)) {
  echo "<script> alert('Leave applied successfully.');</script>";
  echo "<script> window.location='index.php';</script>";
} else {
   echo "<script> alert('Error while inserting record.');</script>";
   echo "<script> window.location='leave.php';</script>";
}






?>