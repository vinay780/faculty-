<?php

//$db = mysqli_connect("localhost","root","","faculty_dashboard");

include('db.php');
if(!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}
 // Using database connection file here

$id = $_GET['start_date']; // get id through query string
$fac =$_GET['Fac_ID'];
$del = mysqli_query($con,"UPDATE attendance SET status = 'Rejected' WHERE attendance.start_date = '$id' and attendance.Fac_ID = '$fac'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:head_faculty.php");// redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>