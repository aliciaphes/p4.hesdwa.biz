<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title) and defined('APP_NAME')) echo $title.' | '.APP_NAME; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

<header>
	<h2>This is my header</h2>
</header>


	<?php if($user): ?>

<!-- Create a navigation bar for the user -->
		<div class="navbar">
			<div class="navbar-inner">
				<div class='container'>

					<a class="brand"><?php if(defined('APP_NAME')) echo APP_NAME.' - '.$user->first_name.' '.$user->last_name;?></a>

					<ul class="nav nav-pills">
						<li><a href='/'>My profile</a></li>	
						<li><a href='/posts/add'>Upcoming trips</a></li>
						<li><a href='/posts/'>Find fellow travelers</a></li>
						<li><a href='/users/logout'>Log out</a></li>
					</ul>			
				</div>
			</div>
		</div>

	<?php endif; ?>



	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

<footer>
	<p>&#169; Project 4 - 2013 - ALicia Perez</p>
</footer>	
</body>
</html>