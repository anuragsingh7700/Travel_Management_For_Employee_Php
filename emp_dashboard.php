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
								<a class="dropdown-item" href="#">View Profile</a>
								<a class="dropdown-item" href="#">Update Profile</a>
								<a class="dropdown-item" href="#">Change Password</a>
							</div>
						</div>
						<a  class="btn btn-outline-danger" href="controllers/logoutcontrol.php">Logout</a>
						
					</ul>
				</div>
			</nav>
			<br>
			<div class="container-fluid text-center text-info">
				<h1>Welcome <?php echo $_SESSION["name"];?>!</h1>
			</div>
		</div>
	</div>
	<div class="row card-deck text-white col-12">
		<div class="card bg-transparent ">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>Its important to be right on time,
					want to review your next journey details?</h3>
					<form action="timeline.php">
						<button type="submit" class="btn btn-outline-primary">See your Timeline</button>
					</form>
				</p>
			</div>
		</div>
		<div class="card bg-transparent text-white">
			<div class="card-body text-center">
				<p class="card-text">
					<h3>You can travel alone, as well as with your Group!<br>
					Let's book a trip!</h3>
						<a class="btn btn-outline-light" href="#">Register for a trip</a>
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