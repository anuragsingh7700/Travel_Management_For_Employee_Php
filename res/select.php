<?php

function dbselect(table,)
{
	require(db.php)
	conn dbconnect();
$sql = "SELECT id, firstname, lastname FROM $table";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  	$row = mysqli_fetch_assoc($result
	// echo "<table><tr><th>ID</th><th>Name</th></tr>";
 //  while()) {
 //    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
 //     echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
 //  }
	return $row;
	}
}

mysqli_close($conn);
?>