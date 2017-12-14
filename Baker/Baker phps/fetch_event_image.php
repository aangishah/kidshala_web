<?php
$con = mysqli_connect("mysql.hostinger.in","u771553694_event","wedumbna","u771553694_event");

$event_id=$_GET['event_id'];

$event_id='2';
echo $event_id;
$sql="select event_image from event where event_id='".$event_id."';";

$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

$data = base64_decode($row[0]);
echo $data;
$im = imagecreatefromstring($data);
if ($im !== false) {
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
}
else {
    echo 'An error occurred.';
}

mysqli_close($con);
?>