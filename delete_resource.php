<?php

$db = mysqli_connect("localhost","root","","faculty_dashboard");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
 // Using database connection file here

$id = $_GET['NAME']; // get id through query string

$id1 = $_GET['Course_ID'];

$del = mysqli_query($db,"DELETE FROM files WHERE Resource_name = '$id' and Course_ID='$id1'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:courses_resources.php");// redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>