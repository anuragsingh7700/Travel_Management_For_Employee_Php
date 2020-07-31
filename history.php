<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>booking history</title>
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
								<a class="dropdown-item" href="#">View Profile</a>
								<a class="dropdown-item" href="#">Update Profile</a>
								<a class="dropdown-item" href="#">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
		<div class="container text-center text-white ">
			<h3>Booking history</h3>
			<?php require("res/db.php");
			$id = $_SESSION["id"];
  $conn = dbconnect();
  $sql = "SELECT DISTINCT j_id,objective, DATE_FORMAT(date,'%y-%m-%d') as date,TIME_FORMAT(start, '%H:%i') as start from journey_details where e_id = $id";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
  ?>
			<table class="table table-transparent text-white vertical-center col-lg-8 mx-auto">
				<th>
					<td>Date</td>
					<td>Start</td>
					<td>Reason</td>
				</th>
				<?php
					while($row = $result->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $row["date"]?></td>
					<td><?php echo $row["start"]?></td>
					<td><?php echo $row["objective"]?></td>
					<td><form action="booking_details.php">
						<input type="text" name="id" value="<?php echo $row['j_id']?>" style="display: none;">
						<input type="submit" class="btn btn-outline-primary" value="View details"></form></td>
				</tr>
			<?php }
		}else{
			echo "<h3 class='text-primary'>No records to display</h3><br>
			<a href='emp_dashboard.php' class='btn btn-outline-danger'>Back to Dashboard</a>";
		}
			?>
			</table>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>

<?php }else{
	header("Location:index.php");
}
?>