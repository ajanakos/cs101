<nav>
	<ul><?php // nav_main($dbc, $pageid) ?></ul>
	<ul>
		<li><a href="#">Dashboard</a></li>
		<li><a href="#">Pages</a></li>
		<li><a href="#">Users</a></li>
		<li><a href="#">Settings</a></li>
	</ul>
	<div class="pull-right">
		<ul>
			<li>
				<?php if($debug==1) { ?>
					<button id="debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
				<?php } ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname']; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="login.php">Logout</a></li>	
					</ul>
				</li>
			</li>
		</ul>
	</div>
</nav>