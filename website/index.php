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

		<?php include('template/logo.php'); ?>
		
		
		<header class="mainHeader">
		
	
				<?php include('template/navigation.php'); ?>
				
				
		</header>
		

			
			<div class="header">
		
				<h1><?php echo $page['header']; ?></h1>
				
			</div>
			
			<div class="content">
				
				<div class="content-1">
				
					<p><?php echo $page['body']; ?></p>
				
				</div>
				
				
			</div> <!-- end content --> 
			
			<?php include('template/footer.php'); ?>
			
			<?php if($debug==1) { include('widgets/debug.php'); } ?>
			

		
</body>

</html>