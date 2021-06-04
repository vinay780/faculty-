<?php

namespace dash\models;
class Login
{
	public $user_name;
	/*public $s;
	public $result;
	public $row;
	public $con;
	$con = new mysqli("localhost","root","","faculty_dashboard");*/
	
     public function setUser($username)
	{
		//include('db.php')
		//$this->
		/*$username=stripcslashes($username);
		$username=mysqli_real_escape_string($con,$username);*/
		
		/*$this->s = "select * from login where Fac_ID='$username'";
		$this->result= mysqli_query($this->con, $this->s);
		$this->row=mysqli_fetch_assoc($this->esult);
		if($this->row['Fac_ID']==$username){*/
			
		$this->user_name=$username;
			
	}
	
	 public function getUser(){
		return $this->user_name;
	}


}