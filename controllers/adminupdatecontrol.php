<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$id = $_SESSION["id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$department = $_POST["department"];
	require '../res/db.php';
	$conn = dbconnect();

	$sql = "UPDATE admin_details SET name='$name',email='$email',department='$department' WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	// print_r($result);
	// exit();
	if($result){
		$_SESSION["name"] = $name;
		header("Location:../admin_dashboard.php?s=true&msg=Profile Updated Successfully");
	}
	else{
		header("Location:../admin_dashboard.php?s=false&msg=Profile Updation failed");
	}
}else{
	header("Location:../admin_dashboard.php?s=false&msg=Technical Error");
}
?>