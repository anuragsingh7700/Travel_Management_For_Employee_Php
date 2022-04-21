<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	session_start();
	$objective = $_REQUEST["objective"];
	$checked = $_REQUEST["checked"];
	if($checked === true ){
	$pickup = $_REQUEST["pickup"];}
	else{
		$pickup = "Thakur college of engineering and Technology, kandivali (E)-400098";
	}
	$drop = $_REQUEST["drop"];
	$v_id = $_REQUEST["vehicle"];
	$d_id = $_REQUEST["driver"];
	$e_id = $_SESSION["id"];
	$password = $_REQUEST["password"];
	$date = $_SESSION["date"];
	$start = $_SESSION["start"];
	$end = $_SESSION["end"];
	require("../res/db.php");
// Creates connection
	$conn = dbconnect();
	$sql = "SELECT password from employee where id=$e_id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if ($password == $row){
		$sql = "INSERT INTO `journey_details`(`j_id`, `v_id`, `d_id`, `e_id`, `objective`, `date`, `start`, `end`, `booking_time`,`pickup_addr`,`drop_addr`) VALUES ('', $v_id, $d_id, $e_id, '$objective', '$date', '$start', '$end', 'NOW()', '$pickup', '$drop')";
		$result = mysqli_query($conn,$sql);
		if($result){
			header("Location:../emp_dashboard.php?s=true&msg=Bingo! Booking is Successful.");
		}else{
			header("Location:../emp_dashboard.php?s=false&msg=Booking Failed");}
	}else{
		header("Location:../emp_dashboard.php?s=false&msg=Booking Unsuccessful! Password Invalid, Please try again");}
	}
mysqli_close($conn);
}else{
	header("Location:../emp_dashboard.php?s=false&msg=Encountered Some Technical Error!");
}
?>