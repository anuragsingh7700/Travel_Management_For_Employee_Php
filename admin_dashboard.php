<?php
session_start();
if ($_SESSION["valid"] == true) {
	require("res/db.php");
	$conn = dbconnect();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="text-white">
		<nav class="navbar navbar-expand-md navbar-dark">
			<a class="navbar-brand ml-1 font-weight-bold " href="#">Travel Management System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item p-2">
						<div class="btn-group">
							<button type="button" class="btn btn-outline-light"><?php echo $_SESSION["name"];?></button>
							<button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split mr-2" data-toggle="dropdown">
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="admin_change_password.php">Change Password</a>
								<a class="dropdown-item" href="admin_update_profile.php">Update Profile</a>
								<a class="dropdown-item" href="admin_view_profile.php">View Profile</a>
							</div>
							<button onclick="show_info()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-info-circle" aria-hidden="true"></i>  Information</button>
							<button onclick="show_add_driver()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-user"></i>  Add Driver</button>
							<button onclick="show_add_vehicle()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-car"></i>  Add Vehicle</button>
						</div>
						<a class="btn btn-outline-danger rounded mr-2" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
			<div class="container col-lg-6">
				<div id="info_tab" class="text-center mt-5" >
					<h1>Welcome Admin <?php echo $_SESSION["name"];?>!</h1>
					<?php
						if(isset($_REQUEST["s"]) && $_REQUEST["s"] != ""){
							if(true == filter_var($_REQUEST["s"], FILTER_VALIDATE_BOOLEAN)){
								echo "<h4 class='text-success'>".$_REQUEST["msg"]."</h4>";
							} else{
								echo "<h4 class='text-danger'>".$_REQUEST["msg"]."</h4>";
							}
						}
					?>
					<!--Accordion wrapper-->
					<div class="accordion lg-accordion " id="accordionEx" role="tablist" aria-multiselectable="true">
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header bg-dark" role="tab" id="headingOne1">
								<a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
									aria-controls="collapseOne1" class="btn btn-dark">
									<h5 class="mb-0">
									<i class="fa fa-user" aria-hidden="true"></i>
									&nbsp;Registered Users&nbsp;<i class="fa fa-angle-down rotate-icon"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
								data-parent="#accordionEx">
								<div class="card-body bg-dark">
									<table class="table table-condensed text-white table-borderless">
										<thead class="thead-light">
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>Phone_no</th>
												<th>Pincode</th>
											</tr>
										</thead>
										<?php
											$sql1 = "SELECT * from employee_details";
											$result1 = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($result1)>0){
											while($row = mysqli_fetch_assoc($result1)){
										?>
										<tr>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['email'];?></td>
											<td><?php echo $row['phone_no'];?></td>
											<td><?php echo $row['pincode'];?></td>
										</tr>
										<?php }
									} else{
										echo "<h3 class='text-info'>No Employees registered</h3>";
									}
										?>
									</table>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header bg-dark" role="tab" id="headingTwo2">
								<a class="collapsed btn btn-dark" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
									aria-expanded="false" aria-controls="collapseTwo2" >
									<h5 class="mb-0">
									<i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;Drivers&nbsp;<i class="fa fa-angle-down rotate-icon"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
								data-parent="#accordionEx">
								<div class="card-body bg-dark">
									<table class="table table-condensed text-white table-borderless">
										<thead class="thead-light">
											<tr>
												<th>Name</th>
												<th>Mobile</th>
												<th>Email</th>
												<th>Timings</th>
												<th>driving Liscense</th>
											</tr>
										</thead>
										<?php
											$sql1 = "SELECT name,email,phone_no, shift_end,shift_start, dl_no from driver";
											$result1 = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($result1)>0){
											while($row = mysqli_fetch_assoc($result1)){
										?>
										<tr>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['phone_no'];?></td>
											<td><?php echo $row['email'];?></td>
											<td><?php echo $row['shift_start']."-".$row["shift_end"];?></td>
											<td><?php echo $row['dl_no'];?></td>
										</tr>
										<?php }
									}else{
										echo "<h3 class='text-info'>No Drivers registered</h3>";
									}
									?>
									</table>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
						<!-- Accordion card -->
						<div class="card">
							<!-- Card header -->
							<div class="card-header bg-dark" role="tab" id="headingThree3">
								<a class="collapsed btn btn-dark" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
									aria-expanded="false" aria-controls="collapseThree3">
									<h5 class="mb-0">
									<i class="fa fa-car" aria-hidden="true"></i>&nbsp;Vehicles&nbsp;<i class="fa fa-angle-down rotate-icon"></i>
									</h5>
								</a>
							</div>
							<!-- Card body -->
							<div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
								data-parent="#accordionEx">
								<div class="card-body bg-dark">
									<table class="table table-condensed text-white table-borderless">
										<thead class="thead-light">
											<tr>
												<th>Number</th>
												<th>Model</th>
												<th>Seats</th>
												<th>Colour</th>
											</tr>
										</thead>
										<?php
											$sql1 = "SELECT * from vehicle";
											$result1 = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($result1)>0){
											while($row = mysqli_fetch_assoc($result1)){
										?>
										<tr>
											<td><?php echo $row['reg_number'];?></td>
											<td><?php echo $row['model'];?></td>
											<td><?php echo $row['seats'];?></td>
											<td><?php echo $row['color'];?></td>
										</tr>
										<?php }
									}else{
										echo "<h3 class='text-info'>No Vehicles registered</h3>";
									}
									?>
									</table>
								</div>
							</div>
						</div>
						<!-- Accordion card -->
					</div>
					<!-- Accordion wrapper -->
				</div>
				<div class="offset-2 mt-2" id="add_driver_tab" style="display:none;">
					<h3>Please Enter The details of Driver</h3><br>
					<form action="controllers/driversavecontrol.php" method="POST">
						<div class="row">
							<div class="form-group col">
								<label>Full Name</label>
								<input required autocomplete="off" type="text" class="form-control" name="name">
							</div>
							<div class="form-group col">
								<label>Email ID</label>
								<input required autocomplete="off" type="text" class="form-control" name="email">
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<label>Phone Number</label>
								<input required autocomplete="off" type="tel" class="form-control" name="phone_no">
							</div>
							<div class="form-group col">
								<label>Driving Liscense Number</label>
								<input required autocomplete="off" type="Text" class="form-control" name="dl_no">
							</div>
						</div>
						<div class="row">
							<div class="form-group col">
								<label>Shift Start</label>
								<input required autocomplete="off" type="time" class="form-control" name="shift_start">
							</div>
							<div class="form-group col">
								<label>Shift End</label>
								<input required autocomplete="off" type="time" class="form-control" name="shift_end">
							</div>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" rows="3" required name="address"></textarea>
						</div>
						<div class="form-group col">
							<label>Pincode</label>
							<input required autocomplete="off" type="number" class="form-control" name="pincode">
						</div>
						<input type="submit" name="submit" value="Save" class="btn btn-outline-success">
					</form>
				</div>
				<div id="add_vehicle_tab" style="display:none;">
					<h3>Please Enter The details of the Vehicle</h3><br>
					<form method="POST" action="controllers/vehicesavecontrol.php">
						<div class="row">
							<div class="form-group col">
								<label>Vehicle Model</label>
								<input type="text" class="form-control" required name="model">
							</div>
							<div class="form-group col">
								<label>Vehicle Number</label>
								<input type="text" class="form-control" required name="number">
							</div>
						</div>
						<div>
							<label>Chasis Number</label>
							<input type="text" class="form-control mb-2	" required name="chasis_no">
						</div>
						<div class="row">
							<div class="form-group col">
								<label">Vehicle Color</label>
								<input type="text" class="form-control" required name="color">
							</div>
							<div class="form-group col">
								<label">Seating capacity</label>
								<input type="number" class="form-control" required name="seats">
							</div>
						</div>
						<input type="submit" name="submit" value="Save" class="btn btn-outline-success">
					</form>
				</div>
			</div>
			<script src="js/adminjs.js" charset="utf-8"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		</body>
	</html>
	<?php }else{
		header("Location:index.php");
	}
	?>