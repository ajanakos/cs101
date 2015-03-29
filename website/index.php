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

			<img src="https://vmfocus.files.wordpress.com/2015/02/vmfocus-wide-logo.png?w=389 height="20" width="100">

			<?php include('template/navigation.php'); ?>
	
	</header>
	
		<div class="header">
	
			<h1><?php echo $page['header']; ?></h1>
			
		</div>
		
		<div class="content">
			
			<div class="content-1">
			
				<p><?php echo $page['body']; ?></p>
			
			</div>
			
			<div class="content-2">
			
				<p><?php echo $page['body']; ?></p>
			
			</div>
			
			<div class="content-3">
			
				<p><?php echo $page['body']; ?></p>
			
			</div>
			
		</div> <!-- end content --> 
		
	
		
		

		<?php include('template/footer.php'); ?>
	
	
</body>

</html>