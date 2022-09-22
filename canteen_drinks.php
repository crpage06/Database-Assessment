<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "carinapage", "gLs5CJg", "carinapage_canteen");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit(); }		
?>

<!DOCTYPE html>	
<html lang="en">
	
	<head>
        	<meta charset="utf-8">
        	<title></title>

        	<meta name="description" content="">
        	<link href="css/styles.css" rel="stylesheet">

	</head>
	<style>
	table, th, td {
  	border:1px solid black;
		border-collapse: collapse
	}
	th, td{
		background-color: white
		}
	</style>
	<body>
		<h1>Canteen Menu</h1>
		<button onclick="document.location='canteen_index.php'">Main Menu</button>
		<h2>Drinks</h2>

		<table style="width:50%">
			<tr>
				<th>Drink</th>
				<th>Cost</th>
				<th>Status</th>
			</tr>
			<?php
			$sql = "SELECT * FROM drinks";
			$result = $dbcon->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<tr><td>" . $row['drink'] . "</td><td>$" . $row['cost'] . "</td><td>" . $row['status'] . "</td></tr>";
				}
			} 
			else {
				echo "No Results";
			}
			?>
		</table>
		
		<h2>Food</h2>
		<table style="width:50%">
			<tr>
				<th>Food</th>
				<th>Cost</th>
				<th>Status</th>
			</tr>
			<?php
			$sql = "SELECT * FROM food";
			$result = $dbcon->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<tr><td>" . $row['food'] . "</td><td>$" . $row['cost'] . "</td><td>" . $row['status'] . "</td></tr>";
				}
			} 
			else {
				echo "No Results";
			}
			?>
		</table>
	</body>
</html>