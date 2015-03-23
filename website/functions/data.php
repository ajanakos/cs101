<?php 

function data_page($dbc, $id) {
	
	$q = "SELECT * FROM pages WHERE id = $id"; // Create query
	$r = mysqli_query($dbc, $q);  // Store result
	
	$data = mysqli_fetch_assoc($r); // Turn result into assoc array
	
	return $data;	
}

?>