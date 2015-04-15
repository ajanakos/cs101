<?php 

session_start();

if(!isset($_SESSION['username'])) {
	header('Location: login.php');
}

?>

<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>

<head>
	
	<title><?php echo $page['title'].' | '.$site_title;  ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>
	
</head>

<body>	
		
		<header class="mainHeader">
		
			<?php include('template/navigation.php'); ?>
				
		</header>
		
		<h1>Admin Dashboard</h1>
				
				
			</div> <!-- end content --> 
			
			<?php include('template/footer.php'); ?>
			
			<?php if($debug==1) { include('widgets/debug.php'); } ?>
			

		
</body>

</html>