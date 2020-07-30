<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["name"];
	$dl_no = $_POST["dl_no"];
	$shift_start = $_POST["shift_start"];
	$shift_end = $_POST["shift_end"];
	$email = $_POST["email"];
	$address =$_POST["address"];
	$pincode =(int) $_POST["pincode"];
	$phone_no =(int) $_POST["phone_no"];
	echo $name. $email. $phone_no. $address. $pincode. $dl_no. $shift_start. $shift_end;
	require("../res/db.php");
// Creates connection
	$conn = dbconnect();
	$sql = "INSERT INTO driver(id, name, email, phone_no, address, pincode, dl_no, shift_start, shift_end) VALUES ('','$name', '$email', $phone_no, '$address', $pincode, '$dl_no', '$shift_start', '$shift_end')";
	$result = mysqli_query($conn, $sql);
	// print_r($result);
	// exit();
	if($result){
		header("Location:../admin_dashboard.php?s=true&msg=Driver details saved succesfully");
	}else{
		header("Location:../admin_dashboard.php?s=false&msg=Encountered Some Technical Error!");}
mysqli_close($conn);
}else{
	header("Location:../admin_dashboard.php?s=false&msg=Encountered Some Technical Error!");
}
?>