<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$reg_number = $_POST["number"];
	$model = $_POST["model"];
	$chasis_no = $_POST["chasis_no"];
	$color =$_POST["color"];
	$seats =(int) $_POST["seats"];
	echo $name. $email. $phone_no. $address. $pincode. $dl_no. $shift_start. $shift_end;
	require("../res/db.php");
// Creates connection
	$conn = dbconnect();
	$sql = "INSERT INTO vehicle(id, reg_number, model, seats, color, chasis_no) VALUES ('', '$reg_number', '$model', $seats, '$color', '$chasis_no' )";
	$result = mysqli_query($conn,$sql);
	if($result){
		header("Location:../admin_dashboard.php?s=true&msg=Vehicle details saved succesfully");
	}else{
		header("Location:../admin_dashboard.php?s=false&msg=Encountered Some Technical Error!");}
mysqli_close($conn);
}else{
	header("Location:../admin_dashboard.php?s=false&msg=Encountered Some Technical Error!");
}
?>