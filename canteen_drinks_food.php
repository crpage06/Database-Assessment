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
		<!--Links to stylesheet-->
        <link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<!--Header-->
		<div class="header">
			<h1>WEGC Canteen Menu</h1>
		</div>
		<!--A footer used as a button to take the user back to the home page-->
		<button class="footer" onclick="document.location='canteen_index.php'">Home</button>
		
		<!--Search function-->
		<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search for drinks..">
		<!--Drinks table-->
		<h2 class="left2">Drinks</h2>
			<table style="width:40%" id="drinks" class="left">
				<tr>
					<th>Drink</th>
					<th>Cost</th>
					<th>Status</th>
				</tr>
				<!--Recalls all items from database-->
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
		<!--Search funtion-->
		<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search for food items..">
		<!--Foods table-->
		<h2 class="right2">Food</h2>
			<table style="width:40%" id="food" class="right">
				<tr>
					<th>Food</th>
					<th>Cost</th>
					<th>Status</th>
				</tr>
				<!--Recalls all items from database-->
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
		<script>
		// Search funtions
		function myFunction1() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput1");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("drinks");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		}
			
		function myFunction2() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput2");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("food");
		  tr = table.getElementsByTagName("tr");

		  // Loop through all table rows, and hide those who don't match the search query
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}
		  }
		}
		</script>
	</body>
</html>