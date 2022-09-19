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
    if(isset($_GET['specials_sel'])) {
        $special_id = $_GET['specials_sel'];
    } else {
        $special_id = 1;
    }

    /* Create SQL query */
    $this_specials_query = "SELECT * FROM specials WHERE specials.special_id = '" .$special_id . "'";

    /* Perform the query against the database */
    $this_specials_result = mysqli_query($dbcon, $this_specials_query);

    /* Fetch the result into an associative array */
    $this_specials_record = mysqli_fetch_assoc($this_specials_result)	
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
		<h2>Weekly Specials</h2>

		<table style="width:50%">
		<tr>
			<th>Special</th>
			<th>Cost</th>
			<th>Status</th>
		</tr>
		<tr>
			<td><?php
				echo "" .$this_specials_record['weekly_special']. "";
			?> </td>
			<td><?php
				echo "$" .$this_specials_record['cost']. "";
			?> </td>
			<td><?php
				echo "" .$this_specials_record['status']. "";
			?> </td>
		</tr>
		</table>
	</body>
</html>