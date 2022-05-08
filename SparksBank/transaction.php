<?php 
		include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transaction list page</title>
	<link rel="stylesheet" type="text/css" href="data.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="main-div">
		<div class="center-div">
		<h1><u>All Transaction details</u></h1>
			<div class="table-responsive">
					<table>
						<tr>
							<th>Sl.No</th>
							<th>Payer </th>
							<th>Payer Account No</th>
							<th>Payee </th>
							<th>Payee Account No</th>
							<th>Amount</th>
							<th>Date and Time</th>
						</tr>
						
					<?php
						$sql="SELECT * from transaction";
						$result=$conn->query($sql);
						if($result-> num_rows >0){
							while($row=$result-> fetch_assoc()){
								echo "<tr><td>".$row["id"]."</td><td>".$row["sender"]."</td><td>".$row["sender_acc_no"]."</td><td>".$row["receiver"]."</td><td>".$row["receiver_acc_no"]."</td><td>".$row["amount"]."</td><td>".$row["date_time"]."</td></tr>";
							}
					echo "</table>";
						}
						?>
			</div>
			</div>
		</div>
	</div>		
<div class="button-align">
			<a href="transfer.php">Transfer</a>
			<a href="home.php">home page</a>
</div>

</body>
</html>