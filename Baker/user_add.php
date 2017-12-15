<?php

$conn = new mysqli("localhost","root", "", "akhbar");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$enroll= $_POST["enrolln"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
echo $enroll;
$date = date("Y/m/d H:i:a");
echo $date;
$sql = "INSERT INTO user (enrollment_no,email_id,admission_year,department_id,password)
VALUES ('$enroll', '$email', '$date','1','$passwd')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
