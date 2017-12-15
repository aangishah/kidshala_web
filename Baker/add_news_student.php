<?php

$conn = new mysqli("localhost","root", "", "akhbar");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$news_title=$_POST['news_title'];
	$news_date=$_POST['news_date'];
	$news_inshort=$_POST['news_inshort'];
	
	$news_detail=$_POST['news_detail'];
	$image1= addslashes(file_get_contents($_FILE['uploadedimage']['tmp_name']));
	
	$status="";
		$sql="insert into news(event_info,event_name,event_date,event_link,event_type) values('$news_detail','$news_title','$news_date','','Cultural');";
		if(mysqli_query($conn, $sql)==true)
		{
			$status="successfully inserted";
			//echo "successfully inserted!";
		}
		else{
			$status="not inserted";
			//echo "not inserted!";	
		}
	
?>
