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