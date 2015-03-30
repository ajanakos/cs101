<nav>
	
	<?php if($debug==1) { ?>
	
		<button id="debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
	
	<?php } ?>
	
	<ul><?php nav_main($dbc, $pageid) ?></ul>
</nav>