<?php
session_start();
if ($_SESSION["valid"] == true) {
	$jid = $_REQUEST["id"];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>booking details</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">		
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark">
				<a class="navbar-brand ml-1 font-weight-bold " href="#">Travel Management System</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-outline-light"><?php echo $_SESSION["name"];?></button>
							<button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split mr-3" data-toggle="dropdown">
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="emp_view_profile.php">View Profile</a>
								<a class="dropdown-item" href="emp_update_password.php">Update Profile</a>
								<a class="dropdown-item" href="emp_change_password.php">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
		<div class="container text-center text-white ">
			<h3>Booking history</h3>
			<?php require("res/db.php");
  $conn = dbconnect();
  $sql = "SELECT DISTINCT d.name as driver,d.phone_no as phone, v.model as model,v.reg_number as number, DATE_FORMAT(date,'%y-%m-%d') as date,TIME_FORMAT(start, '%H:%i') as time from driver as d, vehicle as v, journey_details as j where d.id = j.d_id and v.id = j.v_id and j.j_id = '$jid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  ?>
			<table class="table table-dark table-hover text-white vertical-center col-lg-6 mx-auto">
				<tr>
					<td>Driver</td>
					<td><?php echo $row["driver"]?></td>
				</tr>
				<tr>
					<td>phone</td>
					<td><?php echo $row["phone"]?></td>
				</tr>
				<tr>
					<td>Vehicle Model</td>
					<td><?php echo $row["model"]?></td>
				</tr>
				<tr>
					<td>Vehicle Number</td>
					<td><?php echo $row["number"]?></td>
				</tr>
				<tr>
					<td>Date</td>
					<td><?php echo $row["date"]?></td>
				</tr>
				<tr>
					<td>Time</td>
					<td><?php echo $row["time"]?></td>
				</tr>
			</table>
        <a href="emp_dashboard.php" class="btn btn-danger ">Back to Dashboard</a>

		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>

<?php }else{
	header("Location:index.php");
}
?>