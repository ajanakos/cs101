<?php 


function css_color($dbc, $id) {
	
	$q = "SELECT * FROM css_color WHERE id = $id";
	$r = mysqli_query($dbc, $q);

	$data = mysqli_fetch_assoc($r);
	
	return $data;	

}

function data_setting_value($dbc, $id) {
	
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);
	
	return $data['value'];
	
}

function data_page($dbc, $id) {
	
	$q = "SELECT * FROM pages WHERE id = $id"; // Create query
	$r = mysqli_query($dbc, $q);  // Store result
	
	$data = mysqli_fetch_assoc($r); // Turn result into assoc array
	
	return $data;	
}

?>