<?php 
	$username=$_POST["username"];
	$password=$_POST["password"];
	if($username=='admin' && $password=='admin123')
	{
	$_SESSION["username"] = $username;
	$_SESSION["password"]=$password;
	$_SESSION['loggedin'] = true;
	echo "login successful";
	return "1";
	echo "check";
	}
	else
		return 0;
	return 1;
?>