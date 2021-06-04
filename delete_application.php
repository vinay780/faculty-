<?php

$db = mysqli_connect("localhost","root","","faculty_dashboard");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
 // Using database connection file here

$id = $_GET['start_date']; // get id through query string

$del = mysqli_query($db,"DELETE FROM Attendance WHERE start_date = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:leave_summary.php");// redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>