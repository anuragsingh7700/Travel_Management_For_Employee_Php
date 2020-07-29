<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Homegage</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<style>
		::placeholder {
         color: red;
         opacity: 1;
        }
		body{
		background-image: url(bgimage.jpeg);
		background-size: cover;
		font-family:new time roman;
		}
		.col-md-5{
			margin-top:-20px;
			box-shadow: -1px 1px 60px 10px black;
			background: rgba(0,0,0,0.4);
			border:5px solid white;
		}
		.label{
			font-weight:normal;
			margin-top:20px;
			color:white;
		}

		.form-control{
			background:transparent;
			border-radius:0px;
			border:0px;
			border-bottom: 1px solid white;
			font-size:18px;
			margin-top:15px;
			height:40px;
			color:white;

		}
		.btn-info{
			margin-top:20px;
			font-size:18px;
			width:120px;
			margin-left:80px;
			margin-bottom:20px;
		}
		.btn-warning{
			font-size:18px;
			width:120px;
			margin-left:10px;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-md bg-success navbar-dark bg-transparent">
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
		<div class="container">
		    <div class="row">
			    <div class="col-md-7" style="border:transparent;margin-left:-100px">
				<h1 class="text-center" style="color:white;margin-top:20%;">
				Welcome to</h1>
				<h1 class="text-center"style="color:white">Transport Management Portal
				<h1 class="text-center"style="color:white">for TCET's precious Employees</h1>
				<h3 class="text-center"style="color:white">Let's Plan a Journey!!</h3>
			</div>
			<div class="col-md-5" style="margin-left:100px">
			   <div class="row" style="margin-left:30%">
				   <h3 class="text-left" style="color:white;margin-top:15%">Registration Form</h3>
			<form method="POST" action="registerentry.php">
			</div><hr style="background-color:white">	
		    <div class="row">
			    <label class="label col-md-2 control-label">Emp_Id:</label>
				<div class="col-md-10">
				   <input type="text" class="form-control" name="Emp-Id" placeholder="Enter Employee Id">
				</div>
			</div>
			<div class="row">
			    <label class="label col-md-2 control-label">Password:</label>
				<div class="col-md-10">
				   <input type="password" class="form-control" name="password" placeholder="Password">
				</div>
			</div>
			<div class="row">
			    <label class="label col-md-2 control-label">Email_Id:</label>
				<div class="col-md-10">
				   <input type="Email" class="form-control" name="Email_Id" placeholder="Email_Id">
				</div>
			</div>
			<div class="row">
			    <label class="label col-md-2 control-label">Address:</label>
				<div class="col-md-10">
				   <textarea class="form-control" name="address"></textarea>
				</div>
			</div>
			<div class="row">
			    <label class="label col-md-2 control-label">Pincode:</label>
				<div class="col-md-10">
				   <input type="text" class="form-control" name="pincode" placeholder="Pincode">
				</div>
			</div>
			<div class="row">
			    <label class="label col-md-2 control-label">Contact:</label>
				<div class="col-md-10">
				   <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number">
				</div>	
			</div>
			<input type="submit" class="btn btn-info" value="submit" data-toggle="modal" data-target="#myModal1">
			<input type="reset"  class="btn btn-warning" value="Clear">
        </div>
		</form>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>
