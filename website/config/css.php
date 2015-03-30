<?php 
// CSS:

	$background_color = $color['background_color'];
	$content_background_color = $color['content_background_color'];
	$content_text_color = $color['content_text_color']; 

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- jQuery CSS -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
		
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
		margin-bottom: 60px;
		background-color: #<?php echo $background_color; ?>;
		color: #000305; 
		width: 70%;
		margin: 0 auto;
		
		}
		
	
	.logo {
		width: 100%;
	}
	#debug {
		position: absolute;
	}
	.mainHeader nav {
		background-color: #666;
		height: 50px;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}
	
	.mainHeader nav ul {
		list-style: none;
		margin: 0 auto;
	}
	
	.mainHeader nav ul li {
		float: left;
		display: inline;
	}
	
	.mainHeader nav a:link, .mainHeader nav a:visited {
		color: #FFF;
		display: inline-block;
		padding: 10px 25px;
		height: 50px;
	} 
	
	.mainHeader nav a:hover, .mainHeader nav a:active, 
	.mainHeader nav .active a:link, .mainHeader nav .active a:visited {
		background-color: #D4CED9;
		text-shadow: none;
		color: black;
		border-radius: 10px;
	}
	
	.mainHeader nav li a {
		border-radius: 10px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}
	
	.header {
		text-align: center;
		font-weight: bold;
	}		
	.content {
		width: 100%;
	}
	
	.content-1 {
		background-color: #<?php echo $content_background_color; ?>;
		padding: 2% 2% 2% 2%;
		border-radius: 10px;
		margin: 2% 0;
		width: 100%;
		color: #<?php echo $content_text_color; ?>;
	}
	
	
	.footer {
		  position: absolute;
		  bottom: 0;
		  width: 70%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  background-color: #666;
		  border-radius: 10px;
		  text-align: center;
	}
		
	.footer p {
		width: 92%;
		color: white;
		margin-top: 3%;
	
	}
	
	#debug-console {
		border-radius: 10px;
		position: absolute;
		top: 150px;
		left: 0px;
		width: 20%;
		overflow-y: scroll;
		height: 700px;
		background-color: #666;
		box-shadow: 2px 2px 5px #666;
	}
	
	.debug-header h1 {
		color: white;
	}
			
</style>