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

			<img src="https://vmfocus.files.wordpress.com/2015/02/vmfocus-wide-logo.png?w=389 height="100" width="100">

		<nav class="navbar navbar-default">
			<ul class="nav navbar-nav">
				<li<?php if($pageid == 1) { echo ' class="active"';} ?>><a href="?page=1">Home</a></li>
				<li<?php if($pageid == 2) { echo ' class="active"';} ?>><a href="?page=2">About</a></li>
				<li<?php if($pageid == 3) { echo ' class="active"';} ?>><a href="?page=3">FAQ</a></li>
				<li<?php if($pageid == 4) { echo ' class="active"';} ?>><a href="?page=4">Contact</a></li>
			</ul>
		</nav>
	
	</header>

		
		<div class="content">
		
			<h1><?php echo $page['header']; ?></h1>
			
			<p><?php echo $page['body']; ?></p>
		
		</div>
		

	
	<footer class="footer">
		
			<p>My footer</p>	

	</footer>
	
</body>

</html>