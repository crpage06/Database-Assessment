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
		<div class="header">
			<h1>WEGC Canteen Menu</h1>
		</div>
		<button class = "footer" onclick="document.location='canteen_index.php'">Home</button>
		<h2 class="center2">Weekly Specials</h2>

		<table style="width:50%" id="items" class="center">
		<tr>
			<th>Special</th>
			<th>Cost</th>
			<th>Status</th>
		</tr>
		<?php
			$sql = "SELECT * FROM specials";
			$result = $dbcon->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result-> fetch_assoc()) {
					echo "<tr><td>" . $row['weekly_special'] . "</td><td>$" . $row['cost'] . "</td><td>" . $row['status'] . "</td></tr>";
				}
			} 
			else {
				echo "No Results";
			}
			?>
		</table>
	</body>
</html>