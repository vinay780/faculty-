<?php

//$db = mysqli_connect("localhost","root","","faculty_dashboard");

include('db.php');
if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}
 // Using database connection file here

$id = $_GET['start_date']; // get id through query string
$fac =$_GET['student_id'];
$del = mysqli_query($con,"UPDATE gatepass SET status = 'accepted' WHERE gatepass.start_date = '$id' and gatepass.student_id = '$fac'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:gatepass_fac.php");// redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>