<?php
session_start();
if ($_SESSION["valid"] == true) {
  $date = $_REQUEST["date"]; 
  $seats = $_REQUEST["seats"];
  $start_time = $_REQUEST["start_time"];
  $end_time = $_REQUEST["end_time"];

  $_SESSION["date"] = $date;
  $_SESSION["start"] = $start_time;
  $_SESSION["end"] = $end_time;
  require("res/db.php");
  $conn = dbconnect();
  $sql_dri = "SELECT DISTINCT d.id,d.name,d.phone_no from driver d
      where d.id in (select id from driver 
              where TIME_FORMAT(shift_start, '%H:%i') <= '$start_time'
              and TIME_FORMAT(shift_end, '%H:%i')  >= '$end_time'
              and id not in (select id from journey_details
                      where DATE_FORMAT(date,'%y-%m-%d') = '$date'
                        and TIME_FORMAT(start, '%H:%i') <= '$start_time'
                        and TIME_FORMAT(end, '%H:%i') >= '$end_time'))";
  $sql_veh = "SELECT DISTINCT v.id, v.reg_number,v.model from vehicle v
        where v.id in ( SELECT id from vehicle
              where seats > $seats
              and id not in (select id from journey_details
                      where DATE_FORMAT(date,'%y-%m-%d') = '$date'
                      and TIME_FORMAT(start, '%H:%i') <= '$start_time'
                      and TIME_FORMAT(end, '%H:%i') >= '$end_time'))";

  $result_dri = mysqli_query($conn, $sql_dri);
  $result_veh = mysqli_query($conn, $sql_veh);
  $drivers = array();
  $no_of_drivers = 0;
  while($row = mysqli_fetch_assoc($result_dri)){
    $no_of_drivers = (array_push($drivers,array("id"=>$row["id"],"name"=>$row["name"], "phone_no"=>$row["phone_no"])));
  }
  $vehicles = array();
  $no_of_vehicles = 0;
  while($row = mysqli_fetch_assoc($result_veh)){
    $no_of_vehicles = (array_push($vehicles,array('id'=>$row["id"],'number'=>$row["reg_number"],"model"=>$row["model"])));
  }
  // print_r($drivers);
  // print_r($vehicles);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Journey Registeration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <?php if($no_of_drivers>0 && $no_of_vehicles>0){?>
    <div class="container text-white">
      <div class="container-fluid text-center text-info">
        <h2><i class="fa fa-car"></i> Enter Your details and LET'S GO! <i class="fa fa-car"></i></h2>
      </div>
      <form action="controllers/confirmbookcontrol.php" method="POST" class="col-lg-6 col-md-8 col-sm-10 mx-auto">
        <div class="form-group">
          <label for="Pickup">Objective:</label>
          <input type="text" class="form-control" id="objective" placeholder="Enter the Cause for the Journey" name="objective" required>
        </div>
        <div class="form-group row col-12 justify-content-around">
          <div class="column">
            <label for="Pickup">Pickup Location:</label><br>
            
            <textarea type="text" class="form-control" id="Pickup" placeholder="Enter your Pickup Location" name="pickup" required></textarea>
            Same as office:
            <input type="checkbox" name="checked" value="true" id="checkbox">
          </div>
          <div class="column">
            <label for="Drop">Drop Location:</label>
            <textarea type="text" class="form-control" id="Drop" placeholder="Enter your Drop Location" name="drop" required></textarea>
          </div>
          <div class="form-group row col-12 justify-content-around">
          <div class="column">
            <label>Driver</label><br>
            <select name="driver" class="form-control" required>
              <option disabled>Select driver</option>
              <?php
                foreach ($drivers as $driver) {?>
              <option value="<?php echo $driver["id"]?>"><?php echo $driver["name"]?></option>
              <?php }?>
            </select>
          </div>
          <div class="column">
            <label>vehicle</label><br>
            <select name="vehicle" class="form-control" required>
              <option disabled>Select vehicle</option>
              <?php
                foreach ($vehicles as $vehicle) {?>
              <option value="<?php echo $vehicle["id"]?>"><?php echo $vehicle["model"]?></option>
              <?php }?>
            </select>
          </div>

        </div>
        <a href="emp_dashboard.php" class="btn btn-outline-danger ">Back to Dashboard</a>
          <button class="btn btn-outline-success px-4 mr-2 " data-toggle="modal" data-target="#myModal">BOOK</button>
        </div>
        
        <div class="container">
          <!-- Button to Open the Modal -->
          <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Open modal
          </button>-->
          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog ">
              <div class="modal-content">
                
                <!-- Modal Header -->
                <div class="modal-header bg-dark">
                  <h4 class="modal-title">Booking Confirmation</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body bg-dark">
                  <form action="#" method="post">
                    <label>Enter Password </label>
                    <input class="form-control mt-2 p-2 " type="password" name="password" placeholder=" Enter your Password" required autocomplete="off">
                    <input class="form-control mt-4 btn btn-success" type="submit" value="Confirm">
                  </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer bg-dark">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
      </form>
    </div>
  <?php }else{
    echo "<div class='container text-center'><h3 class='text-info'>No Transport media found, try changing details</h3>
    <br><a href='emp_dashboard.php' class='btn btn-outline-danger mx-auto'>Back to Dashboard</a></div>";
  }?>
    <script type="text/javascript">
    var checker = document.getElementById('checkbox');
    var pickup = document.getElementById('Pickup');
    checkbox.onchange = function() {
    Pickup.disabled = !!this.checked;
    Pickup.innerHTML = "Thakur College of engineering and technology,kandivali E";
    };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>
<?php }else{
header("Location:index.php");
}
?>