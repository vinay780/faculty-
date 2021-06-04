<?php

$link = mysqli_connect("localhost", "root", "") or die("Could not connect to server!");
mysqli_select_db($link, "faculty_dashboard") or die("Could not connect to database!");

?>