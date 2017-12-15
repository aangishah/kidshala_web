<?php

$conn = new mysqli("localhost","root", "", "akhbar");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$news_id=$_POST['id'];
#echo $date;
$sql = "delete from news where event_id='".$news_id."';";
if (mysqli_query($conn, $sql)) {
   # echo "New record created successfully";
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
