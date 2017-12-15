
<?php
session_start();
$conn = new mysqli("localhost","root", "", "kidshala");
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	
$ob_name=$_POST["object_name"];
$ob_description=$_POST['description'];
$date=date("Y/m/d");
#$cat_id=$_POST['cat_id'];
$user_id=$_SESSION['user_id'];

$ob_name='test';
$cat_id='1';
$ob_description='tes';

$target_dir = "3d_uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	return 0;
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		
		$sql = "insert into object(bundle_address, object_name, object_description, object_view_count, upload_date, cat_id, user_id, admin_uploaded, admin_approved, approve_status)
		values('".$target_dir.basename( $_FILES['fileToUpload']['name'])."','".$ob_name."','".$ob_description."','0','".$date."','".$cat_id."','".$user_id."','0','0','0')";
		if(mysqli_query($conn, $sql)){
			echo "Records inserted successfully.";
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
		return 1;
		
    } else {
        echo "Sorry, there was an error uploading your file.";
		return 0;
    }
}
?>
