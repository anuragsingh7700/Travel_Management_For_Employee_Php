<?php
session_start();
if ($_SESSION["valid"] == true) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Dashboard</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		<h1 class="w-100 text-center bg-success text-white">Admin Dashboard</h1>
		<h1>Welcome!
		<?php
		if ($_SESSION["name"] != "")
			{echo $_SESSION["name"];
		} else{
			echo 'User';
		}?></h1>
		<a href="controllers/logoutcontrol.php">Logout</a>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>
<?php }else{
	header("Location:index.html");
}
?>