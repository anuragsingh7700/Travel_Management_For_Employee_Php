<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a class="dropdown-item" href="#">Change Password</a>
                <a class="dropdown-item" href="#">Update Profile</a>
                <a class="dropdown-item" href="#">View Profile</a>
              </div>
              <button onclick="show_info()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-info-circle" aria-hidden="true"></i>  Information</button>
              <button onclick="show_add_driver()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-user"></i>  Add Driver</button>
              <button onclick="show_add_vehicle()" class='btn btn-outline-light rounded mr-2'><i class="fa fa-car"></i>  Add Vehicle</button>
            </div>
            <a class="btn btn-outline-danger rounded mr-2" href="controllers/logoutcontrol.php">Logout</a>
            
          </ul>
        </div>
      </nav>
      <div class="container">
        <div id="info_tab" class="text-center mt-5" >
          <h1>Welcome Admin <?php echo $_SESSION["name"];?>!</h1>
        </div>
        <div class="offset-2" id="add_driver_tab" style="display:none;">
          <h3>Please Enter The details of Driver</h3><br>
          <form>
            <div class="row">
              <div class="form-group col">
                <label for="driverFirstName">First Name</label>
                <input type="text" class="form-control" id="driverFirstName">
              </div>
              <div class="form-group col">
                <label for="driverMiddleName">Middle Name</label>
                <input type="text" class="form-control" id="driverMiddleName">
              </div>
              <div class="form-group col">
                <label for="driverLastName">Last Name</label>
                <input type="text" class="form-control" id="driverLastName">
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="birthdate">Date Of Birth</label>
                <input type="date" class="form-control" id="birthdate">
              </div>
              <div class="form-group col">
                <label for="phoneNo">Phone Number</label>
                <input type="number" class="form-control" id="phoneNo">
              </div>
              <div class="form-group col">
                <label for="addhaarNo">Driving Liscense Number</label>
                <input type="number" class="form-control" id="phoneNo">
              </div>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" id="address" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="image">Upload An Image</label>
              <input type="file" class="form-control-file" id="image">
            </div>
          </form>
          <button type="submit" name="submitButton" class="btn btn-success">Submit</button>
        </div>
        <div id="add_vehicle_tab" style="display:none;">
          <h3>Please Enter The details of the Vehicle</h3><br>
          <form>
            <div class="row">
              <div class="form-group col">
                <label for="vehicleCompany">Vehicle Company</label>
                <input type="text" class="form-control" id="vehicleCompany">
              </div>
              <div class="form-group col">
                <label for="vehicleModel">Vehicle Model</label>
                <input type="text" class="form-control" id="vehicleModel">
              </div>
              <div class="form-group col">
                <label for="licenseNumber">Vehicle License Number</label>
                <input type="text" class="form-control" id="licenseNumber">
              </div>
            </div>
            <div class="row">
              <div class="form-group col">
                <label for="ownershipDate">Date of Vehicle Purchase</label>
                <input type="date" class="form-control" id="ownershipDate">
              </div>
              <div class="form-group col">
                <label for="vehicleColor">Vehicle Color</label>
                <input type="text" class="form-control" id="vehicleColor">
              </div>
              <div class="form-group col">
                <label for="vehicleType">Type Of Vehicle</label>
                <input type="number" class="form-control" id="vehicleType">
              </div>
            </div>
            <h4>Route Information</h4>
            <div class="form-group row">
              <div class="col">
                <label for="routeFrom">From:</label>
                <input type="text" id="routeFrom" class="form-control">
              </div>
              <div class="col">
                <label for="routeTo">To:</label>
                <input type="text" id="routeTo" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="image">Upload An Image of the vehicle</label>
              <input type="file" class="form-control-file" id="image">
            </div>
          </form>
          <button type="submit" name="submitButton" class="btn btn-success">Submit</button>
        </div>
      </div>
      <script src="js/adminjs.js" charset="utf-8"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
  </html><?php }else{
	header("Location:index.html");
}
?>