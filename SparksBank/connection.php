<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Database connection</title>
</head>
<body>
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$database="sparks_bank";

		$conn=mysqli_connect($servername,$username,$password,$database);
		if($conn->connect_error){
			die("Unable to connect".$conn->connect_error);
		}
	
	 ?>
</body>
</html>