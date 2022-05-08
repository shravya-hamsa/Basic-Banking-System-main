<?php 
		include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users list page</title>
	<link rel="stylesheet" type="text/css" href="data.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="main-div">
		<div class="center-div">
		<h1><u>All user details</u></h1>
			<div class="table-responsive">
					<table>
						<tr>
							<th>Sl.No</th>
							<th>Full Name</th>
							<th>Email Address</th>
							<th>Account No</th>
							<th>Balance Amount</th>
						</tr>
						
					<?php
						$sql="SELECT * from users";
						$result=$conn->query($sql);
						if($result-> num_rows >0){
							while($row=$result-> fetch_assoc()){
								echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["account_no"]."</td><td>".$row["balance_amount"]."</td></tr>";
							}
					echo "</table>";
						}
						?>
			</div>
			</div>
		</div>
	</div>		
<div class="button-align">
			<a href="add_users.php">Add User</a>
			<a href="home.php">home page</a>
</div>

</body>
</html>
