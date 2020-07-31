<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<div="header">
			<title>Homegage</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
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
								<a class="dropdown-item" href="emp_update_profile.php">Update Profile</a>
								<a class="dropdown-item" href="emp_change_password.php">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
			<br>
			<div class="container-fluid text-center text-info">
				<h1>Welcome <?php echo $_SESSION["name"];?>!</h1>
				<?php
						if(isset($_REQUEST["s"]) && $_REQUEST["s"] != ""){
							if(true == filter_var($_REQUEST["s"], FILTER_VALIDATE_BOOLEAN)){
								echo "<h4 class='text-success'>".$_REQUEST["msg"]."</h4>";
							} else{
								echo "<h4 class='text-danger'>".$_REQUEST["msg"]."</h4>";
							}
						}
					?>
			</div>
		</div>
	</div>
	<div class="row card-deck text-white col-12">
		<div class="card bg-transparent ">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>Its important to be right on time,
					want to review your next journey details?</h3>
						<a class="btn btn-outline-success" href="history.php">Booking History</a>
				</p>
			</div>
		</div>
		<div class="card bg-transparent text-white">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>You can travel alone, as well as with your Group!<br>
					Let's book a trip!</h3>
						<!-- <a class="btn btn-outline-light" href="book_new.php">Register for a trip</a> -->


						<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#myModal2">Register for a trip</button>
						<!-- The Modal -->
						<div class="modal fade" id="myModal2">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content bg-dark">
									
									<!-- Modal Header -->
									<div class="modal-header bg-secondary ">
										<h4 class="modal-title text-light">Search for Transport</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									
									<!-- Modal body -->
									<div class="modal-body text-center">
										<form action="book_new.php" method="get">
											<label>Journey Date</label>
											<input class="form-control p-2" type="date" name="date" placeholder="Journey" required autocomplete="off" min="<?php echo date("Y-m-d")?>">
											<label>Number of Passengers</label>
											<select name="seats" class="form-control" required>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
											<label>Journey Time slot</label>
											<p class="text-info">Working hours 07:00 to 22:00</p>
											<div class="row form-group justify-content-around">
											<div class="column">
											<label>Start Time</label>
											<input class="form-control mt-3 p-2" type="time" name="start_time" placeholder="start_time" required  min="07:00" max="22:00"></div>
											<div class="column">
											<label>End Time</label>
											<input class="form-control mt-3 p-2" type="time" name="end_time" placeholder="end_time" required  min="07:01" max="22:00"></div>
											</div>
										</div>
											<input class=" my-4 mx-auto btn btn-outline-success col-6" type="submit" value="Search">
										</form>
									</div>
								</div>
							</div>
						</div>
				</p>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
​
<?php }else{
	header("Location:index.php");
}
?>