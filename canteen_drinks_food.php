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
        	<link rel="stylesheet" href="stylesheet.css">

	<style>
	
	</style>
	</head>
	<body>
		<div class="header">
			<h1>WEGC Canteen Menu</h1>
		</div>
		<button class="footer" onclick="document.location='canteen_index.php'">Home</button>
		<h2 class="left2">Drinks</h2>

			<table style="width:40%" id="items" class="left">
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
		
		<h2 class="right2">Food</h2>
			<table style="width:40%" id="items" class="right">
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