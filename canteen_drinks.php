<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "carinapage", "gLs5CJg", "carinapage_canteen");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit(); }
else {
	echo "Successfully Connected to database";
}
/* Get from the drink id from index page else set default */
    if(isset($_GET['drink_sel'])) {
        $drink_id = $_GET['drink_sel'];
    } else {
        $drink_id = 1;
    }

    /* Create SQL query */
    $this_drink_query = "SELECT * FROM drinks WHERE drinks.drink_id = '" .$drink_id . "'";

    /* Perform the query against the database */
    $this_drink_result = mysqli_query($dbcon, $this_drink_query);

    /* Fetch the result into an associative array */
    $this_drink_record = mysqli_fetch_assoc($this_drink_result)		
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
		<h2>Drinks</h2>

		<table style="width:50%">
		<tr>
			<th>Drink</th>
			<th>Cost</th>
			<th>Status</th>
		</tr>
		<tr>
			<td><?php
				echo "" .$this_drink_record['drink']. "";
			?> </td>
			<td><?php
				echo "$" .$this_drink_record['cost']. "";
			?> </td>
			<td><?php
				echo "" .$this_drink_record['status']. "";
			?> </td>
		</tr>
		</table>
	</body>
</html>