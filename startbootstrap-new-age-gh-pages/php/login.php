<?php
	$conn = new mysqli("localhost","root", "", "kidshala");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	 
	$username=$_POST["username"];
	$passwd=$_POST["pwd"];
	$date = date("Y/m/d H:i:a");
	#echo $date;
	$sql = "SELECT * FROM user where user_name='".$username."' and pwd='".$passwd."' limit 1";
	$res=mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($res);
	$_SESSION["user_name"] = $row['user_name'].'';
	if(mysqli_num_rows($res) > 0 ){ 
	return "1";
	}
else {
   return "0";
}
return 1;
?>