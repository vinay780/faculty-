<?php
  session_start();
  //session_destroy();
  
  if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
$_SESSION['userid']=$_SESSION['userid'];
  
  unset($_SESSION["userid"]);
  header('location:login.php');
 ?>