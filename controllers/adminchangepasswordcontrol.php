<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$id = $_SESSION["id"];
	$old_pass = $_POST["old_pass"];
	$new_pass = $_POST["new_pass"];
	echo $new_pass;
	require '../res/db.php';
	$conn = dbconnect();

	$sql = "SELECT password from admin where id = $id ";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

	if($row["password"] == $old_pass){
		// $sql = "UPDATE admin SET id=[value-1],username=[value-2],password=[value-3] WHERE 1"
		$sql2 = "UPDATE admin SET password = '$new_pass' where id = $id";
		$result2 = mysqli_query($conn, $sql2);
		// print_r($result2);
		// exit();
		if($result2){
			header("Location:../admin_dashboard.php?s=true&msg=Password Updated");
		}
		else{
			header("Location:../admin_dashboard.php?s=false&msg=Password Updation failed");
		}
	}
	else{
			header("Location:../admin_dashboard.php?s=false&msg=Technical Error");
	}
}else{
			header("Location:../admin_dashboard.php?s=false&msg=Technical Error");
	}
?>