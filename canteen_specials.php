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
		<!--Footer that acts as a button to take the user back to the home page-->
		<button class = "footer" onclick="document.location='canteen_index.php'">Home</button>
		
		<!--Search function-->
		<div class="searchcenter">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for specials..">
		</div>
		<!--Weekly Specials table-->
		<h2 class="center2">Weekly Specials</h2>
		<table style="width:50%" id="specials" class="center">
		<tr>
			<th>Special</th>
			<th>Cost</th>
			<th>Status</th>
		</tr>
		<!--Recalls all items from database-->
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
		<script>
		// Search function
		function myFunction() {
		  // Declare variables
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("specials");
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