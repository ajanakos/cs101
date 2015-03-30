	<div id="debug-console">
		
		
		<?php 
		
			$all_vars = get_defined_vars();
		
		?>
		<div class="debug-header">
			
			<h1>Get Array</h1>
			<pre><?php print_r($_GET); ?></pre>
			
			<h1>Post Array</h1>
			<pre><?php print_r($_POST); ?></pre>
			
			<h1>All Vars</h1>
			<pre><?php print_r($all_vars); ?></pre>
			
 		</div>
		
	</div>