<?php

	$conn = new mysqli("localhost","root", "", "akhbar");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	 
	$sql = "SELECT * FROM news";
	$res=mysqli_query($conn, $sql);
	
	$a=array();
	if(mysqli_num_rows($res) > 0 ){ 
		return $res;
		//$a=mysqli_fetch_array($res);
		//print_r($a);
	}
else {
}
	

?>