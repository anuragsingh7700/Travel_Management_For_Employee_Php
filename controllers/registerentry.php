<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$empid = $_POST["Emp-Id"];
	$passw = $_POST["password"];
	$emailid = $_POST["Email_Id"];
	$addrs =$_POST["address"];
	$pincode =(int) $_POST["pincode"];
	$mobile =(int) $_POST["mobile"];
echo "$empid,$passw,$emailid,$addrs,$pincode,$mobile";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esdassignment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
echo "connected";
$sql = "INSERT INTO employee_details (EMP_ID, Passw, Email_id, Residence, Pincode,Contact) VALUES('$empid','$passw','$emailid','$addrs','$pincode','$mobile')";
if (mysqli_query($conn,$sql)){
    echo "New Record Inserted sucessfully!";
}

}
mysqli_close($conn);
}
?>
