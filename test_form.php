


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "faculty_dashboard");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$type = $_POST['type'];
$start_date = date_format($_POST['start_date'],"Y-m-d");
$end_date = date_format($_POST['end_date'],"Y-m-d");
$Reason = $_POST['Reason'];

// $type='On Duty';
// $start_date='2021-03-26';
// $end_date='2021-03-27';
// $Reason='Corona vaccinated';

// Attempt insert query execution
$sql = "INSERT INTO attendance(Fac_id,apply_date,start_date,end_date,Reason,type,status) VALUES ('FAC0035',CURDATE(),$start_date,$end_date,'$Reason','$type','Pending')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>