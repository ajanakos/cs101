<?php 
// setup file:

# Database Connection
$dbc = mysqli_connect('localhost', 'dev', 'password', 'mypage') or die('No connection because: '.mysqli_connect_error());

# Functions
include('functions/data.php');

$site_title = 'Dynamic Page';

// Assign value to page id
if(isset($_GET['page'])) {
	
	$pageid = $_GET['page']; // Set page id to value specified in URL
	
} else { $pageid = 1; } // Set $pageid to home page

$page = data_page($dbc, $pageid);

?>