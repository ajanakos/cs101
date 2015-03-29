<?php 
// setup file:

# Database Connection
$dbc = mysqli_connect('localhost', 'dev', 'password', 'mypage') or die('No connection because: '.mysqli_connect_error());

# Constant
// DEFINE('D_TEMPLATE', 'template');

# Functions
include('functions/data.php');
include('functions/template.php');

$site_title = 'Dynamic Page';

// Assign value to page id
if(isset($_GET['page'])) {
	
	$pageid = $_GET['page']; // Set page id to value specified in URL
	
} else { $pageid = 1; } // Set $pageid to home page

$page = data_page($dbc, $pageid);

?>