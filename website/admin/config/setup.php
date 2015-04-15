<?php 
// setup file:

# DB Connection:
include('../config/connection.php');


# Constant
// DEFINE('D_TEMPLATE', 'template');

# Functions
include('functions/data.php');
include('functions/template.php');

# Site Setup
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'Dynamic Page';

// Assign value to page id
if(isset($_GET['page'])) {
	
	$pageid = $_GET['page']; // Set page id to value specified in URL
	
} else { $pageid = 1; } // Set $pageid to home page


$page = data_page($dbc, $pageid);

$color = css_color($dbc, $pageid);

$user = user_data($dbc, $_SESSION['username']);




?>