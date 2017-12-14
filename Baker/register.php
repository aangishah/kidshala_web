<?php

$conn = new mysqli("localhost","root", "", "akhbar");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$name=$_POST["name1"];
$mbno1=$_POST["mbno1"];

$enroll= $_POST["enrolln"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
$gname=$_POST["gname"];
$mbno2= $_POST["mbno2"];
$addr= $_POST["addr"];
$date = date("Y/m/d H:i:a");
#echo $date;
$sql = "INSERT INTO user(enrollment_no,email_id,admission_year,department_id,password,guardian_name,guardian_number,address)
VALUES ('$enroll', '$email', '$date','1','$passwd','$gname','$mbno2','$addr')";

if (mysqli_query($conn, $sql)) {
   # echo "New record created successfully";
   
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
