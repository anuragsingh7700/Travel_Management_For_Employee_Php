<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Homegage</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-md bg-success navbar-dark">
			<a class="navbar-brand ml-1 font-weight-bold " href="#">Travel Management System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item p-2">
						<a class="nav-link text-white" href="#">Home</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white " href="#">Services</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white " href="#">Contact</a>
					</li>
					<li class="nav-item p-2">
						<a class="nav-link text-white " href="#">About Us</a>
					</li>
				</ul>
			</div>
		</nav>
		<br>
		<div class="container-fluid text-center text-white col-sm-10 col-lg-6 bg-info">
			<h1>Welcome to Our Portal</h1>
		</div>

		<div class="container text-center p-4 col-lg-5 col-sm-10 bg-light">
			<h2>Choose Your Role</h2>
			<?php 
				if(isset($_REQUEST["valid"]) && $_REQUEST["valid"] == "false"){ ?>
				<h6 class='text-danger'>Wrong credentials! Try again</h6>
			<?php }
			?>
			<div class="row justify-content-center p-5 ">
				<div class="column">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#myModal1">
					Administrator
					</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal1">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								
								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Admin Login</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								
								<!-- Modal body -->
								<div class="modal-body p-4">
									<form action="controllers/logincontrol.php" method="post">
										<input class="form-control p-2 " type="text" name="username" placeholder="Username">
										<input class="form-control mt-2 p-2 " type="password" name="password" placeholder="Password">
										<input class="form-control mt-4 btn btn-success" type="submit" value="Login">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="column">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#myModal2">
					Employee
					</button>
					<!-- The Modal -->
					<div class="modal fade" id="myModal2">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								
								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Employee Login</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								
								<!-- Modal body -->
								<div class="modal-body">
									<form action="#" method="post">
										<input class="form-control p-2 " type="text" name="empId" placeholder="Employee Id">
										<input class="form-control mt-2 p-2 " type="password" name="Password" placeholder="Password">
										<input class="form-control mt-4 btn btn-success" type="submit" value="Login">
									</form>
								</div>
								
								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>