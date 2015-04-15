<?php 

session_start();

# DB Connection:
include('../config/connection.php');

if($_POST) {
	
	$q = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = sha1('$_POST[password]')";
	$r = mysqli_query($dbc, $q);
	
	if(mysqli_num_rows($r) == 1) {
		
		$_SESSION['username'] = $_POST['email'];
		header('Location: index.php');
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	
	<title>Admin Login</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>
	
</head>

<body>
		
	<header class="mainHeader">
	
		<?php // include('template/navigation.php'); ?>		
			
	</header>
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-4 col-md-offset-4">
				
				<div align="center"><h1>Login</h1></div>
			
				<form action="login.php" method="post">
					
					<div class="form-group">
				    	<label for="email">Email address</label>
				    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				  	</div>
				  	
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  	</div>
				  	
				  	<button type="submit" class="btn btn-default">Submit</button>
				  	
				</form>
			
			</div> <!-- END col -->		
				
		</div> <!-- END row -->
						
	</div> <!-- END container -->
		
	<?php // include('template/footer.php'); ?>
		
	<?php // if($debug==1) { include('widgets/debug.php'); } ?>
			
</body>

</html>