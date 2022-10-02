<?php
/* Connect to the database */
$dbcon = mysqli_connect("localhost", "carinapage", "gLs5CJg", "carinapage_canteen");

if($dbcon == NULL) {
    echo "Could not connect to database";
    exit(); }

/* Create a query that grabs only the specials menu items that are in stock */
    $this_specials_query = "SELECT * FROM specials WHERE specials.status = 'in stock' ";

    /* Perform the query against the database */
    $this_specials_result = mysqli_query($dbcon, $this_specials_query);

    /* Fetch the result into an associative array */
    $this_specials_record = mysqli_fetch_assoc($this_specials_result);

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<div class="header">
			<img src="https://images.app.goo.gl/97jZZgoxUZwisWQr8" alt="WEGC Logo">
			<h1>WEGC Canteen Menu</h1>
		</div>
		<p class="a" class="solid">Welcome to the Wellington East Girls' College Canteen website. Here you can find the menu for our school canteen to see what we have to offer. Click the "Drinks and Food" Button to look at the drinks and food available, or click the "Weekly Specials" button to look at what our specials are.</p>
		
		<div class="left">
			<button class="button button1" onclick="document.location='canteen_drinks_food.php'">Drinks and Food</button>
		</div>
		<div class="right">
			<button class="button button1" onclick="document.location='canteen_specials.php'">Weekly Specials</button>
		</div>
		<br>
		
		<div class="center">
			<?php
			echo "This weeks special is " . $this_specials_record['weekly_special'] . "";
			?>
		</div>
		 
	</body>
</html>