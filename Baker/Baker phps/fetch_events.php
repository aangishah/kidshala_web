<?php

$con = mysqli_connect("mysql.hostinger.in","u771553694_event","wedumbna","u771553694_event");

// Check connection
	if (mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	else
	{
		$sql_query="select event_id,ename,description,edate,event_image_link from event order by event_id;";
		$res = mysqli_query($con,$sql_query);
		$result = array();
   		while($row = mysqli_fetch_array($res)){

		array_push($result,
		array('event_id'=>$row[0],
		'ename'=>$row[1],
		'description'=>$row[2],
		'edate'=>$row[3],
		'event_image_link'=>$row[4]
		));
		}
		echo json_encode(array("result"=>$result));
	}
 
mysqli_close($con);
?>
