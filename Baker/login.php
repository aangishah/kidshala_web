<?php
	$conn = new mysqli("localhost","root", "", "akhbar");
	// Check connection
	if ($conn->connect_error) {
	//	die("Connection failed: " . $conn->connect_error);
	}	 


	$enrollment_no=$_POST["erno"];
	$passwd=$_POST["psw"];
	$date = date("Y/m/d H:i:a");
	#echo $date;
	$sql = "SELECT * FROM user where enrollment_no='".$enrollment_no."' and password='".$passwd."' limit 1";
	$res=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($res);
	$_SESSION["enrollment_no"] = $row['enrollment_no'].'';
	if(mysqli_num_rows($res) > 0 ){ 
	return "1";
	}
else {
   return "0";
}
?>